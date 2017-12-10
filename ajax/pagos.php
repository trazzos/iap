<?php
// echo "<pre>"; print_r($_GET); 
// exit;
	include_once('../initPdf.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	
	

	// $student->setUserId($_SESSION['User']['userId']);
	$infoCar = $student->infoCarrera();
	$lstPagos = $student->verCalendarioPagoscxc(); 
 
	// echo '<pre>'; print_r($infoCar);
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

		width: 459px; !important;
		height: 200px; !important;
		
		display: inline-block
	}
	

	</style>
	</head>
	<body>
	<br>	
<img src='".DOC_ROOT."/images/logo_correo.jpg'>	
	<center>
	Estatus Financiero<br>
	".utf8_encode(utf8_decode($infoCar['nombrenivel']))."<br>
	".$infoCar['ciclo']."</center><br>
	<br>
	<br>

	";
			
	foreach($lstPagos as $key=>$aux){
		$html .= "<div class='float txtTicket'>".$aux['periodo']."
			<table width='100%' class='txtTicket'>
			<tr>
			<td>Fecha de Pago</td>
			<td>Descripcion</td>
			<td>Importe</td>
			<td>Beca</td>
			<td>Total a pagar</td>
			<td>Abono</td>
			<td>Saldo</td>
			</tr> ";
			foreach($aux['pagos'] as $key4=>$aux4){
			$html .= "
			<tr>
			<td>".$aux4['inicioPago']."</td> 
			<td>".$aux4['descripcion']."</td> 
			<td>$ ".number_format($aux4['importe'],2)."</td>
			<td>"; 
			
			if($aux4['claveconcepto'] <> 9 and $aux4['claveconcepto'] <> 12){
				$html .= $aux4['beca'].' %';
			} 
				
			
			$html .= " </td>
			<td>$ ".number_format($aux4['totalPagar'],2)."</td>
			<td>$ ".number_format($aux4['abono'],2)."</td>
			<td>$ ".number_format($aux4['totalPagar']-$aux4['abono'],2)."</td>
			</tr> ";
			}
			
			$html .= "</table>
		</div><font color='white'>__________</font>";
		if(($key+1)==2 or ($key+1) == 4 or ($key+1) == 8){
			$html .= "<div style='clear: both'></div>";
			$html .= "<br'>";
			$html .= "<br'>";

		}
	}
			
	
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
	$mipdf ->set_paper("A4", "landscape");
	 
	# Cargamos el contenido HTML.
	$mipdf ->load_html(utf8_decode($html));
	 
	# Renderizamos el documento PDF.
	$mipdf ->render();
	 
	# Enviamos el fichero PDF al navegador.
	$mipdf ->stream('certificadodeValidez.pdf',array('Attachment' => 0));
			


?>