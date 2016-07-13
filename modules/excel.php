<?php
	
	include_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
	include_once(DOC_ROOT.'/libraries.php');
	include_once(DOC_ROOT.'/classes/error.class.php');
	include_once(DOC_ROOT.'/classes/main.class.php');
	include_once(DOC_ROOT.'/classes/util.class.php');
	include_once(DOC_ROOT.'/classes/db.class.php');
	include_once(DOC_ROOT.'/classes/institution.class.php');
	include_once(DOC_ROOT.'/classes/semester.class.php');
	include_once(DOC_ROOT.'/classes/group.class.php');
	include_once(DOC_ROOT.'/classes/periodo.class.php');
	include_once(DOC_ROOT.'/classes/position.class.php');
	include_once(DOC_ROOT.'/classes/personal.class.php');
	include_once(DOC_ROOT.'/classes/schoolType.class.php');
	
	include_once(DOC_ROOT.'/pdf/fpdf.php');
	include_once(DOC_ROOT.'/classes/report.class.php');
		
	//error_reporting(E_ALL);
			
	header('Content-type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename=archivo.xls');
	header("Pragma: no-cache");
	header("Expires: 0");

	$majorId = intval($_GET['majorId']);
	$semesterId = intval($_GET['semesterId']);
	$groupId = intval($_GET['groupId']);
	
	$util = new Util;
	$error = new Error;
	$institution = new Institution;
	$semester = new Semester;
	$group = new Group;
	$periodo = new Periodo;
	$position = new Position;
	$personal = new Personal;
	$report = new Report;
	$schoolType = new SchoolType;
	
	$institution->setInstitutionId(1);
	$info = $institution->Info();
	
	$plantel = $info['name'];
	$clave = $info['identifier'];
	$ubicacion = $info['ubication'];
	
	$semester->setSemesterId($semesterId);
	$semestre = $semester->GetNameById();
	
	$group->setGroupId($groupId);
	$grupo = $group->GetNameById();
	
	$periodoId = $periodo->GetPeriodoActive();
	$periodo->setPeriodoId($periodoId);
	$periodoName = $periodo->GetNameById();
	
	//Footer
	
	$personal->setPositionId(3);
	$pers = $personal->EnumerateByPosition();		
	$director = $pers[0]['name'];
	
	$personal->setPositionId(5);
	$pers = $personal->EnumerateByPosition();		
	$jefeSE = $pers[0]['name'];
	
	$anio = date('Y');
	$mes = $util->GetMonthByKey(intval(date('m')));
	$dia = date('d');
	
	$fecha = $dia.' de '.$mes.' de '.$anio;
	
?>
<table width="800" border="1">
  <tr>
    <td width="641" align="center"><strong>SECRETARIA DE EDUCACION PUBLICA</strong></td>
  </tr>
  <tr>
    <td align="center"><strong>SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR</strong></td>
  </tr>
  <tr>
    <td align="center"><strong>DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><strong>REPORTE DE INSCRIPCION Y REINSCRIPCION (REDI)</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1">
      <tr>
      	<td>&nbsp;</td>
        <td width="38%"><strong>PLANTEL SEDE Y UBICACION</strong>:</td>
        <td width="20%"><?= $plantel; ?></td>
        <td>&nbsp;</td>
        <td width="23%"><strong>CLAVE DE C.T</strong>.:</td>
        <td width="19%" colspan="2"><?= $clave; ?></td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td><strong>EXTENSION Y UBICACION</strong>:</td>
        <td><?= $ubicacion; ?></td>
        <td>&nbsp;</td>
        <td><strong>GRUPO</strong>:</td>
        <td colspan="2"><?= $grupo; ?></td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td><strong>CARRERA</strong>:</td>
        <td>TECNICO AGROPECUARIO</td>
        <td>&nbsp;</td>
        <td><strong>SEMESTRE</strong>:</td>
        <td colspan="2"><?= $semestre; ?></td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td><strong>PERIODO ESCOLAR</strong>:</td>
        <td><?= $periodoName; ?></td>
        <td>&nbsp;</td>
        <td><strong>GENERACION</strong>:</td>
        <td colspan="2">2008 - 2011</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td><strong>OFICION DE AUTORIZACION</strong>:</td>
        <td>DT/2190/2006</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1">
      <tr>
        <td width="4%" align="center"><strong>No.</strong></td>
        <td width="" align="center"><strong>PATERNO MATERNO NOMBRES(S)</strong></td>
        <td width="19%" align="center"><strong>No. DE CONTROL</strong></td>
        <td align="center"><strong>SEXO<br />
          H | M</strong></td>
        <td width="7%" align="center"><strong>EDAD</strong></td>
        <td width="15%" align="center"><strong>PLANT. PROC</strong></td>
        <td width="11%" align="center"><strong>COD. OBS.</strong></td>
      </tr>

<?php
	
	$report->setMajorId($majorId);
	$report->setSemesterId($semesterId);
	$report->setGroupId($groupId);
	
	$sqlFilter = ' AND majorId = '.$majorId;
	
	$students = $report->EnumerateStudents('',$sqlFilter);
	
	$k = 1;
	$h = 0;
	$m = 0;
	foreach($students as $val){
		
		$name = $val['lastNamePaterno'].' '.$val['lastNameMaterno'].' '.$val['names'];
		$noControl = $val['controlNumber'];
		$yearsOld = $util->GetYearsOld($val['birthdate']);
		
		$schoolType->setSchtypId($val['prevSchType']);
		$claveProc = $schoolType->GetClaveById();
		
		if($val['sexo'] == 'f'){
			$m++;					
			$sexo = '      | X';
		}else{
			$h++;					
			$sexo = '  X | ';
		}
	
?>

      <tr>
        <td><?= $k; ?></td>
        <td><?= $name; ?></td>
        <td><?= $noControl; ?>&nbsp;</td>
        <td width="4%" align="center"><?= $sexo; ?></td>
        <td><?= $yearsOld; ?></td>
        <td><?= $claveProc; ?></td>
        <td>&nbsp;</td>
      </tr>
<?php
	
		$k++;
	}
	
	$totalHM = $h + $m;
	
	$h = ($h < 10) ? "0$h" : $h;
	$m = ($m < 10) ? "0$m" : $m;	
	
?>
	<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><b>TOTAL</b></td>
        <td width="4%" align="center"><b><?= $h.' | '.$m; ?></b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr><td>
  <table border="1">
  	<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><b>H. HOMBRES</b></td>
        <td width="4%" align="center"><b><?= $h; ?></b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><b>M. MUJERES</b></td>
        <td width="4%" align="center"><b><?= $m; ?></b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><b>SUMA</b></td>
        <td width="4%" align="center"><b><?= $totalHM; ?></b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </td></tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td><table width="778" border="1">
      <tr>
      	<td>&nbsp;</td>
        <td width="50%" align="center"><u><?= $director; ?></u>
          <br /><strong><?= TIT_DIR; ?> DEL PLANTEL</strong></td>
        <td width="10%" align="center">&nbsp;</td>
        <td width="40%" align="center" colspan="4"><u><?= $jefeSE; ?></u><br />
          <strong>JEFE DEL DEPARTAMENTO DE SERVICIOS ESCOLARES</strong></td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td align="center"><u><?= SUBDIR_ENLACE_OP; ?></u><br />
          <strong>SUBDIRECTORA DE ENLACE OPERATIVO</strong></td>
        <td align="center">&nbsp;</td>
        <td align="center" colspan="4"><u><?= DIR_TECNICO; ?></u><br />
          <strong>DIRECTOR TECNICO</strong></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td><table width="100%" border="1">
      <tr>
        <td colspan="2"><strong>FECHA DE ELABORACION</strong>: <?= strtoupper($fecha); ?></td>
        <td colspan="5" align="right"><strong>DGETA-SO2A-P0-01-04</strong></td>
      </tr>
    </table></td>
  </tr>
 
</table>
