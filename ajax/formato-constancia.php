<?php
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	
	
	$util = new Util;
	

	$infoSol = $solicitud->Info($_GET['q']);
	
	// echo '<pre>'; print_r($infoSol);
	// exit;

	$infoIns = $solicitud->buscaDondeIns($infoSol['subjectId']);
	
	$ii = explode('-',$infoSol['initialDate']);
	$if = explode('-',$infoSol['finalDate']);
	$fe = explode('-',$infoSol['fechaEntrega']);
	
	
	
	if($fe[1] < 10){
		$fe[1] = str_replace('0','',$fe[1]);
		
	}
	
	$mes = $util->ConvertirMes($fe[1]);

	if($infoSol['nombreMajor']=='MAESTRIA'){
		$prepo = 'de la';
		$prepo2 = 'la';
	}else{
		$prepo = 'del';
		$prepo2 = 'el';
	}
	
	if($infoSol['tiposolicitudId'] ==2 ){
		
		$lstCal = $solicitud->buscaCalificaciones($infoSol['courseId'],$infoSol['userId']);
		
		$contenido .= "<br>
		<div>Que  el <b>C. ".$infoSol['names']." ".$infoSol['lastNamePaterno']." ".$infoSol['lastNameMaterno']."</b>, concluyó ".$prepo2." <b>".$infoSol['nombreMajor']." en ".$infoSol['name']."</b>,
		correspondiente a la  generación ".$ii[0]." - ".$if[0].", plan ".$infoSol['tipoPeriodo'].", obteniendo las siguientes calificaciones.</div><br><br>";
		
		
	
		foreach($lstCal as $key=>$aux){
			$contenido .= "<table width='100%'>";
			$contenido .= "<tr><td width='70%' ><b>Materias</b></td><td colspan='2' style='text-align:center'><b>Calificacion</b></td>
			<td style='text-align:center'><b>Creditos</b></td></tr>";
			$contenido .= "<tr><td>".$aux['semesterId']."° ".$aux['tipoPeriodo']."</td><td style='text-align:center'><b>Cifra</b></td>
			<td style='text-align:center'><b>Letra</b></td><td style='text-align:center'></td></tr>";
			foreach($aux['materias'] as $key2=>$aux2){
			$h =  $util->num2letras($aux2['calificacion']);
			$contenido .= "<tr><td style='text-align:center'>".$aux2['name']."</td><td style='text-align:center'>".$aux2['calificacion']."</td><td style='text-align:center'>".$h."</td><td style='text-align:center'>".$aux2['creditos']."</td></tr>"; 
			}
			$contenido .= "</table>
			<br><br>";
		}
		
		$contenido .= "<br><br>A petición del Interesado  y para los usos legales que mejor convengan, 
		se extiende la presente en la ciudad de Tuxtla Gutiérrez, Chiapas a los  ".$fe[2]." dias del  mes de ".$mes." del año ".$fe[0].".<br><br>";
	
		$contenido .= "<br><br><br>Atentamente
		<br>
		<br>
		<br>
		".$infoSol['nombreFirma']."<br>
		".$infoSol['puestofirmante']."<br>
		";
	} 
	
	if($infoSol['tiposolicitudId'] == 1){
		
	
		
		$contenido .= "<br>
		<div class='parrafo'>Que  el C. <b>".$infoSol['names']." ".$infoSol['lastNamePaterno']." ".$infoSol['lastNameMaterno']."</b>,
		está inscrito al <b>".$infoSol['nivelInscrito']."° ".$infoSol['tipoPeriodo']." ".$prepo." ".$infoSol['nombreMajor']." </b>
		en <b>".$infoSol['name']."</b>, correspondiente a la  generación <b>".$ii[0]." - ".$if[0]."</b>  los días  ".$infoSol['imprimeHorario'].".</div>";
	
		$contenido .= "<br><br><br><div class='parrafo'>A petición del Interesado  y para los usos legales que mejor convengan, 
		se extiende la presente en la ciudad de Tuxtla Gutiérrez, Chiapas a los  ".$fe[2]." dias del  mes de ".$mes." del año ".$fe[0].".</div>";
		
		$contenido .= "<br><br><br>Atentamente
		<br>
		<br>
		".$infoSol['nombreFirma']."<br>
		".$infoSol['puestofirmante']."<br>
		";
	} 
	
	if($infoSol['tiposolicitudId'] == 6){
		
		
		$contenido .= "<br>
		<div class='parrafo'>Que  el C. <b>".$infoSol['names']." ".$infoSol['lastNamePaterno']." ".$infoSol['lastNameMaterno']."</b> , concluyó los estudios  
		".$prepo." <b>".$infoSol['nombreMajor']."</b> en <b>".$infoSol['name']."</b>, correspondiente a la  generación ".$ii[0]." - ".$if[0].", así mismo se encuentra 
		en proceso de certificación de estudios.</div>";
	
		$contenido .= "<br><br><br>A petición del Interesado  y para los usos legales que mejor convengan, 
		se extiende la presente en la ciudad de Tuxtla Gutiérrez, Chiapas a los  ".$fe[2]." dias del  mes de ".$mes." del año ".$fe[0]."";
		
		$contenido .= "<br><br><br>Atentamente
		<br>
		<br>
		".$infoSol['nombreFirma']."<br>
		".$infoSol['puestofirmante']."<br>
		";
	} 
	
	if($infoSol['tiposolicitudId'] == 7){
		
		$ii = explode('-',$infoSol['initialDate']);
		$if = explode('-',$infoSol['finalDate']);
		$fe = explode('-',$infoSol['fechaEntrega']);
				
		$contenido .= "<br><br><br><div>Que  se ha solicitado ante la Secretaria de Educación la autorización para realizar 
		los trámites  de titulación del <b>LIC. ".$infoSol['names']." ".$infoSol['lastNamePaterno']." ".$infoSol['lastNameMaterno']."</b>, 
		quien terminó ".$prepo2."  <b>".$infoSol['nombreMajor']."</b> en <b>".$infoSol['name']."</b> generación ".$ii[0]." - ".$if[0].".</div>";
	
		$contenido .= "<br><br><br><div class='parrafo'>A petición del Interesado  y para los usos legales que mejor convengan, 
		se extiende la presente en la ciudad de Tuxtla Gutiérrez, Chiapas a los  ".$fe[2]." dias del  mes de ".$mes." del año ".$fe[0].".</div>";
		
		$contenido .= "<br><br><br>Atentamente
		<br>
		<br>
		".$infoSol['nombreFirma']."<br> 
		".$infoSol['puestofirmante']."<br>
		";
	} 
	
	if($infoSol['tiposolicitudId'] == 4){
		
		$lstCal8 = $solicitud->buscaCalificaciones($infoSol['courseId'],$infoSol['userId']);
		include('boleta_pdf.php');
		exit;
		
	}
	
	if($infoSol['tiposolicitudId'] == 8){
		
		$lstCal = $solicitud->buscaCalificaciones($infoSol['courseId'],$infoSol['userId']);
		
		$contenido .= "<br>
		<div>Que  el <b>C. ".$infoSol['names']." ".$infoSol['lastNamePaterno']." ".$infoSol['lastNameMaterno']."</b>, concluyó ".$prepo2." <b>".$infoSol['nombreMajor']." en ".$infoSol['name']."</b>,
		correspondiente a la  generación ".$ii[0]." - ".$if[0].", plan ".$infoSol['tipoPeriodo'].", obteniendo las siguientes calificaciones.</div><br><br>";
		
		
	
		foreach($lstCal as $key=>$aux){
			$contenido .= "<table width='100%'>";
			$contenido .= "<tr><td width='70%' ><b>Materias</b></td><td colspan='2' style='text-align:center'><b>Calificacion</b></td>
			<td style='text-align:center'><b>Creditos</b></td></tr>";
			$contenido .= "<tr><td>".$aux['semesterId']."° ".$aux['tipoPeriodo']."</td><td style='text-align:center'><b>Cifra</b></td>
			<td style='text-align:center'><b>Letra</b></td><td style='text-align:center'></td></tr>";
			foreach($aux['materias'] as $key2=>$aux2){
			$h =  $util->num2letras($aux2['calificacion']);
			$contenido .= "<tr><td style='text-align:center'>".$aux2['name']."</td><td style='text-align:center'>".$aux2['calificacion']."</td><td style='text-align:center'>".$h."</td><td style='text-align:center'>".$aux2['creditos']."</td></tr>"; 
			}
			$contenido .= "</table>
			<br><br>";
		}
		
		$contenido .= "CUBRIENDO EL 50% DEL TOTAL DE CREDITOS DEL PLAN DE ESTUDIOS  ".strtoupper($prepo)." ".strtoupper($infoSol['name'])."<br><br>";
		
		$contenido .= "<br><br>A petición del Interesado  y para los usos legales que mejor convengan, 
		se extiende la presente en la ciudad de Tuxtla Gutiérrez, Chiapas a los  ".$fe[2]." dias del  mes de ".$mes." del año ".$fe[0].".<br><br>";
	
		$contenido .= "<br><br><br>Atentamente
		<br>
		<br>
		<br>
		".$infoSol['nombreFirma']."<br>
		".$infoSol['puestofirmante']."<br>
		";

	}
	
	
	
	$html .= "
	<html>
	<head>
	<title>CONSTANCIA</title>
	<style type='text/css'>
	.parrafo{
		text-align:justify
	}
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
	
	
	
		<table align='center' width='100%' border='0'>
			<tr>
				<td  align='left'>
					<img src='".DOC_ROOT."/images/logo_correo.jpg'>
				</td>
			</tr>
			<tr>
				<td align='right'>
					<table align='right'  border='0'>
							<tr>
								<td><b>Area:</b></td>
								<td>Dirección Académica</td>
							</tr>
							<tr>
								<td><b>Constancia:</b></td>
								<td>".$infoSol['folioSolicitud']."</td>
							</tr>
							<tr>
								<td><b>Fecha:</b></td>
								<td>".$util->FormatDateMySql($infoSol['fechaEntrega'])."</td>
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
					<b>A QUIEN CORRESPONDA:</b>
					<br>
					<br>
					El que suscribe C. ".$infoSol['nombreFirma']." ".$infoSol['puestofirmante']." del Instituto de Administración  Pública del Estado de Chiapas.
					<br>
					<br>
					<center><b>H A C E &nbsp;&nbsp;&nbsp;&nbsp; C O N S T A R </b> </center>
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
	// $mipdf ->stream(DOC_ROOT.'/alumnos/solicitud/solicitud_'.$_GET['q'].'.pdf',array('Attachment' => 1));
	$pdf = $mipdf->output();
	file_put_contents(DOC_ROOT.'/alumnos/solicitud/solicitud_'.$_GET['q'].'.pdf', $pdf);		
	header("Location:".WEB_ROOT."/alumnos/solicitud/solicitud_".$_GET["q"].".pdf");
	exit;

?>