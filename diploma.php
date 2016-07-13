<?php 
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

include_once('init.php');
include_once('config.php');
include_once(DOC_ROOT.'/libraries.php');

$data= $bitacora->Info($_GET["id"]);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Corporativo VIP');
$pdf->SetTitle("DOCUMENTO CONFIDENCIAL. ".$data["asunto"]);

//echo PDF_HEADER_LOGO;
//echo PDF_HEADER_TITLE;
//echo PDF_HEADER_STRING;
// set default header data
$pdf->SetHeaderData("logopdf.JPG", PDF_HEADER_LOGO_WIDTH, "DOCUMENTO CONFIDENCIAL", $data["asunto"]);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(10, PDF_MARGIN_TOP, 10);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

if(file_exists(DOC_ROOT."fotos_bitacora/".$data["idBitacora"].".jpg"))
{
	$foto_bitacora = "fotos_bitacora/".$data["idBitacora"].".jpg";
}


$db->setQuery("SELECT nombreEmpleado, apellidoPaterno, apellidoMaterno FROM usuario WHERE idUsuario = '".$data["elaboro"]."'");
$nombre = $db->GetRow();	

$elaboro = utf8_encode($nombre["apellidoPaterno"].' '.$nombre["apellidoMaterno"].' '.$nombre["nombreEmpleado"]);	
// Set some content to print
$html = '
<br><br><table><tr><td align="center"><img src="images/logopdf.JPG" /><br><br><img src="'.$foto_bitacora.'" /></td></tr></table>
<h1 align="center">Socio de Negocios: '.$data["socio"].'</h1>
<p  align="center">Elaboro: '.$elaboro.'</p>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

?>
<?php
$html = '
<br><br><table>
<tr><td align="center">
Indice<br><br></td></tr>

<tr><td align="left">
1. Cambio de Turno</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1 Pase de Lista.</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2 Entrega de Equipo</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3 Novedades del Turno Salientes<br></td></tr>

<tr><td align="left">
2. Incidencias</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1 Encargados del Inmueble.</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2 Locatarios</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3 Autoridades y Proteccion Civil</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4 Apertura de Locales</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.5 Mantenimiento<br></td></tr>

<tr><td align="left">
3. Suministros</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.1 Suministros.<br></td></tr>

<tr><td align="left">
4. Incidencias Colaboradores</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1 Incidencias Personal Interno.<br></td></tr>

<tr><td align="left">
5. Comentarios</td></tr>
<tr><td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.1 Comentarios Generales.<br></td></tr>


<tr><td align="center">
<br><br><br><img src="images/logopdf.JPG" /></td></tr>

</table>
';

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();

$reporte = $bitacora->Lista($_GET["id"]);

$pdf->SetFont('dejavusans', '', 10, '', true);

$html = '
<br><br>
<h2>Seccion 1: Cambio de Turno.</h2>'; 


include_once("reporte/1-1.php");
include_once("reporte/equipo.php");
include_once("reporte/1-3.php");

$html .= '
<br><br>
<h2>Seccion 2: Incidencias.</h2>'; 

include_once("reporte/2-1.php");
include_once("reporte/2-2.php");
include_once("reporte/2-3.php");
include_once("reporte/2-4.php");
include_once("reporte/2-5.php");

$html .= '
<br><br>
<h2>Seccion 3: Suministros.</h2>'; 

include_once("reporte/3-1.php");

$html .= '
<br><br>
<h2>Seccion 4: Incidencias Personal Interno.</h2>'; 

include_once("reporte/4-1.php");

$html .= '
<br><br>
<h2>Seccion 5: Comentatios Generales.</h2>'; 

include_once("reporte/5-1.php");

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$pdf->AddPage();
$html = '<table><tr><td align="center"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><img src="images/logopdf.JPG" /></td></tr></table>';

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
//$pdf->Output('example_001.pdf', 'I');
$pdf->Output(DOC_ROOT."bitacoras/".$_GET["id"].".pdf", "F");
$pdf->Output(DOC_ROOT."bitacoras/".$_GET["id"].".pdf", "I");

//============================================================+
// END OF FILE
//============================================================+

?>