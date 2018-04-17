<?php
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	$module->setCourseModuleId($_GET['Id']);
	$infoM  = $module->InfoCourseModule();

	$personal->setPersonalId($infoM['access'][1]);
	$infoPerso = $personal->InfoBasica();
	$infoDoc = $personal->Info();

		
	if($infoM['modality'] == 'Online'){
		$lugarImparticion = "Sistema de Educacion en Linea";
	}else{
		$lugarImparticion = "Ediificio Administrativo";
	}
	
	


	// echo "<pre>"; print_r($infoM);
    // exit;

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
		<table align='center' width='100%' border='1' class='txtTicket'>
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
				<td>".$infoM['groupA']."</td>
			</tr>
			<tr>
				<td>Posgrado Academico:</td>
				<td>".$infoM['subjectName']."</td>
			</tr>
			<tr>
				<td>Lugar de Imparticion:</td>
				<td>".$lugarImparticion."</td>
			</tr>
			<tr>
				<td>Total de Horas de Imparticion:</td>
				<td>".$infoM['hora']."</td>
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
		
		$html .= "<div class='txtTicket'>Desglose (".$infoM['hora'].") (".$infoM['tarifaMtro'].") = $  ".number_format(($infoM['tarifaMtro']*$infoM['hora']),2)." iva incluido menos impuestos</div>";
		
		$html .= "<br>";
		$html .= "<br>";
		
		$html .= "<table align='center' width='50%' border='1' class='txtTicket'>";
		$html .= "<tr>";
		$html .= "<td>Concepto</td>";
		$html .= "<td>Importe</td>";
		$html .= "</tr>";
		
		$html .= "<tr>";
		$html .= "<td>Importe</td>";
		$html .= "<td>".number_format(($infoM['subtotal']/(1.16)),2)."</td>";
		$html .= "</tr>";
		
		$html .= "<tr>";
		$html .= "<td>IVA</td>";
		$html .= "<td>".number_format((($infoM['subtotal']/(1.16))*(.16)),2)."</td>";
		$html .= "</tr>";
		
		$html .= "<tr>";
		$html .= "<td>subtotal</td>";
		$html .= "<td>".$infoM['subtotal']."</td>";
		$html .= "</tr>";
		
		$html .= "<tr>";
		$html .= "<td>rendicion isr</td>";
		$html .= "<td>".number_format(($infoM['subtotal']/(1.16))*(.1),2)."</td>";
		$html .= "</tr>";
		
		$html .= "<tr>";
		$html .= "<td>rendicion iva</td>";
		$html .= "<td>".number_format(((($infoM['subtotal']/(1.16))*(.16)))*(2/3),2)."</td>";
		$html .= "</tr>";
		
		$html .= "<tr>";
		$html .= "<td>total</td>";
		$html .= "<td>".number_format($infoM['subtotal']-(($infoM['subtotal']/(1.16))*(.1))-(((($infoM['subtotal']/(1.16))*(.16)))*(2/3)),2)."</td>";
		$html .= "</tr>";
		
		$html .= "</table>";
		
		
		$html .= "<br>";
		$html .= "<br>";
	
		$html .= "<table align='center' width='100%' border='1' class='txtTicket'>";
		$html .= "
		<tr>
		<td style='width:34%'>No. de Contrato</td>
		<td>".$infoM['noContrato']."</td>
		</tr>
		<tr>
		<td>Fecha de Elaboracion del Contrato</td>
		<td>".$infoM['fechaContrato']."</td>    
		</tr>
		<tr>
		<td>Tipo de Contrato</td>
		<td>Persona ".$infoDoc['tipoContrato']."</td>
		</tr>
		<tr>
			<td colspan='2'>
				Anexar Copias: Credencial de Elector, curp, hoja del sat, comprobante de domicilio, cedula profesional 
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				No. Telefonico: ".$infoDoc['celular']." Facebook: ".$infoDoc['facebook']."
				
				<br>
				<br>
				Correo Electronico:
				".$infoDoc['correo']."
			</td>
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