<?php
include_once('../initPdf.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();


$module->setCourseModuleId($_GET['id']);
$infoM  = $module->InfoCourseModule();

$personal->setPersonalId($infoM['access'][1]);
$infoPerso = $personal->InfoBasica();
$infoDoc = $personal->Info();

// echo '<pre>'; print_r($infoM);
// exit;
	

header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Disposition: attachment;Filename=contrato_'.$infoM['courseModuleId'].'.doc');


$html .= "<meta http-equiv=\'Content-Type\' content=\'text/html; charset=Windows-1252\'>";


	$html .= "
	<html>
	<head>
	<title>CONTRATO</title>
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
		</table>
		<br>	
		<br>	
		<br>	
		<br>	
		<br>	
		<center><b class='txtTicket'>Datos del Contrato</b></center>
		<br>	
		<br>
		<table align='center' width='100%' border='0' class='txtTicket'>
			<tr>
				<td style='width:34%'>Nombre del Docente</td>
				<td>".$infoDoc['name']."</td>
			</tr>
			<tr>
				<td>Numero de INE</td>
				<td>".$infoDoc['INE']."</td>
			</tr>
			<tr>
				<td>Registro Federal del Contribuyente</td>
				<td>".$infoDoc['rfc']."</td>
			</tr>
			<tr>
				<td>Clave Unica de Registro de Poblacion</td>
				<td>".$infoDoc['curp']."</td>
			</tr>
			<tr>
				<td>Domicilio Actual:</td>
				<td>".$infoDoc['calle']." No. ".$infoDoc['nInterior'].", ".$infoDoc['colonia']." ".$infoDoc['estado']." ".$infoDoc['ciudad']."</td>
			</tr>
			<tr>
				<td>Materia a Impartir:</td>
				<td>".$infoM['name']."</td>
			</tr>
			<tr>
				<td>Grupo Designado:</td>
				<td>".$infoM['nombre']."</td>
			</tr>
			<tr>
				<td>Posgrado Academico:</td>
				<td>".$infoM['subjectName']."</td>
			</tr>
			<tr>
				<td>Lugar de Imparticion:</td>
				<td>".$infoM['nombre']."</td>
			</tr>
			<tr>
				<td>Total de Horas de Imparticion:</td>
				<td>".$infoM['nombre']."</td>
			</tr>
			<tr>
				<td>No. Cuenta Bancaria:</td>
				<td>".$infoPerso['infoBanco'][0]['numCuenta']."</td>
			</tr>
			<tr>
				<td>Clave Interbancaria:</td>
				<td>".$infoPerso['infoBanco'][0]['claveInterbancaria']."</td>
			</tr>
			<tr>
				<td>Institucion Bancaria:</td>
				<td>".$infoPerso['infoBanco'][0]['nombreBanco']."</td>
			</tr>
			<tr>
				<td>Dias y Modalidad de Imparticion:</td>
				<td>".$infoPerso['nombre']."</td>
			</tr>
			";
		$html .= "</table>";
	
		$html .= "<br>";
		$html .= "<br>";
		
		
		
		$html .= "<br>";
		$html .= "<br>";
	
		$html .= "<table align='center' width='100%' border='0' class='txtTicket'>";
		$html .= "
		<tr>
		<td style='width:34%'>No. de Contrato</td>
		<td></td>
		</tr>
		<tr>
		<td>Fecha de Elaboracion del Contrato</td>
		<td></td>
		</tr>
		<tr>
		<td>Tipo de Contrato</td>
		<td></td>
		</tr>
		<tr>
			<td colspan='2'>
				Anexar Copias: Credencial de Elector, curp, hoja del sat, comprobante de domicilio, cedula profesional 
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				No. Telefonico Facebook Correo Electronico
			</td>
		</tr>
		";
		$html .= "</table>";


	$html .= "	
	</body>
	</html>

	";
	

			
	echo $html;


?>