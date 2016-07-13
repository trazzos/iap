<?php 
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

include_once('init_tcpdf.php');
include_once('config.php');
include_once(DOC_ROOT.'/libraries_tcpdf.php');

	$iapConfig = $main->Config();

$month = array("","ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");#n

	$course->setCourseId($_GET["id"]);
	$infoCourse = $course->Info();

	$addedModules = $course->AddedCourseModules();
	
	foreach($addedModules as $keyModule => $myModule)
	{
		$group->setCourseId($_GET["id"]);
		$group->setCourseModuleId($myModule["courseModuleId"]);			
		$theGroup = $group->DefaultGroup();
		
//		print_r($theGroup);
	}

	end($addedModules);         // move the internal pointer to the end of the array
	$key = key($addedModules);
	$docente = $addedModules[$key]["access"];
	$docente = explode("|", $docente);
	$user->setUserId($docente[1]);
	$docente = $user->Info();
//	print_r($docente);
//$data= $bitacora->Info($_GET["id"]);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, "LEGAL", true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Corporativo VIP');
$pdf->SetTitle("DOCUMENTO CONFIDENCIAL. ".$data["asunto"]);

//echo PDF_HEADER_LOGO;
//echo PDF_HEADER_TITLE;
//echo PDF_HEADER_STRING;
// set default header data
$pdf->SetHeaderData("", PDF_HEADER_LOGO_WIDTH, "");

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//echo PDF_MARGIN_TOP;
$pdf->SetMargins(35, 10, 10);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.

foreach($theGroup as $student)
{
	$pdf->AddPage();
	$fontname = $pdf->addTTFfont(DOC_ROOT.'/tcpdf/fonts/avantb.ttf', 'TrueTypeUnicode', '', 32);
	$pdf->SetFont('avant', 'B', 17, '', true);
	if($infoCourse["backDiploma"]!=null || $infoCourse["backDiploma"]!='')
    $sede="Sede: ".$infoCourse["backDiploma"];
	// set bacground image
	$img_file = 'images/logos/green_bars.JPG';
//	$img_file = K_PATH_IMAGES.'logos/green_bars.JPG';
	$pdf->Image($img_file, 15, 80, 10, 250, '', '', '', true, 300, '', false, false, 0);
	// restore auto-page-break status
	$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
	// set the starting point for the page content
	$pdf->setPageMark();
	
	// Set some content to print
	$html = '
	<table><tr><td align="center"><img src="images/logos/iap_logo.JPG" width="200"></td></tr></table>
	<h1 align="center"><br>INSTITUTO DE ADMINISTRACION PUBLICA<br>DEL ESTADO DE CHIAPAS, A.C.</h1>
	<br><br><br>';

	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='12', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	$pdf->SetFont('lucida', '', 16, '', true);
	$html = '<h3 align="center">OTORGA EL PRESENTE</h3><br><br><br>';
	
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='121', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	$pdf->SetFont('cambriab', '', 50, '', true);
	
	$html = '
	<p align="center">DIPLOMA</p>';
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='142', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	$pdf->SetFont('times', '', 18, '', true);
	
	$pdf->SetFont('lucida', '', 16, '', true);
	$html = '
	<br><p align="center">A:</p><br>';
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='158', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	$pdf->SetFont('lucida', 'B', 18, '', true);
	
	$html = '
	<p align="center">'.$student["names"].' '.$student["lastNamePaterno"].' '.$student["lastNameMaterno"].'</p><br>'; 
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='190', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	$pdf->SetFont('lucida', '', 17, '', true);
	
	if($infoCourse["majorName"] == "ESPECIALIDAD")
	{
		$el = "LA";
	}
	else
	{
		$el = "EL";
	}
	$html = '
	<p align="center">POR HABER PARTICIPADO EN '.$el.' '.$infoCourse["majorName"].'</p><br>';
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='213', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	$pdf->SetFont('cambriab', '', 26, '', true);
	
	$html = '
	<p align="center">'.$infoCourse["name"].'</p><p>&nbsp;</p>';
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='235', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	$pdf->SetFont('lucida', '', 15, '', true);
	
	if(!$infoCourse["fechaDiploma"])
	{
		$infoCourse["fechaDiploma"] = date("d").' DE '.$month[date("n")].' DEL '.date('Y');
	}

	$html = '
	<p align="center">TUXTLA GUTIERREZ CHIAPAS, '.$infoCourse["fechaDiploma"].'</p>
	<p>&nbsp;</p>';
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='278', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	$pdf->SetFont('times', '', 10, '', true);
	
	$html = '
	<table><tr><td align="center">_______________________________</td><td align="center">_______________________________</td></tr></table>';
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='305', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	
	if($docente["description"])
	{
		$addDescriptionPonente = '.<br>'.$docente["description"];
	}

	$html = '
	<table><tr><td align="center">'.$iapConfig["presidente"].'.<br>PRESIDENTA DEL IAP CHIAPAS.</td><td align="center">'.$docente["perfil"].' '.$docente["name"].' '.$docente["lastname_paterno"].' '.$docente["lastname_materno"].".<br>PONENTE.".'<br>'.$sede.'</td></tr></table>';
	
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='310', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
}



//print_r($infoCourse);
	$initialDate = $group->Util()->FormatReadableDate($infoCourse["initialDate"]);
	$finalDate = $group->Util()->FormatReadableDate($infoCourse["finalDate"]);

	$pdf->SetFont('times', '', 9, '', true);
	$pdf->AddPage();
	$html = '<p>&nbsp;</p>
	<table border="1" cellpadding="5">
	<tr><td align="left" width="100">Libro:</td><td align="left" width="280">'.$infoCourse["libro"].'</td></tr>
	<tr><td align="left" width="100">Clave:</td><td align="left" width="280">'.$infoCourse["clave"].'</td></tr>
	<tr><td align="left" width="100">Folio:</td><td align="left" width="280">'.$infoCourse["folio"].'</td></tr>
	<tr><td align="left" width="100">Periodo:</td><td align="left" width="280">'.$initialDate.' AL '.$finalDate.'</td></tr>
	<tr><td align="left" width="100"><br><br><br>&nbsp;</td><td align="center" width="280"><br><br><br>'.$infoCourse["encargado"]["name"].' '.$infoCourse["encargado"]["lastname_paterno"].' '.$infoCourse["encargado"]["lastname_materno"].'<br>'.$sede.'</td></tr>
	</table>';
	
	
	// Print text using writeHTMLCell()
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

//$pdf->Output('example_001.pdf', 'I');
$pdf->Output(DOC_ROOT."/diplomas/".$_GET["id"].".pdf", "F");
$pdf->Output(DOC_ROOT."/diplomas/".$_GET["id"].".pdf", "I");

//============================================================+
// END OF FILE
//============================================================+

?>