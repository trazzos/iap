<?php
// echo "<pre>"; print_r($_GET); 
// exit;
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	
	$html = "";
	$countSol = $solicitud->countReferenciaBancaria();
	$student->setUserId($_SESSION['User']['userId']);
	$infoStudent = $student->GetInfo();
	
	if($infoStudent['referenciaBancaria']<>''){
		$countSol = 1;
	}else{
		$html = "Tus datos de referencia bancaria no existen, por favor solicitalos";
		exit;
	} 
	
	
	// exit;
	$html .= "
	<html>
	<head>
	<title>Calendario de Pagos</title>
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
	.float{

		width: 450px; !important;
		height: 200px; !important;
		border: 2px solid;
		display: inline-block
	}
	

	</style>
	</head>
	<body>
	<img src='".DOC_ROOT."/images/logo_correo.jpg'>
	<br>
	<br>
	<br>
	<div class='txtTicket' >
	A efectos de poder identificar los pagos que realice a este Instituto durante su permanencia como alumno de posgrado,envío a Usted; la siguiente información:
	<br>
	<br>
	<center>
	PORCENTAJE DE BECA AUTORIZADO: ".$infoStudent['porcentajeBeca']." % <br>
	BANCO: BBVABANCOMER<br>
	N° DE REFERENCIA PERSONAL: ".$infoStudent['referenciaBancaria']."<br>
	</center>
	

	<b>Referencia Bancaria:</b>
		</div>
		<br>
		<br>
		
		<table width='100%' class='txtTicket'>
			<thead>
			<tr>
				<th width=''>Metodo de Pago</th>
				<th width=''>Datos Bancarios Requeridos</th>		 

			</tr>
			</thead>
			<tbody>
			<tr>
				<td align='center'>En ventanilla</td>
				<td align='center'>Con número de Convenio: 1234005</td>
			</tr>
			<tr>
				<td align='center'>Por transferencia de un banco distinto a BBVA Bancomer</td>
				<td align='center'>Con número de clabe interbancaria:012100001895258585</td>
			</tr>
			<tr>
				<td align='center'>Por transferencia con cuenta BBVA Bancomer</td>
				<td align='center'>Con número de Cuenta: 0189525858</td>
			</tr>
			</tbody>
		</table>
		
		<br>
		<br>
		<div class='txtTicket' >
		<b>Nota Aclaratoria:</b>
		<br>
		<br>
		<li>En todos los casos deberá anotar el número de referencia personal y en el concepto, de preferencia el nombre del alumno; a menos de que el pago sea distinto a la colegiatura, deberá anotar como concepto el servicio que como alumno requiera (ejemplo: constancias, examen extraordinario, etc.).
		<br>
		<br>
		<li>En caso de dudas o aclaraciones al respecto, deberá comunicarse a los teléfonos (961) 125 15 08 al 10, ext. 116.
		</div>
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
	$mipdf ->set_paper("A4", "");
	 
	# Cargamos el contenido HTML.
	$mipdf ->load_html(utf8_decode($html));
	 
	# Renderizamos el documento PDF.
	$mipdf ->render();
	 
	# Enviamos el fichero PDF al navegador.
	$mipdf ->stream('certificadodeValidez.pdf',array('Attachment' => 0));
			


?>