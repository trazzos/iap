<?php
// echo "<pre>"; print_r($_GET); 
// exit;
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	$course->setCourseId($_GET['q']);
	$infoCourse = $course->Info();
	
	// echo "<pre>"; print_r();
	// exit;
	$course->setUserId($_SESSION['User']['userId']);
	$lstBoleta = $course->boletaAlumno();
 
	// echo '<pre>'; print_r($infoCourse);
	// exit;
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
	</style>
	</head>
	<body>
	<br>	
	<br>	

	
		<table align='center' width='100%'>
			<tr>
				<td>
					Nombre del Curso
				</td>
				<td colspan='4'>
				".$infoCourse['name']."
				</td>
			</tr>
			<tr>
				<td>
					Tipo
				</td>
				<td colspan='4'>
				".$infoCourse['majorName']."
				</td>
			</tr>
			<tr>
				<td>
					Grupo
				</td>
				<td colspan='4'>
				".$infoCourse['group']."
				</td>
			</tr>
			<tr>
				<td>
					Modalidad
				</td>
				<td colspan='4'>
				".$infoCourse['modality']."
				</td>
			</tr>";
			
			
			
			
		$html .= "</table>";
		
		$html .= "
		<br>
		<br>
		<table align='center' width='100%'>
				<tr>
				<td>Nombre</td>
				<td>Fecha Inicio</td>
				<td>Fecha Termino</td>
				<td>Calificacion</td>
			</tr>";
			foreach($lstBoleta as $key=>$aux){
				$html .= "<tr>";
				$html .= "<td>".$aux["name"]."</td>";
				$html .= "<td>".$aux["initialDate"]."</td>";
				$html .= "<td>".$aux["finalDate"]."</td>";
				$html .= "<td>".$aux["cal"]."</td>";
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
	$mipdf ->set_paper("A4", "portrait");
	 
	# Cargamos el contenido HTML.
	$mipdf ->load_html(utf8_decode($html));
	 
	# Renderizamos el documento PDF.
	$mipdf ->render();
	 
	# Enviamos el fichero PDF al navegador.
	$mipdf ->stream('certificadodeValidez.pdf',array('Attachment' => 0));
			


?>