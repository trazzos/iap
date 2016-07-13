<?php 
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

include_once('init_tcpdf.php');
include_once('config.php');
include_once(DOC_ROOT.'/libraries_tcpdf.php');

$month = array("","ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");#n

	//modulos conformando el curso
	$iapConfig = $main->Config();

	$course->setCourseId($_GET["courseId"]);
	$infoCourse = $course->Info();
	$addedModules = $course->AddedCourseModules();

	$cuatrimesters = $course->HowManyCuatrimesters();
	$smarty->assign('cuatrimesters', $cuatrimesters);

	foreach($addedModules as $keyModule => $myModule)
	{
		$group->setCourseId($_GET["courseId"]);
		$group->setCourseModuleId($myModule["courseModuleId"]);			
		$theGroup = $group->DefaultGroup();
		
		foreach($theGroup as $keyGroup => $member)
		{
			if($member["userId"] != $_GET["id"])
			{
				unset($theGroup[$keyGroup]);
				continue;
			}
			
			$mark = $student->GetAcumuladoCourseModule($myModule["courseModuleId"], $member["userId"]);
			//normalize mark
			$mark = $group->Util()->NormalizeMark($mark);
			$marks[$member["userId"]]["marks"][$myModule["courseModuleId"]] = $mark;
		}
		
	}

	$initialDate = $group->Util()->FormatReadableDate($infoCourse["initialDate"]);
	$finalDate = $group->Util()->FormatReadableDate($infoCourse["finalDate"]);
	
	foreach($marks as $keyMark => $mark)
	{
		$realMark = array_sum($mark["marks"]) / count($mark["marks"]);
		$user->setUserId($keyMark);
		$userInfo = $user->InfoUser();
		$marks[$keyMark]["info"] = $userInfo;

	}
	
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
		public function Header() {
        // Logo
				global $theGroup;
				$group = new Group;
				$desglosadoGrupo = $group->GetMenWomen($theGroup);
				$course = new Course;
				$course->setCourseId($_GET["id"]);
				$infoCourse = $course->Info();
				
				$main = new Main;
				$iapConfig = $main->Config();
				
 /*       $image_file = 'images/logos/dan1.jpg';
        $this->Image($image_file, 0, 0, '216', '121', 'JPG', '', 'T', 2, 300, '', false, false, 0, false, false, false);

        $image_file = 'images/logos/dan2.jpg';
        $this->Image($image_file, 0, 117, '216', '98', 'JPG', '', 'T', 2, 300, '', false, false, 0, false, false, false);

        $image_file = 'images/logos/dan3.jpg';
        $this->Image($image_file, 0, 200, '216', '68', 'JPG', '', 'T', 2, 300, '', false, false, 0, false, false, false);
				
        $image_file = 'images/logos/daniel2.jpg';
        $this->Image($image_file, 0, 256, '216', '60', 'JPG', '', 'T', true, 300, '', false, false, 0, false, false, false);*/

        $image_file = 'images/logos/sello.jpg';
        $this->Image($image_file, 10, 12, '30', '31', 'JPG', '', 'T', true, 300, '', false, false, 0, false, false, false);

        $image_file = 'images/logos/foto_placeholder.png';
        $this->Image($image_file, 9, 62, '34', '51', 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);

        $image_file = 'images/logos/tablebg.png';
        $this->Image($image_file, 31, 124, '168', '184', 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);

    }
}

$pdf = new MYPDF('P', PDF_UNIT, "LEGAL", true, 'UTF-8', false);
$pdf->SetMargins(10, 30, 10);
$pdf->SetHeaderMargin(5);
//$fontname = $pdf->addTTFfont(DOC_ROOT.'/tcpdf/fonts/arial.ttf', 'TrueTypeUnicode', '', 32);

// create new PDF document
$pdf->addPage();
// set Rotate
//$params = $pdf->serializeTCPDFtagParameters(array(90));

// other configs
$pdf->setOpenCell(0);
$pdf->SetCellPadding(0);
$pdf->setCellHeightRatio(1.25);


	$pdf->SetFont('eras', 'B', 14);
	$html = 'GOBIERNO DEL ESTADO DE CHIAPAS<br>
		SECRETARÍA DE EDUCACION';
	$pdf->MultiCell(0, 10, $html, 0, 'C', false, '', 14, 13, false, 'M', true);					

	$pdf->SetFont('eras', 'B', 12);
	$html = 'SUBSECRETARÍA DE EDUCACIÓN ESTATAL';
	$pdf->MultiCell(0, 5, $html, 0, 'C', false, '', 14, 21, false, 'M', true);					

	$pdf->SetFont('eras', 'B', 11);
	$html = 'DIRECCIÓN DE EDUCACIÓN SUPERIOR';
	$pdf->MultiCell(0, 5, $html, 0, 'C', false, '', 14, 27, false, 'M', true);					

	$pdf->SetFont('eras', 'B', 10);
	$html = 'DEPARTAMENTO DE SERVICIOS ESCOLARES Y BECAS';
	$pdf->MultiCell(0, 5, $html, 0, 'C', false, '', 14, 33, false, 'M', true);					

	$pdf->SetFont('calibri', '', 7);
	$html = 'SE-CEIAP';
	$pdf->MultiCell(0, 5, $html, 0, 'C', false, '', 159, 8.5, false, 'M', true);					

	$pdf->SetFont('calibri', '', 10);
	$html = 'FOLIO';
	$pdf->MultiCell(0, 5, $html, 0, 'C', false, '', 127, 38, false, 'M', true);					

	$pdf->SetFont('calibri', '', 10);
	$html = 'LA &nbsp;DIRECCIÓN &nbsp;DEL &nbsp;'.$iapConfig["name_long"].'<br>RÉGIMEN &nbsp;&nbsp;PARTICULAR,&nbsp;&nbsp;TURNO &nbsp;MIXTO, &nbsp;&nbsp;CLAVE &nbsp;&nbsp;'.$iapConfig["identifier"].'. &nbsp;CERTIFICA QUE: ';
	$pdf->MultiCell(135, 10, $html, 0, 'L', false, '', 49, 51, true, false, true);					

	$pdf->SetFont('calibri', '', 11);
	$html = 'EL (LA) C.: ';
	$pdf->MultiCell(135, 10, $html, 0, 'L', false, '', 49, 64, true, false, true);					

//print_r($marks);

$html = strtoupper($marks[$_GET["id"]]["info"]["names"]." ".$marks[$_GET["id"]]["info"]["lastNamePaterno"]." ".$marks[$_GET["id"]]["info"]["lastNameMaterno"]);


$total= strlen($html);


if( $total <50)
	{
				$pdf->SetFont('calibri', 'B', 14);
	
	}
else{
				$pdf->SetFont('calibri', 'B', 11);
	}
	
	
	$html = strtoupper($marks[$_GET["id"]]["info"]["names"]." ".$marks[$_GET["id"]]["info"]["lastNamePaterno"]." ".$marks[$_GET["id"]]["info"]["lastNameMaterno"]);
	
	
	
	
	$pdf->MultiCell(135, 10, $html, 0, 'L', false, '', 70, 64.5, true, false, true);					

	$pdf->SetFont('calibri', '', 11);
	$html = 'CON No. DE CONTROL:';
	$pdf->MultiCell(135, 10, $html, 0, 'L', false, '', 49, 74, true, false, true);					

	$pdf->SetFont('calibri', 'B', 12);
	$html = $marks[$_GET["id"]]["info"]["controlNumber"];
	$pdf->MultiCell(135, 10, $html, 0, 'L', false, '', 100, 74.5, true, false, true);					

	//print_r($infoCourse);
	

	
	$pdf->SetFont('calibri', '', 11);
	$html = 'ACREDITÓ LAS MATERIAS QUE INTEGRAN EL PLAN DE ESTUDIOS DE LA '.$infoCourse["majorName"].' EN:';
	$pdf->MultiCell(130, 10, $html, 0, 'L', false, '', 49, 82, true, false, true);					


$html = $infoCourse["name"];

$total= strlen($html);


if( $total <50)
	{
				$pdf->SetFont('calibri', 'B', 14);
	
	}
else{
				$pdf->SetFont('calibri', 'B', 11);
	}
	
	$html = $infoCourse["name"];
	$pdf->MultiCell(143, 10, $html, 0, 'C', false, '', 49, 92, true, false, true);					

	$pdf->SetFont('calibri', '', 11);
	$html = 'RVOE '.$infoCourse["clave"].' &nbsp;DE &nbsp;FECHA '.$infoCourse["fechaRevoe"];
	$pdf->MultiCell(130, 10, $html, 0, 'L', false, '', 48, 100.5, true, false, true);					

	$pdf->SetFont('calibri', '', 11);
	$html = 'DURANTE EL PERIODO';
	$pdf->MultiCell(130, 10, $html, 0, 'L', false, '', 48, 108.5, true, false, true);					

	$pdf->SetFont('calibri', 'B', 11);
	$html = $initialDate.' AL '.$finalDate;
	$pdf->MultiCell(135, 10, $html, 0, 'L', false, '', 97, 108.5, true, false, true);					

	$pdf->SetFont('calibri', '', 11);
	$html = 'CON LOS RESULTADOS QUE A CONTINUACIÓN SE ANOTAN:';
	$pdf->MultiCell(135, 10, $html, 0, 'L', false, '', 48, 118.5, true, false, true);					

	$pdf->SetFont('calibri', '', 11);
	$html = 'M A T E R I A';
	$pdf->MultiCell(92, 5, $html, 0, 'C', false, '', 32, 126.5, true, false, true);					

	$pdf->SetFont('calibri', '', 10);
	$html = 'CALIFICACIÓN';
	$pdf->MultiCell(30, 5, $html, 0, 'C', false, '', 124, 124.5, true, false, true);					

	$pdf->SetFont('calibri', '', 10);
	$html = 'CIFRA Y LETRA';
	$pdf->MultiCell(30, 5, $html, 0, 'C', false, '', 124, 129.5, true, false, true);					

	$pdf->SetFont('calibri', '', 9);
	$html = 'CRÉDITOS';
	$pdf->MultiCell(20, 5, $html, 0, 'C', false, '', 154, 126.5, true, false, true);					

	$pdf->SetFont('calibri', '', 9);
	$html = 'OBSERVACIÓN';
	$pdf->MultiCell(22, 5, $html, 0, 'C', false, '', 174, 126.5, true, false, true);					

	//echo $cuatrimesters;
	//print_r($cuatrimesters);
	$sum = 0;
	foreach($cuatrimesters as $cuatrimestre)
	{
		switch($cuatrimestre["semesterId"])
		{
			case 1: $nameSemestre = "PRIMER CUATRIMESTRE"; break;
			case 2: $nameSemestre = "SEGUNDO CUATRIMESTRE"; break;
			case 3: $nameSemestre = "TERCER CUATRIMESTRE"; break;
			case 4: $nameSemestre = "CUARTO CUATRIMESTRE"; break;
			case 5: $nameSemestre = "QUINTO CUATRIMESTRE"; break;
			case 6: $nameSemestre = "SEXTO CUATRIMESTRE"; break;
			case 7: $nameSemestre = "SEPTIMO CUATRIMESTRE"; break;
			case 8: $nameSemestre = "OCTAVO CUATRIMESTRE"; break;
			case 9: $nameSemestre = "NOVENO CUATRIMESTRE"; break;
		}
		
		$pdf->SetFont('arial', '', 10);
		$html = "<u><b>".$nameSemestre."</b></u>";
		$y = $pdf->GetY() + 7.5;
		$x = 35;
		$pdf->MultiCell(90, 5, $html, 0, 'C', false, '', $x, $y, true, false, true);					
		
		$y = $pdf->GetY() + 3;
		$pdf->MultiCell(90, 5, "", 0, 'C', false, '', $x, $y, true, false, true);					
		
		foreach($addedModules as $keyModule => $module)
		{
			if($module["semesterId"] != $cuatrimestre["semesterId"])
			{
				continue;
			}

			$html = "<b>".$module["name"]."</b>";
			$y = $pdf->GetY() + 8;
			$x = 35;
			$pdf->MultiCell(90, 5, $html, 0, 'L', false, '', $x, $y, true, false, true);					

			$html = $marks[$_GET["id"]]["marks"][$module["courseModuleId"]];
			$x = 125;
			$pdf->MultiCell(13, 5, $html, 0, 'C', false, '', $x, $y, true, false, true);					
		
			$letter = $group->Util()->MarkLetter($marks[$_GET["id"]]["marks"][$module["courseModuleId"]]);
			$html = $letter;
			$x = 138;
			$pdf->MultiCell(16, 5, $html, 0, 'C', false, '', $x, $y, true, false, true);					
			
			$sum += $marks[$_GET["id"]]["marks"][$module["courseModuleId"]];

		}
		$y = $pdf->GetY() + 8;
		$pdf->MultiCell(90, 5, "", 0, 'C', false, '', $x, $y, true, false, true);					
	}

			$promedio = number_format($sum / count($addedModules), 1);
			$html = "<b>P R O M E D I O</b>";
			$x = 50;
			$pdf->MultiCell(77, 5, $html, 0, 'C', false, '', $x, 303.5, true, false, true);					
			$html = "<b>".$promedio."</b>";
			$pdf->MultiCell(16, 5, $html, 0, 'C', false, '', 125, 303.5, true, false, true);					


// Start Transformation
$pdf->StartTransform();
// Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
$pdf->Rotate(-90, 32, 176);
	$pdf->SetFont('calibri', '', 11);
$pdf->Text(32, 176, 'Este Documento NO es valido si presenta raspaduras o enmendaduras');
// Stop Transformation
$pdf->StopTransform();

//$pdf->Output('example_001.pdf', 'I');
$pdf->Output(DOC_ROOT."/sabanas/".$_GET["id"]."_".$_GET["cuatrimestre"].".pdf", "F");
$pdf->Output(DOC_ROOT."/sabanas/".$_GET["id"]."_".$_GET["cuatrimestre"].".pdf", "I");

//============================================================+
// END OF FILE
//============================================================+

?>