<?php
	
	session_start();
	
	header("Content-Type:application/vnd.ms-excel");
	header("content-disposition: attachment; filename=alumnos".date('d_m_Y').".xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	include_once('../../init.php');
	include_once('../../config.php');
	include_once(DOC_ROOT.'/libraries.php');
		
	$card = $_SESSION['stdSearch'];
		
	$name = $card['name'];
	$controlNumber = $card['controlNumber'];
	$apPaterno = $card['apPaterno'];
	$apMaterno = $card['apMaterno'];
	$semesterId = $card['semesterId'];
	
	if($name)
		$sqlSearch = ' AND names LIKE "%'.$name.'%"';			
	
	if($controlNumber)
		$sqlSearch .= ' AND controlNumber LIKE "%'.$controlNumber.'%"';		
	
	if($apPaterno)
		$sqlSearch .= ' AND lastNamePaterno LIKE "%'.$apPaterno.'%"';
		
	if($apMaterno)
		$sqlSearch .= ' AND lastNameMaterno LIKE "%'.$apMaterno.'%"';
		
	if($semesterId)
		$sqlSearch .= ' AND semesterId = '.$semesterId;
			
	if($sqlSearch)			
		$result = $student->Enumerate(' semesterId ASC, ', $sqlSearch);
	
	$titulos = "Apellido Paterno\tApellido Materno\tNombre\tNo. Control\tSemestre\tGrupo\tCarrera\tPromedio\tCURP\tFecha de Nac.\n";
	
	echo $titulos;	
	
	if($result){	
		
		foreach($result as $res)
		{
			
			$major->setMajorId($res['majorId']);
			$carrera = $major->GetNameById();
			 		   
		   echo $res["lastNamePaterno"]."\t";
		   echo $res["lastNameMaterno"]."\t";
		   echo $res["names"]."\t";
		   echo $res["controlNumber"]."\t";
		   echo $res["semester"]."\t";
		   echo $res["group"]."\t";
		   echo $carrera."\t";
		   echo $res["average"]."\t";
		   echo $res["curp"]."\t";		  
		   echo $res["birthdate"]."\n"; 
	  }
	}
	
?>