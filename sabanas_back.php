<?php 
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

include_once('init_tcpdf.php');
include_once('config.php');
include_once(DOC_ROOT.'/libraries_tcpdf.php');

$month = array("","ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");

	//modulos conformando el curso
	$iapConfig = $main->Config();

	$course->setCourseId($_GET["id"]);
	$infoCourse = $course->Info();
	$addedModules = $course->AddedCourseModules();

	$cuatrimesters = $course->HowManyCuatrimesters();
	$smarty->assign('cuatrimesters', $cuatrimesters);

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
		
	}
	
	//print_r($desglosadoGrupo);
	foreach($marks as $keyMark => $mark)
	{
		$realMark = array_sum($mark["marks"]) / count($mark["marks"]);
		//$marks[$keyMark]["marks"]["finalMark"] = $realMark;
		$user->setUserId($keyMark);
		$userInfo = $user->InfoUser();
		$marks[$keyMark]["info"] = $userInfo;

//		$course->setCourseId($_GET["id"]);
//		$courseInfo = $course->Info();
//		$marks[$keyMark]["course"] = $courseInfo;
	}
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
	
	$totalPages = ceil(count($marks) / 15);

	//normalize
	$consecutivo = 0;
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
    }
}

$pdf = new MYPDF('L', PDF_UNIT, "LEGAL", true, 'UTF-8', false);
$pdf->SetMargins(5, 15, 20);
$pdf->SetHeaderMargin(5);
$pdf->SetFont('helvetica', 'B', 6);

// create new PDF document
//for($page = 0; $page < $totalPages; $page++)
//{
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
<th colspan="2" width="8%" align="center" valign="middle">ANTECEDENTES</th>
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

$html.= '
 <tr bgcolor="#FFFFFF">
	<td border="0" colspan="28" align="center" bgcolor="#FFFFFF">ALUMNOS QUE REPITEN CURSO</td>
 </tr>';
 	
for($ii = $page * 8; $ii < ($page * 8) + 8; $ii++)
{
	$consecutivo = $ii + 1;
 $html.= '
 <tr bgcolor="#FFFFFF">
<td width="3%" align="left" bgcolor="#FFFFFF">'.$consecutivo.'</td>
<td rowspan="" width="8%" align="center" bgcolor="#FFFFFF"></td>
<td rowspan="" width="4%" align="center"></td>
<td rowspan="" width="16%" align="center"></td>
<td rowspan="" width="3%" align="center"></td>';

	$totalTds = 0;
	if($marks[$ii]["marks"])
	{
		foreach($marks[$ii]["marks"] as $keyMark => $valueMark)
		{
			$html.= '<td rowspan="" width="3%" align="center"></td>';
			$totalTds++;
		}
	}
	
	for($jj = $totalTds; $jj <= 21; $jj++)
	{
		$html.= '<td rowspan="" width="3%" align="center"></td>';
	}
	
	$html.= '</tr>';
}

$html.= '
 <tr bgcolor="#FFFFFF">
	<td border="0" colspan="26" align="center" bgcolor="#FFFFFF">ALUMNOS DADOS DE ALTA</td>
 </tr>';

for($ii = $page * 7; $ii < ($page * 7) + 7; $ii++)
{
	$consecutivo = $ii + 1;
 $html.= '
 <tr bgcolor="#FFFFFF">
<td width="3%" align="left" bgcolor="#FFFFFF">'.$consecutivo.'</td>
<td rowspan="" width="8%" align="center" bgcolor="#FFFFFF"></td>
<td rowspan="" width="4%" align="center"></td>
<td rowspan="" width="16%" align="center"></td>
<td rowspan="" width="3%" align="center"></td>';

	$totalTds = 0;
	if($marks[$ii]["marks"])
	{
		foreach($marks[$ii]["marks"] as $keyMark => $valueMark)
		{
			$html.= '<td rowspan="" width="3%" align="center"></td>';
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

$pdf->writeHTML($html, true, false, true, false, '');

$html = '
<br><table width="100%" border="0" cellspacing="0" cellpadding="2">

<tr bgcolor="#ffffff">
<td width="26%" border="0" align="center">INSCRIPCION O REINSCRIPCION</td>
<td width="11%" border="0"  align="center"></td>
<td width="26%" border="0"  align="center">ACREDITACION</td>
<td width="11%" border="0"  align="center"></td>
<td width="26%" border="0"  align="center">REGULARIZACION</td>
</tr>

<tr bgcolor="#ffffff">
<td width="26%" border="1" align="center">
	DIRECTOR ACADEMICO<br>
	'.$iapConfig["directorAcademico"].'<br><br>
	______________________________________<br>
	JEFE DEL DEPARTAMENTO DE SERVICIOS <br>ESCOLARES Y BECAS<br><br><br>
	______________________________________<br>
	'.$iapConfig["jefeServiciosEscolares"].'<br>
	FECHA DE VALIDACION<br><br>
</td>
<td width="11%" border="0"  align="center"></td>
<td width="26%" border="1"  align="center">
	DIRECTOR ACADEMICO<br>
	'.$iapConfig["directorAcademico"].'<br><br>
	______________________________________<br>
	JEFE DEL DEPARTAMENTO DE SERVICIOS <br>ESCOLARES Y BECAS<br><br><br>
	______________________________________<br>
	'.$iapConfig["jefeServiciosEscolares"].'<br>
	FECHA DE VALIDACION<br><br>
</td>
<td width="11%" border="0"  align="center"></td>
<td width="26%" border="1"  align="center">
	DIRECTOR ACADEMICO<br>
	'.$iapConfig["directorAcademico"].'<br><br>
	______________________________________<br>
	JEFE DEL DEPARTAMENTO DE SERVICIOS <br>ESCOLARES Y BECAS<br><br><br>
	______________________________________<br>
	'.$iapConfig["jefeServiciosEscolares"].'<br>
	FECHA DE VALIDACION<br><br>
</td>
</tr>'; 
$html .= '</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<br><table width="100%" border="1" cellspacing="0" cellpadding="2">

<tr bgcolor="#ffffff">
<td width="25%" border="0" align="center">REVISION</td>
<td width="25%" border="0"  align="center">INSCRIPCION O REINSCRIPCION</td>
<td width="25%" border="0"  align="center">ACREDITACION</td>
<td width="25%" border="0"  align="center">REGULARIZACION</td>
</tr>
<tr bgcolor="#ffffff">
<td width="25%" border="0" align="center"><br><br><br>RESPONSABLE DE SERVICIOS ESCOLARES DEL PLANTEL</td>
<td width="25%" border="0"  align="center"><br><br><br>'.$iapConfig["respServiciosEscolares"].'</td>
<td width="25%" border="0"  align="center"><br><br><br>'.$iapConfig["respServiciosEscolares"].'</td>
<td width="25%" border="0"  align="center"><br><br><br>'.$iapConfig["respServiciosEscolares"].'</td>
</tr>
<tr bgcolor="#ffffff">
<td width="25%" border="0" align="center"><br><br><br>JEFE DE LA OFICINA</td>
<td width="25%" border="0"  align="center"><br><br><br>'.$iapConfig["jefeOficina"].'</td>
<td width="25%" border="0"  align="center"><br><br><br>'.$iapConfig["jefeOficina"].'</td>
<td width="25%" border="0"  align="center"><br><br><br>'.$iapConfig["jefeOficina"].'</td>
</tr>

</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$nombres = array(
	"NUMERO PROGRESIVO",
	"SEXO",
	"ASIGNATURAS NO ACREDITADAS",
	"SITUACION ESCOLAR",
	"ASIGNATURAS NO ACREDITADAS",
	"SITUACION ESCOLAR",
);

foreach($addedModules as $module)
{
//	array_push($nombres, $module["name"]);
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
//}
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