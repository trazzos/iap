<?php
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

include_once('init_tcpdf.php');
include_once('config.php');
include_once(DOC_ROOT.'/libraries_tcpdf.php');


$month = array("","ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");#n

//modulos conformando el curso
$iapConfig = $main->Config();

$course->setCourseId($_GET["id"]);
$infoCourse = $course->Info();
$addedModules = $course->AddedCourseModules();

$cuatrimesters = $course->HowManyCuatrimesters();
$smarty->assign('cuatrimesters', $cuatrimesters);

$course->setCourseId($_GET['id']);
$info_course=$course->info();

//echo "<pre>".print_r($info_course)."</pre>";exit;

foreach($addedModules as $keyModule => $myModule)
{
    $group->setCourseId($_GET["id"]);
    $group->setCourseModuleId($myModule["courseModuleId"]);
    $theGroup = $group->DefaultGroup();

    if($myModule["semesterId"] != $_GET["cuatrimestre"] && $_GET["cuatrimestre"] != -1)
    {
        unset($addedModules[$keyModule]);
        continue;
    }
    //print_r($theGroup);
    foreach($theGroup as $keyGroup => $member)
    {
        $mark = $student->GetAcumuladoCourseModule($myModule["courseModuleId"], $member["userId"]);
        $marks[$member["userId"]]["marks"][$myModule["courseModuleId"]] = $mark;
    }
    //echo "<pre>".print_r($marks)."</pre>";exit;

}

//print_r($desglosadoGrupo);
if($marks)
{
    foreach($marks as $keyMark => $mark)
    {
        $realMark = array_sum($mark["marks"]) / count($mark["marks"]);
        //$marks[$keyMark]["marks"]["finalMark"] = $realMark;
        $user->setUserId($keyMark);
        $userInfo = $user->InfoUser();
        $marks[$keyMark]["info"] = $userInfo;

        if($info_course["majorName"]=="MAESTRIA" || $info_course["majorName"]=="ESPECIALIDAD")
        {
            // print_r($marks[$keyMark]["info"]['userId']);
            $student->setuserId($marks[$keyMark]["info"]['userId']);
            $marks[$keyMark]["ccc"]=$student->info_subject($_GET['id']);
            $marks[$keyMark]["info"]["controlNumber"]=$marks[$keyMark]["ccc"]["matricula"];
        }


        //$marks[$keyMark]["info"]["matricula"]="0001";


        //		$course->setCourseId($_GET["id"]);
        //		$courseInfo = $course->Info();
        //		$marks[$keyMark]["course"] = $courseInfo;
    }
    //echo "<pre>".print_r($marks)."</pre>";exit;

    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);

    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
    array_push($marks, $marks[57]);
}

$totalPages = ceil(count($marks) / 15);

//normalize
$consecutivo = 0;
if($marks)
{
    foreach($marks as $key => $value)
    {
        $marks[$consecutivo] = $marks[$key];
        unset($marks[$key]);
        $markConsecutivo = 0;

        if($value["marks"])
        {
            foreach($value["marks"] as $keyMark => $valueMark)
            {
                $marks[$consecutivo]["marks"][$markConsecutivo] = $value["marks"][$keyMark];
                unset($marks[$consecutivo]["marks"][$keyMark]);
                $markConsecutivo++;
            }
        }
        $consecutivo++;

    }
}
//	print_r($marks);
//$data= $bitacora->Info($_GET["id"]);
// create new PDF document
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Test( $ae ) {
        if( !isset($this->xywalter) ) {
            $this->xywalter = array();
        }
        $this->xywalter[] = array($this->GetX(), $this->GetY());
    }

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

        $image_file = 'images/logos/escudo.jpg';
        $this->Image($image_file, 10, 5, 30, '40', 'JPG', '', 'T', true, 300, '', false, false, 0, false, false, false);
        $image_file = 'images/logos/iapcompleto.jpg';
        $this->Image($image_file, 215, 10, 50, '10', 'JPG', '', 'T', true, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 14);
        $html = 'GOBIERNO DEL ESTADO DE CHIAPAS<br>
					SECRETARIA DE EDUCACION<br>
					SUBSECRETARIA DE EDUCACION ESTATAL<br>';
        $this->MultiCell(130, 15, $html, 0, 'C', false, '', 90, 10, false, 'M', true);

        $this->SetFont('helvetica', '', 14);
        $html = 'DIRECCION DE EDUCACION SUPERIOR';
        $this->MultiCell(130, 15, $html, 0, 'C', false, '', 90, 19, false, 'M', true);

        $this->SetFont('helvetica', 'B', 14);
        $html = 'REGISTRO DE ESCOLARIDAD';
        $this->MultiCell(130, 15, $html, 0, 'C', false, '', 90, 25, false, 'M', true);

        $this->SetFont('helvetica', 'B', 6);
        $html = '
				<table cellpadding="5" cellspacing="0">
					<tr><td align="center" width="100%" border="1">DATOS ESTADISTICOS:</td></tr>
					<tr>
						<td align="center" width="25%" border="1">CONCEPTO</td>
						<td align="center" width="25%" border="1"><font size="6">HOMBRES</font></td>
						<td align="center" width="25%" border="1"><font size="6">MUJERES</font></td>
						<td align="center" width="25%" border="1"><font size="6">TOTAL</font></td>
					</tr>
					<tr>
						<td align="center" width="25%" border="1">INSCRITOS INICIO DE CURSOS</td>
						<td align="center" width="25%" border="1"><font size="8">'.$desglosadoGrupo["m"].'</font></td>
						<td align="center" width="25%" border="1"><font size="8">'.$desglosadoGrupo["f"].'</font></td>
						<td align="center" width="25%" border="1"><font size="8">'.$desglosadoGrupo["t"].'</font></td>
					</tr>
					</table>';
        $this->writeHTMLCell(65, 40, 280, 10, $html, false);

        $html = '
				<table cellpadding="5" cellspacing="0">
					<tr>
						<td align="center" width="25%" border="1">FIN DE CURSOS</td>
						<td align="center" width="25%" border="1"><font size="8">'.$desglosadoGrupo["m"].'</font></td>
						<td align="center" width="25%" border="1"><font size="8">'.$desglosadoGrupo["f"].'</font></td>
						<td align="center" width="25%" border="1"><font size="8">'.$desglosadoGrupo["t"].'</font></td>
					</tr>
					</table>';
        $this->writeHTMLCell(65, 40, 280, 35, $html, false);

        $this->SetFont('helvetica', 'B', 10);

        $this->SetXY(40, 50);
        $text = "ESCUELA:";
        $this->Cell(30, 5, $text, 0, 0, "L");
        $text = $iapConfig["name_long"];
        $this->Cell(150, 5, $text, "B", 0, "L");
        $text = "   CLAVE:";
        $this->Cell(25, 5, $text, 0, 0, "L");
        $text = $infoCourse["clave"];
        $this->Cell(35, 5, $text, "B", 0, "L");

        $this->SetXY(40, 55);
        $text = "LOCALIDAD:";
        $this->Cell(30, 5, $text, 0, 0, "L");
        $text = $iapConfig["ubication"];
        $this->Cell(60, 5, $text, "B", 0, "L");

        $text = "   ".$infoCourse["majorName"]." EN:";
        $this->Cell(38, 5, $text, 0, 0, "L");

        $text = $infoCourse["name"];

        if(strlen($text) > 45)
        {
            $this->SetFont('helvetica', 'B', 9);
        }
        if(strlen($text) > 55)
        {
            $this->SetFont('helvetica', 'B', 8);
        }
        $this->Cell(98, 5, $text, "B", 0, "L");

        $this->SetFont('helvetica', 'B', 10);

        $text = "  RVOE:";
        $this->Cell(15, 5, $text, 0, 0, "L");
        $text = $infoCourse["rvoe"];
        $this->Cell(25, 5, $text, "B", 0, "L");
        $text = "  FECHA:";
        $this->Cell(18, 5, $text, 0, 0, "L");
        $text = date("d/m/Y");
        $this->Cell(20, 5, $text, "B", 0, "L");

        $this->SetXY(40, 60);
        $text = "MUNICIPIO:";
        $this->Cell(30, 5, $text, 0, 0, "L");
        $text = $iapConfig["ubication"];
        $this->Cell(60, 5, $text, "B", 0, "L");
        $text = "   CICLO ESCOLAR:";
        $this->Cell(35, 5, $text, 0, 0, "L");
        $text = $infoCourse["scholarCicle"];
        $this->Cell(10, 5, $text, "B", 0, "C");
        $text = "  CUATRIMESTRE:";
        $this->Cell(35, 5, $text, 0, 0, "L");
        $text = "1";
        $this->Cell(10, 5, $text, "B", 0, "C");
        $text = "  GRUPO:";
        $this->Cell(20, 5, $text, 0, 0, "L");
        $text = $infoCourse["group"];
        $this->Cell(15, 5, $text, "B", 0, "C");
        $text = "  TURNO:";
        $this->Cell(20, 5, $text, 0, 0, "L");
        $text = $infoCourse["turn"];
        $this->Cell(20, 5, $text, "B", 0, "L");

        $this->SetFont('helvetica', 'B', 14);
        $this->SetXY(195, 65);
        $text = "PERIODO: 21 DE OCTUBRE DEL 2011 AL 17 DE DICIEMBRE DEL 2011";
        $this->Cell(150, 10, $text, 0, 0, "R");

        /*				$html = '
                        <table><tr><td align="left" width="150">ESCUELA:</td><td align="left"><u>'.$iapConfig["escuela"].'</u></td></tr></table>';
        $this->writeHTMLCell(600, 30, 50, 60, $html, true);
        *///				$this->MultiCell(600, 15, $html, 1, 'J', false, '', 50, 45, false, 'M', true);

        //	$this->writeHTML($html, true, false, true, false, '');
    }
}

$pdf = new MYPDF('L', PDF_UNIT, "LEGAL", true, 'UTF-8', false);
$pdf->SetMargins(10, 80, 10);
$pdf->SetHeaderMargin(5);
$pdf->SetFont('helvetica', 'B', 6);

// create new PDF document
for($page = 0; $page <= $totalPages; $page++)
{
    $pdf->addPage();
// set Rotate
    $params = $pdf->serializeTCPDFtagParameters(array(90));

// other configs
    $pdf->setOpenCell(0);
    $pdf->SetCellPadding(0);
    $pdf->setCellHeightRatio(1.25);

// create some HTML content
    $html = '<table width="100%" border="1" cellspacing="0" cellpadding="2">
<thead>
<tr bgcolor="#ffffff">
<th rowspan="2" width="3%" align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th rowspan="2" width="8%" align="center" valign="middle">CURP</th>
<th rowspan="2" width="4%" align="center" valign="bottom">CLAVE DSE</th>
<th rowspan="2" width="16%" align="center">NOMBRE DEL ALUMNO</th>
<th rowspan="2" width="3%" align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th colspan="8" width="24%" align="center">CALIFICACIONES FINALES</th>
<th colspan="12" width="36%" align="center">CALIFICACIONES DE REGULARIZACION</th>
<th rowspan="2" width="3%" align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th rowspan="2" width="3%" align="center"><tcpdf method="Test" params="'.$params.'" /></th>
</tr>
<tr bgcolor="#ffffff">
<th align="center" height="100"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center"><tcpdf method="Test" params="'.$params.'" /></th>
</tr>
</thead>';
    for($ii = $page * 15; $ii < ($page * 15) + 15; $ii++)
    {
        $consecutivo = $ii + 1;
        $html.= '
 <tr bgcolor="#FFFFFF">
<td width="3%" align="left" bgcolor="#FFFFFF">'.$consecutivo.'</td>
<td rowspan="" width="8%" align="center" bgcolor="#FFFFFF">'.$marks[$ii]["info"]["curp"].'</td>
<td rowspan="" width="4%" align="center" style="font-size:14px;">'.$marks[$ii]["info"]["controlNumber"].'</td>
<td rowspan="" width="16%" align="center">'.$marks[$ii]["info"]["lastNamePaterno"].' '.$marks[$ii]["info"]["lastNameMaterno"].' '.$marks[$ii]["info"]["names"].'</td>
<td rowspan="" width="3%" align="center">'.$marks[$ii]["info"]["sexoFixed"].'</td>';

        $totalTds = 0;
        if($marks[$ii]["marks"])
        {
            foreach($marks[$ii]["marks"] as $keyMark => $valueMark)
            {
                $html.= '<td rowspan="" width="3%" align="center">'.$valueMark.'</td>';
                $totalTds++;
            }
        }

        for($jj = $totalTds; $jj <= 21; $jj++)
        {
            $html.= '<td rowspan="" width="3%" align="center"></td>';
        }

        $html.= '</tr>';
    }

    $html .= '</table>';
//echo $html;
// output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    $nombres = array(
        "NUMERO PROGRESIVO",
        "SEXO",
        "ASIGNATURAS NO ACREDITADAS",
        "SITUACION ESCOLAR",);

    foreach($addedModules as $module)
    {
        array_push($nombres, $module["name"]);
    }
// array with names of columns
    $arr_nomes = array(
        array($nombres[0], 3, 35), // array(name, new X, new Y);
        array($nombres[1], 3, 35), // array(name, new X, new Y);
        array($nombres[2], 3, 35),
        array($nombres[3], 3, 35),
        array($nombres[4], 2, 32),
        array($nombres[5], 2, 32),
        array($nombres[6], 2, 32),
        array($nombres[7], 2, 32),
        array($nombres[8], 2, 32),
        array($nombres[9], 2, 32),
        array($nombres[10], 2, 32),
        array($nombres[11], 2, 32),
        array("CLAVE MATERIA", 2, 32),
        array("CALIFICACION", 2, 32),
        array("TIPO DE EXAMEN", 2, 32),
        array("CLAVE MATERIA", 2, 32),
        array("CALIFICACION", 2, 32),
        array("TIPO DE EXAMEN", 2, 32),
        array("CLAVE MATERIA", 2, 32),
        array("CALIFICACION", 2, 32),
        array("TIPO DE EXAMEN", 2, 32),
        array("CLAVE MATERIA", 2, 32),
        array("CALIFICACION", 2, 32),
        array("TIPO DE EXAMEN", 2, 32),
    );

// num of pages
    $ttPages = $pdf->getNumPages();
    for($i=1; $i<=$ttPages; $i++) {
        // set page
        $pdf->setPage($i);
        // all columns of current page
        foreach( $arr_nomes as $num => $arrCols ) {
            $x = $pdf->xywalter[$num][0] + $arrCols[1]; // new X
            $y = $pdf->xywalter[$num][1] + $arrCols[2]; // new Y
            $n = $arrCols[0]; // column name
            // transforme Rotate
            $pdf->StartTransform();
            // Rotate 90 degrees counter-clockwise
            //Text($x, $y, $txt, $fstroke=false, $fclip=false, $ffill=true, $border=0, $ln=0, $align='', $fill=false, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M', $rtloff=false)
            $pdf->Rotate(90, $x, $y);
            $pdf->MultiText($x, $y, 30, 10, $n, false, false, true, 0, 0, "C");
            // Stop Transformation
            $pdf->StopTransform();
        }
    }
}
// reset pointer to the last page
$pdf->lastPage();
//$pdf->Output('example_001.pdf', 'I');
$pdf->Output(DOC_ROOT."/sabanas/".$_GET["id"]."_".$_GET["cuatrimestre"].".pdf", "F");
$pdf->Output(DOC_ROOT."/sabanas/".$_GET["id"]."_".$_GET["cuatrimestre"].".pdf", "I");

//============================================================+
// END OF FILE
//============================================================+

?>