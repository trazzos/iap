<?php
// echo "<pre>"; print_r($_GET); 
// exit;
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	
	$course->setCourseId($_GET['courseId']);
	$infoCourse = $course->Info();
	// echo '<pre>'; print_r($infoCourse);
	// exit;
	$student->setUserId($_SESSION['User']['userId']);
	$info = $student->GetInfo();
	
	if($info['sexo']=='f'){
		$info['sexo'] = 'Femenino'; 
	}else{
		$info['sexo'] = 'Masculino'; 
	}

	$html .= "
	<html>
	<head>
	<title>BOLETA DE CALIFICACIONES</title>
	<style type='text/css'>
	.txtTicket{
			font-size:12px;
			 font-family: sans-serif;
			text-transform: uppercase;
			/*font:bold 12px 'Trebuchet MS';*/ 
		}
		table,td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	.notas{
			font-size:10px;
			 font-family: sans-serif;
			text-transform: uppercase;
			/*font:bold 12px 'Trebuchet MS';*/ 
		}
		table,td {
		border: 1px solid black;
		 border-collapse: collapse;
	}
	.line{
		border-bottom: 1px solid; border-left: 0px; border-right: 0px;	
	}
		</style>
	</head>
	<body>
	<br>	
	<br>	

	
		<table align='center' width='100%' border='0'>
			<tr>
				<td colspan='3' align='center'>
					Cedula de Reinscripción<br>
					Condicional
					<br>
					<br>
					<br>
				</td>
			</tr>
			<tr>
				<td width='70%' >
					Nombre: <div class='line'>".$info['names']." ".$info['lastNamePaterno']." ".$info['lastNameMaterno']."</div>
				</td>
				<td colspan='2'>
					Matrícula: <div class='line'>".$info['controlNumber']." </div>
				</td>
			</tr>
			<tr>
				<td>
					Fecha de Nacimiento:<div class='line'> ".$info['birthdate']." </div>
				</td>
				<td >
					Sexo:  <div class='line'>".$info['sexo']." </div>
				</td>
				<td >
					Curp: 
					<br> 
					<br> 
					<div class='line'>".$info['curp']."  </div>
				</td>
			</tr>
			<tr>
				<td colspan='3'>
					Dirección: <div class='line'>".$info['street']." ".$info['number']." ".$info['colony']." </div>
				</td>
			</tr>
			<tr>
				<td>
					Teléfono: <div class='line'>".$info['phone']." </div>
				</td>
				<td colspan='2'>
					Correo: <div class='line'> ".$info['email']." </div>
				</td>
			</tr>
			<tr>
				<td colspan='3'>
					Programa Académico: <div class='line'> ".$infoCourse['name']."</div>
				</td>
			</tr>
			<tr>
				<td>
					Ciclo:
					<br>
					<br>
					<div class='line'>
					</div>
				</td>
				<td >
					Grupo: <div class='line'>".$infoCourse['group']."</div>
				</td>
				<td >
					Modalidad: <div class='line'>".$infoCourse['modality']."</div>
				</td>
			</tr>
			<tr>
				<td colspan='3' align='left'>
					Regular: [X]  Irregular:  
				</td>
			</tr>
			";
		$html .= "</table>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<table width='100%' border='0' cellspacing=22>";
		$html .= "
		<tr>
		<td></td>
		<td>Autorizaciones</td>
		<td>Observaciones</td>
		</tr>
		<tr>
		<td>Finanzas</td>
		<td><div class='line'></div></td>
		<td><div class='line'></div></td>
		</tr>
		<tr>
		<td>Biblioteca</td>
		<td><div class='line'></div></td>
		<td><div class='line'></div></td>
		</tr>
		<tr>
		<td>Control Escolar</td>
		<td><div class='line'></div></td>
		<td><div class='line'></div></td>
		</tr>
		";
		$html .= "</table>";
		


	$html .= "	
	</body>
	</html>

	";
	// echo $html;
	// exit;
	# Instanciamos un objeto de la clase DOMPDF.
	$mipdf = new DOMPDF();
	 
	# Definimos el tamaño y orientación del papel que queremos.
	# O por defecto cogerá el que está en el fichero de configuración.
	$mipdf ->set_paper("A4", "portrait");
	 
	# Cargamos el contenido HTML.
	$mipdf ->load_html(utf8_decode($html));
	 
	# Renderizamos el documento PDF.
	$mipdf ->render();
	 
	# Enviamos el fichero PDF al navegador.
	$mipdf ->stream('certificadodeValidez.pdf',array('Attachment' => 0));
			


?>