<?php
// echo "<pre>"; print_r($_GET); 
// exit;
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

		
	$student->setUserId($_SESSION['User']['userId']);
	$infoUser  = $student->GetInfo();
	

	$infoBaja  = $student->GetBaja();
	

	// echo '<pre>'; print_r($infoBaja);
	// exit;
	$html .= "
	<html>
	<head>
	<title>SOLICITUD DE BAJA</title>
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
	</style>
	</head>
	<body>
	<br>	
	<br>	

	
		<table align='center' width='100%'>
			<tr>
				<td colspan='2' style='text-align:center'>
					Solicitud de Baja
				</td>

			</tr>
			<tr>
				<td style='width:200px'>
					Nombre del Alumno:
				</td>
				<td >
					".$infoUser['names']." ".$infoUser['lastNamePaterno']." ".$infoUser['lastNameMaterno']."
				</td>
			</tr>
			<tr>
				<td style='width:200px'>
					Fecha de Solicitud:
				</td>
				<td >
					".$infoBaja['fechaSolicitud']."
				</td>
			</tr>
			<tr>
				<td style='width:200px'>
					Motivo:
				</td>
				<td >
					".html_entity_decode($infoBaja['motivo'])."
				</td>
			</tr>
			
		</table>
		
		
		<br>
		<br>
		<br>
		<br>
		<br>
		<hr style ='width:200px'>
		<center>".$infoUser['names']." ".$infoUser['lastNamePaterno']." ".$infoUser['lastNameMaterno']."</center>
	

	";
		
	
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