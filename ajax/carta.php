<?php
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	
	$module->setCourseModuleId($_GET['Id']);
	$infoM  = $module->InfoCourseModule();
	$infoC  = $module->infoCourseMol($infoM['courseId']);
	$personal->setPersonalId($infoM['access'][1]);
	$infoP = $personal->Info();

	
	// $lstPreguntas = $encuesta->promedioXRubro($_GET['Id'],$infoM['courseId']);     
	// echo "<pre>"; print_r($lstPreguntas);
    // exit;

	$html .= "
	<html>
	<head>
	<title>VALORACION</title>
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
		
		<table align='center' width='100%'  border='0' class='txtTicket'>
			<tr>
				<td  align='left' '>
					<img src='".DOC_ROOT."/images/logo_correo.jpg' >
				</td>
			</tr>
			<tr>
				<td  align='center'>
					Carta Descriptiva
				</td>
			</tr>
		</table>
		";
		
	$html .= '
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<table width="100%" class="txtTicket">
				<tr>
					<td style="width:280px">Nombre del Curso</td>
					<td>'.$infoM['name'].'</td>
				</tr>
				<tr>
					<td>Institución</td>
					<td>Instituto de Administración Pública del estado de Chiapas A.C.</td>
				</tr>
				<tr>
					<td>Nombre del Instructor</td>
					<td>'.$infoP['name'].' '.$infoP['lastname_paterno'].' '.$infoP['lastname_materno'].'</td>
				</tr>
			</table>
			<br>
			<br>
			<table width="100%" class="txtTicket">
				<tr>
					<td style="width:280px">Perfil del Participante</td>
					<td>
					'.$infoM['perfilParticipante'].'
					</td>
				</tr>
				<tr>
					<td>Duracion</td>
					<td>'.$infoM['duracion'].'</td>
				</tr>
				<tr>
					<td>Num. Participantes</td>
					<td>'.$infoM['numParticipantes'].'</td>
				</tr>
				<tr>
					<td>Horario</td>
					<td>'.$infoM['horario'].'</td>
				</tr>
			</table>
			<br>
			<br>
			<table width="100%" class="txtTicket">
				<tr>
					<td style="width:280px">Objetivo General</td>
					<td></td>
				</tr>
				<tr>
					<td>Objetivos Particulares</td>
					<td>'.$infoM['objetivoParticular'].'</td>
				</tr>
				<tr>
					<td>estructura Tematica</td>
					<td>'.$infoM['estructuraTematica'].'</td>
				</tr>
				<tr>
					<td>Criterios de Evaluación</td>
					<td>'.$infoM['criteriosEvaluacion'].'</td>
				</tr>
				<tr>
					<td>Tecnicas Instruccionales</td>
					<td>'.$infoM['tecnicas'].'</td>
				</tr>
			</table>
			<br>
			<br>
			<table width="100%" class="txtTicket">
				<tr>
					<td colspan="2">Elaboracion de trabajos que evidencien sus avances en el proyecto</td>
				</tr>
				<tr>
					<td colspan="2">Requerimientos</td>
				</tr>
				<tr>
					<td style="width:280px">Lugar</td>
					<td><input type="text" name="lugar" class="form-control"></td>
				</tr>
				<tr>
					<td>Del equipo</td>
					<td><input type="text" name="delEquipo" class="form-control"></td>
				</tr>
				<tr>
					<td>Material Didactico</td>
					<td><input type="text" name="materialDidactico" class="form-control"></td>
				</tr>
			</table>
			<br>
			<br>
			<table width="100%" class="txtTicket">
				<tr>
					<td colspan="2">Bibliografia<br>
					<td>'.$infoM['bibliografias'].'</td>
					</td>
				</tr>
			</table>
	';
		
		

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