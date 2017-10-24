<?php
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();


	$module->setCourseModuleId($_GET["Id"]);
	$info = $module->InfoCourseModule();
	
	$course->setCourseId($info["courseId"]);
	$infoCo = $course->Info();
	
	$group->setCourseModuleId($_GET["Id"]);
	$group->setCourseId($info["courseId"]);
	$noTeam = $group->actaCalificacion();
	// Info
	// echo "<pre>"; print_r($infoCo);
	// exit;
	
	// echo "<pre>"; print_r($info); 
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
	<center>	
	<b>INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE CHIAPAS, A.C.</b>
	<b>ACTA DE CALIFICACIÓN FINAL</b><br>
	</center>	
	<br>
	<br>
	<br>
	
	<table class='txtTicket' width='100%'>
	<tr>
		<td>Acuerdo: No.: </td>
		<td>".$info['rvoe']."</td>
	</tr>
	<tr>
		<td>Ciclo: </td>
		<td>".$infoCo["scholarCicle"]."</td>
	</tr>
	<tr>
		<td>Materia:</td>
		<td>".$info['clave']." ".$info['name']."</td>
	</tr>	
	<tr>
		<td>Cuatrimestre:</td>
		<td></td>
	</tr>
	<tr>
		<td>Periodo:</td>
		<td>".$info['initialDate']." - ".$info['finalDate']."</td>
	</tr>
	</table>
	<br>
	<br>

	";

	$html .= "<table  width='100%' class='txtTicket'>";
	$html .= "<tr>";
	$html .= "<td>Numero</td>";
	$html .= "<td>Nombre</td>";
	$html .= "<td>Calificación Final</td>";
	$html .= "</tr>";
	foreach($noTeam as $key=>$aux){
		$html .= "<tr>";
		$html .= "<td>".($key+1)."</td>";
		$html .= "<td>".$aux['lastNamePaterno']." ".$aux['lastNameMaterno']." ".$aux['names']."</td>";
		$html .= "<td>".$aux['score']."</td>";
		$html .= "</tr>";
	}  
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
	$mipdf ->set_paper("A4", "");
	 
	# Cargamos el contenido HTML.
	$mipdf ->load_html(utf8_decode($html));
	 
	# Renderizamos el documento PDF.
	$mipdf ->render();
	 
	# Enviamos el fichero PDF al navegador.
	$mipdf ->stream('certificadodeValidez.pdf',array('Attachment' => 0));
			


?>