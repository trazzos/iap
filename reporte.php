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
	
	$data["male"] = 0;
	$data["female"] = 0;
	$data["totalsex"] = 0;

	$data["age"][20] = 0;
	$data["age"][30] = 0;
	$data["age"][40] = 0;
	$data["age"][50] = 0;
	$data["age"][60] = 0;

	$data["universidad"] = 0;
	$data["licenciatura"] = 0;
	$data["maestria"] = 0;
	$data["doctorado"] = 0;
	$data["otrogrado"] = 0;
	$data["municipal"] = 0;
	$data["estatal"] = 0;
	$data["federal"] = 0;
	$data["otraocupacion"] = 0;
	
	$profesiones = $profesion->Enumerate();
	$prof = array();
	foreach($profesiones as $key => $profesion)
	{
		$prof[$profesion["profesionId"]]["name"] = $profesion["profesionName"];
		$prof[$profesion["profesionId"]]["value"] = 0;
	}
	
	$totalColums = 16 + count($prof);
	//echo $columnWidth =  number_format(100 / $totalColums, 2);

	foreach($addedModules as $keyModule => $myModule)
	{
		$group->setCourseId($_GET["id"]);
		$group->setCourseModuleId($myModule["courseModuleId"]);			
		$theGroup = $group->DefaultGroup();
		
		foreach($theGroup as $key => $student)
		{
			if($student["sexo"] == "m")
			{
				$data["male"]++;
			}
			else
			{
				$data["female"]++;
			}
			$years = explode("-", $student["birthdate"]);
			$age = date("Y") - $years[2];
			
			if($age > 60)
			{
				$data["age"][60]++;
			}
			elseif($age > 50)
			{
				$data["age"][50]++;
			}
			elseif($age > 40)
			{
				$data["age"][40]++;
			}
			elseif($age > 30)
			{
				$data["age"][30]++;
			}
			else
			{
				$data["age"][20]++;
			}
			$prof[$student["profesion"]]["value"]++;
			
			switch($student["academicDegree"])
			{
				case "LICENCIATURA": $data["licenciatura"]++;break;
				case "UNIVERSITARIO": $data["universitario"]++;break;
				case "MAESTRIA": $data["maestria"]++;break;
				case "DOCTORADO": $data["doctorado"]++;break;
				default: $data["otrogrado"]++;break;
			}

			switch($student["workplaceOcupation"])
			{
				case "FUNCIONARIO PUBLICO MUNICIPAL": $data["municipal"]++;break;
				case "FUNCIONARIO PUBLICO ESTATAL": $data["estatal"]++;break;
				case "FUNCIONARIO PUBLICO FEDERAL": $data["federal"]++;break;
				default: $data["otraocupacion"]++;break;
			}

		}
		break;
	}
	
	foreach($prof as $key => $value)
	{
		if($value["value"] == 0)
		{
			unset($prof[$key]);
		}
		$data["totalprof"] += $value["value"];
	}
	$data["totalsex"] = $data["female"] + $data["male"];
	$data["totalage"] = array_sum($data["age"]);

	$profesions = count($prof);
	//print_r($data);
	$totalPages = ceil(count($marks) / 15);

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
				
        $image_file = 'images/logos/iapcompleto.png';
        $this->Image($image_file, 25, 10, 50, '10', 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 14);
				$html = 'PERFIL DEL GRUPO';
				$this->MultiCell(130, 3, $html, 0, 'C', false, '', 90, 10, false, 'M', true);					

				$html = $infoCourse["majorName"].' EN '.$infoCourse["name"];
				$this->MultiCell(130, 3, $html, 0, 'C', false, '', 90, 17, false, 'M', true);					

				$html = 'SEDE '.$iapConfig["ubication"];
				$this->MultiCell(130, 3, $html, 0, 'C', false, '', 90, 27, false, 'M', true);					

    }
}

$pdf = new MYPDF('L', PDF_UNIT, "LEGAL", true, 'UTF-8', false);
$pdf->SetMargins(10, 0, 10);
$pdf->SetHeaderMargin(5);
$pdf->SetFont('helvetica', 'B', 9);

// create new PDF document
$pdf->addPage();
// set Rotate
$params = $pdf->serializeTCPDFtagParameters(array(50));

// other configs
$pdf->setOpenCell(0);
$pdf->SetCellPadding(0);
$pdf->setCellHeightRatio(1.25);

$widthProf = $profesions*3;
// create some HTML content
$html .= '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />';
$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
<thead>
<tr bgcolor="#ffffff">
<th colspan="2" width="6%" align="center" bgcolor="#FF99CC">ALUMNOS</th>
<th colspan="5" width="15%" align="center" bgcolor="#00CCCC">EDAD (RANGO)</th>
<th colspan="5" width="15%" align="center" bgcolor="#009966">GRADO ACADEMICO</th>
<th colspan="4" width="12%" align="center" bgcolor="#6699CC">OCUPACION</th>
</tr>
<tr bgcolor="#ffffff">
<th align="center" height="115" bgcolor="#FF99CC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#FF99CC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#00CCCC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#00CCCC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#00CCCC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#00CCCC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#00CCCC"><tcpdf method="Test" params="'.$params.'" /></th>';

foreach($prof as $key => $value)
{
//	$html.='<th style="font-size:8px" align="center" bgcolor="#FFFF66"><tcpdf method="Test" params="'.$params.'" /></th>';
}

$html .='<th align="center" bgcolor="#009966"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#009966"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#009966"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#009966"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#009966"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#6699CC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#6699CC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#6699CC"><tcpdf method="Test" params="'.$params.'" /></th>
<th align="center" bgcolor="#6699CC"><tcpdf method="Test" params="'.$params.'"/></th>
</tr>
</thead>';
 $html.= '
 <tr >
<td width="3%" align="left" bgcolor="#FF99CC" align="center" >'.$data["male"].'</td>
<td rowspan="" width="3%" bgcolor="#FF99CC" align="center">'.$data["female"].'</td>
<td rowspan="" width="3%" bgcolor="#00CCCC" align="center">'.$data["age"][20].'</td>
<td rowspan="" width="3%" bgcolor="#00CCCC" align="center">'.$data["age"][30].'</td>
<td rowspan="" width="3%" bgcolor="#00CCCC" align="center">'.$data["age"][40].'</td>
<td rowspan="" width="3%" bgcolor="#00CCCC" align="center">'.$data["age"][50].'</td>
<td rowspan="" width="3%" bgcolor="#00CCCC" align="center">'.$data["age"][60].'</td>
';
foreach($prof as $key => $value)
{
//	$html.='<td rowspan="" width="3%" bgcolor="#FFFF66" align="center">'.$value["value"].'</td>';
}
 $html.= '
<td width="3%" align="left" bgcolor="#009966" align="center" >'.$data["universidad"].'</td>
<td rowspan="" width="3%" bgcolor="#009966" align="center">'.$data["licenciatura"].'</td>
<td rowspan="" width="3%" bgcolor="#009966" align="center">'.$data["maestria"].'</td>
<td rowspan="" width="3%" bgcolor="#009966" align="center">'.$data["doctorado"].'</td>
<td rowspan="" width="3%" bgcolor="#009966" align="center">'.$data["otrogrado"].'</td>
<td rowspan="" width="3%" bgcolor="#6699CC" align="center">'.$data["municipal"].'</td>
<td rowspan="" width="3%" bgcolor="#6699CC" align="center">'.$data["estatal"].'</td>
<td rowspan="" width="3%" bgcolor="#6699CC" align="center">'.$data["federal"].'</td>
<td rowspan="" width="3%" bgcolor="#6699CC" align="center">'.$data["otraocupacion"].'</td>';

	$html.= '</tr>';

 $html.= '
 <tr >
<td colspan="2" width="6%" align="left" bgcolor="#FF99CC" align="center" >'.$data["totalsex"].'</td>
<td colspan="2" width="15%" align="left" bgcolor="#00CCCC" align="center" >'.$data["totalage"].'</td>
<td colspan="5" width="15%" align="left" bgcolor="#009966" align="center" >'.$data["totalage"].'</td>
<td colspan="4" width="12%" align="left" bgcolor="#6699CC" align="center" >'.$data["totalage"].'</td>
';
	$html.= '</tr>';

$html .= '</table>';
$html .= '<br /><br /><br />';

$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
<thead>
<tr bgcolor="#ffffff">
<th colspan="'.$profesions.'" width="'.$widthProf.'%" align="center" bgcolor="#FFFF66">PROFESION</th>
</tr>
<tr bgcolor="#ffffff">';

foreach($prof as $key => $value)
{
	$html.='<th height="115" style="font-size:8px" align="center" bgcolor="#FFFF66"><tcpdf method="Test" params="'.$params.'" /></th>';
}

$html .='</tr>
</thead>';
 $html.= '
 <tr >';
foreach($prof as $key => $value)
{
	$html.='<td rowspan="" width="3%" bgcolor="#FFFF66" align="center">'.$value["value"].'</td>';
}

	$html.= '</tr>';

 $html.= '
 <tr >
<td colspan="'.$profesions.'" width="'.$widthProf.'%" align="left" bgcolor="#FFFF66" align="center" >'.$data["totalage"].'</td>';
	$html.= '</tr>';

$html .= '</table>';
//echo $html;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false);

$nombres = array(
//	"SEXO",
//	"ASIGNATURAS NO ACREDITADAS",
//	"SITUACION ESCOLAR",
);

// array with names of columns
$arr_nomes = array(
    array("HOMBRES", 3, 55), // array(name, new X, new Y);
    array("MUJERES", 3, 55), // array(name, new X, new Y);
    array("20-30", 3, 55),
    array("31-40", 3, 55),
    array("41-50", 3, 55),
    array("51-60", 3, 55),
    array("61-70", 3, 55),
);

array_push($arr_nomes, array("UNIVERSITARIO", 3, 55));
array_push($arr_nomes, array("LICENCIATURA", 3, 55));
array_push($arr_nomes, array("MAESTRIA", 3, 55));
array_push($arr_nomes, array("DOCTORADO", 3, 55));
array_push($arr_nomes, array("OTROS", 3, 55));
array_push($arr_nomes, array("FUNCIONARIO<br> PUBLICO MUNICIPAL", 1, 55));
array_push($arr_nomes, array("FUNCIONARIO<br> PUBLICO ESTATAL", 1, 55));
array_push($arr_nomes, array("FUNCIONARIO<br> PUBLICO FEDERAL", 1, 55));
array_push($arr_nomes, array("OTROS", 3, 55));

foreach($prof as $value)
{
	if(strlen($value["name"]) > 20)
	{
		$value["name"] = wordwrap($value["name"], 20, "<br>", true);
		array_push($arr_nomes, array($value["name"], 1, 54));
	}
	else
	{
		array_push($arr_nomes, array($value["name"], 3, 54));
	}
}


///print_r($arr_nomes);

// num of pages
$ttPages = $pdf->getNumPages();
for($i=1; $i<=$ttPages; $i++) {
    // set page
    $pdf->setPage(1);
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
        $pdf->MultiText($x, $y, 70, 10, $n, false, false, true, 0, 0, "C");
        // Stop Transformation
        $pdf->StopTransform();
    }
}
//}
// reset pointer to the last page
$pdf->lastPage();
//$pdf->Output('example_001.pdf', 'I');
$pdf->Output(DOC_ROOT."/reports/1_".$_GET["id"].".pdf", "F");
$pdf->Output(DOC_ROOT."/reports/1_".$_GET["id"].".pdf", "I");

//============================================================+
// END OF FILE
//============================================================+

?>