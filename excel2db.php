<?php
	
	include_once('init.php');
	include_once('config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	$lineSeparator = "\n";
	$fieldSeparator = ",";
	$csvFile = 'data.csv';
	
	if(!file_exists($csvFile)){
		echo 'No se encuentra el archivo '.$csvFile;
		exit;	
	}//if
	
	$file = fopen($csvFile, 'r');
	
	if(!$file){
		echo 'Error al abrir el archivo';
		exit;	
	}//if
	
	$size = filesize($csvFile);
	
	if(!$size){
		echo 'El archivo esta vacio, verifique';
		exit;
	}//if
	
	$lines = 0;
	$regs = 0;
	$promotores = array();
	$empresaId = 130;
	while (( $field = fgetcsv($file,2048,",")) !== false ) { // Mientras hay líneas que leer...
	
		//Clientes	
		if($lines < 4)
		{
//			$lines++;
//			continue;
		}
		$names = explode(" ", $field[0]);
		$field[1] = preg_replace("/\s+/", " ", $field[1]);
		$email = explode(" ", $field[1]);
		$key = key($email);
		
		$mail = $email[$key];
		if(!$mail)
		{
			$mail = "test@test.com";
		}

		$student->setControlNumber();

		$sqlQuery = "INSERT INTO 
						user 
						(
							type,
							names, 
							lastNamePaterno, 
							lastNameMaterno,
							controlNumber,
							email, 
							password,
							sexo
						)
							VALUES
						(
							'student',
							'".$util->EncodeTiny($names[2]." ".$names[3])."', 
							'".$util->EncodeTiny($names[0])."', 
							'".$util->EncodeTiny($names[1])."',
							'".$student->getControlNumber()."',
							'".$util->EncodeTiny($mail)."', 
							'iapchiapas',
							'm'							
						)";
						
		$db->setQuery($sqlQuery);
		$id = $db->InsertData();	
			echo '<br>Saved<br><br>';
		$lines++;	
			
		echo '<br>';
		
	}//while
	
	fclose($file);
		
	echo '<br><br>Done!';
		
	echo $lines.' registers imported.';
			
	exit;

?>