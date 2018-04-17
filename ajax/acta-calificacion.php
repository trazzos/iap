<?php
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	$util = new Util;
	
	
	$module->setCourseModuleId($_GET["Id"]);
	$info = $module->InfoCourseModule();
	
	// echo '<pre>'; print_r($info);
	// exit;
	
	$course->setCourseId($info["courseId"]);
	$infoCo = $course->Info();
	
	$group->setCourseModuleId($_GET["Id"]);
	$group->setCourseId($info["courseId"]);
	$group->setTipoMajor($info["majorName"]);
	$noTeam = $group->actaCalificacion();
	

	$infoFirma = $personal->extraeFirmaActa();
	
	// echo '<pre>'; print_r($info);
	// $profe  =  explode('|',$info['access']); 
	
	// echo $profe;
	// exit;
	$personal->setPersonalId($info['access'][1]);
	$infoPersonal = $personal->Info();
	
	
	
	// Info
	// echo "<pre>"; print_r($info);
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
	<img src='".DOC_ROOT."/images/logo_correo.jpg'>
	<center>	
	<b>INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE CHIAPAS, A.C.</b>
	<b>".$info['majorName'].": ".$info['subjectName']."</b><br>
	<b>ACTA DE CALIFICACIÓN FINAL</b><br>
	</center>	
	<br>
	<br>
	
	
	<table class='txtTicket' width='100%'>
	<tr>
		<td>Acuerdo: No.: </td>
		<td>".$info['rvoe']." de fecha ".$info['fechaRvoe']."</td>
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
		<td>".$info['semesId']."</td>
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
	$html .= "<td><center>Numero</center></td>";
	$html .= "<td><center>Nombre</center></td>";
	$html .= "<td><center>Calificación Final</center></td>";
	$html .= "<td><center>Letra</center></td>";
	$html .= "</tr>";
	foreach($noTeam as $key=>$aux){
		$html .= "<tr>";
		$html .= "<td>".($key+1)."</td>";
		$html .= "<td>".$aux['lastNamePaterno']." ".$aux['lastNameMaterno']." ".$aux['names']."</td>";
		$h =  $util->num2letras($aux['score']);
		
		if($aux['score'] < 7  and $info['majorName'] == 'MAESTRIA'){
			$html .= "<td><center><font color='red'>".$aux['score']."</font></center></td>";
			$html .= "<td><center><font color='red'>".$h."</font></center></td>";
		}
		else if($aux['score'] < 8  and $info['majorName'] == 'DOCTORADO'){
			$html .= "<td><center><font color='red'>".$aux['score']."</font></center></td>";
			$html .= "<td><center><font color='red'>".$h."</font></center></td>";
		}
		else{
			$html .= "<td><center>".$aux['score']."</center></td>";
			$html .= "<td><center>".$h."</center></td>";
		}
		$html .= "</tr>";
	}  
	$html .= "</table>";
	
	$html .= "
		
	<br>
	<br>
	<br>
	<br>
	<center>
		
	
	<table width=100% align='center' border=0 class='txtTicket'>	
		<tr>
			<td colspan='2' align='center'>
			".$infoPersonal['profesion']." ".$infoPersonal['name']." ".$infoPersonal['lastname_materno']." ".$infoPersonal['lastname_paterno']."<br>
			Catedratico
			<br>
			<br>
			<br>
			<br>
			</td>
		</tr>
		<tr>
			<td align='center'>
				".$infoFirma['director']."<br>
				Director Academico
			</td>
			<td align='center'> 
				".$infoFirma['controlEscolar']."<br>
				Servicios Escolares
			</td>
		</tr>
	</table>	
		
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