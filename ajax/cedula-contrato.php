<?php
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	$util = new Util;
	
	
	$module->setCourseModuleId($_GET['q']);
	$myModule = $module->InfoCourseModule();
	
	
	$personal->setPersonalId($myModule['access'][1]);
	$infoP = $personal->Info();

	// echo "<pre>"; print_r($infoP);
	// exit;
	

	$html .= "
	<html>
	<head>
	<title>Acta de Calificaciones</title>
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
	</head>
	<body>
	<br>	
	<br>
	<img src='".DOC_ROOT."/images/logo_correo.jpg'>
	<center >	
	<b class='txtTicket'>INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE CHIAPAS, A.C.</b>
	<br>
	<b class='txtTicket'>CEDULA CONTRATO</b><br>
	</center>	
	<br>
	<br>
	
	
	<table class='txtTicket' width='100%'>
	<tr>
		<td>Tipo de Contrato: </td>
		<td>".$infoP["tipoContrato"]."</td>
	</tr>
	<tr>
		<td>fecha materia: </td>
		<td>".$myModule['initialDate']." - ".$myModule['finalDate']."</td>
	</tr>
	<tr>
		<td>fecha Contrato: </td>
		<td>".$myModule["inicioContrato"]." - ".$myModule["finContrato"]."</td>
	</tr>
	<tr>
		<td>no. de contrato:</td>
		<td>".$myModule['noContrato']."</td>
	</tr>	

	</table>
	<br>
	<br>

	";

	
	
	$html .= "
		
	<br>
	<br>
	<center>
		
	
	
		
	</center>
	</body>
	</html>

	";
	// echo $html;
	// exit;
	# Instanciamos un objeto de la clase DOMPDF.
	$mipdf = new DOMPDF();
	 
	# Definimos el tamaño y orientación del papel que queremos.
	# O por defecto cogerá el que está en el fichero de configuración.
	$mipdf ->set_paper("A4", "");
	 
	# Cargamos el contenido HTML.
	$mipdf ->load_html(utf8_decode($html));
	 
	# Renderizamos el documento PDF.
	$mipdf ->render();
	 
	# Enviamos el fichero PDF al navegador.
	$mipdf ->stream('ActaDeCalificaciones.pdf',array('Attachment' => 0));
			


?>