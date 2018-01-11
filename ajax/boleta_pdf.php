<?php
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();



		$contenido .=	"<center><b>Boleta de Calificaciones</b></center><br><br>";
		$contenido .=	"<center><b>".$infoSol['name']."</b></center><br>";
		$contenido .=	"<center><b>".$infoSol['nombreMajor']."</b></center><br><br>";
	
		foreach($lstCal8 as $key=>$aux){
			$contenido .= "<table width='100%' >";
			$contenido .= "<tr>
				<td width='70%'><b>Materias</b></td>
				<td colspan='2' style='text-align:center'><b>Calificacion</b></td>
				<td style='text-align:center'><b>Creditos</b></td></tr>";
			$contenido .= "<tr><td>".$aux['semesterId']." ".$aux['tipoPeriodo']."</td><td style='text-align:center'><b>Cifra</b></td><td style='text-align:center'><b>Letra</b></td><td></td></tr>";
			foreach($aux['materias'] as $key2=>$aux2){
			$h =  $util->num2letras($aux2['calificacion']);
			$contenido .= "
			<tr>
			<td>".$aux2['name']."</td>
			<td style='text-align:center'>".$aux2['calificacion']."</td>
			<td style='text-align:center'>".$h."</td>
			<td style='text-align:center'>".$aux2['creditos']."</td></tr>"; 
			}
			$contenido .= "</table>
			<br><br>";
		}
		

	
	
	$html .= "
	<html>
	<head>
	<title>CONSTANCIA</title>
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
	
	
	
		<table align='center' width='100%' border='0' class ='txtTicket'>
			<tr>
				<td  align='left'>
					<img src='".DOC_ROOT."/images/logo_correo.jpg'>
				</td>
			</tr>
			<tr>
				<td align='right'>
					<table align='right'  border='0' width='40%'>
							<tr>
								<td><b>Area:</b></td>
								<td>Dirección Académica</td>
							</tr>
							<tr>
								<td><b>Nombre del Alumno:</b></td>
								<td>".$infoSol['names']." ".$infoSol['lastNamePaterno']." ".$infoSol['lastNameMaterno']."</td>
							</tr>
							
					</table>
					<br>
					<br>
					<br>
					<br>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
			</tr>
			<tr>
			<td>
			";

	$html .= $contenido;	
	
	$html .= "</td></tr>";	
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