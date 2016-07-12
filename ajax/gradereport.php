<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

if($_POST["type"] == 'addGradereport')
{
	// ------ Tomamos los Periodos --------------------------------------------------------
	getPeriodsData($optPeriodosIds, $optPeriodosOut, $optPeriodosSel, $indice);
	$smarty->assign('optPeriodosIds', $optPeriodosIds);
	$smarty->assign('optPeriodosOut', $optPeriodosOut);
	$smarty->assign('optPeriodosSel', $optPeriodosSel);
	// ------ Tomamos los Semestres -------------------------------------------------------
	//echo '*** 2 Tipo de $optSemestersSel: ' . gettype($optSemestersSel) . ' ***';
	getSemesterData($optSemestersIds, $optSemestersOut, $optSemestersSel);
	$smarty->assign('optSemestersIds', $optSemestersIds);
	$smarty->assign('optSemestersOut', $optSemestersOut);
	$smarty->assign('optSemestersSel', $optSemestersSel);
	// ------ Tomamos los Grupos ----------------------------------------------------------
	getGroupsData($optGruposIds, $optGruposOut, $optGruposSel, $optPeriodosSel, $optSemestersSel);
	$smarty->assign('optGruposIds', $optGruposIds);
	$smarty->assign('optGruposOut', $optGruposOut);
	$smarty->assign('optGruposSel', $optGruposSel);

	// ------ Calcular generacion con el periodo seleccionado -----------------------------
	//$valGeneration = getGeneration($optPeriodosSel, $optSemestersSel);
	//$smarty->assign('valGeneration', $valGeneration);
}

switch($_POST["type"])
{
	case "addGradereport":
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-gradereport-popup.tpl');
		break;
	case "saveAddGradereport":
			$gradereport->setGroupId($_POST['groupId']);
			$gradereport->setGeneration($_POST['generation']);
			$gradereport->setPeriodoId($_POST['selPeriodo']);
			$gradereport->setSemesterId($_POST['selSemestre']);
			$gradereport->setRegularization($_POST['regularization']);
			if(!$gradereport->Save())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{	
				if($_SESSION['User']['positionId'] == 1)
				{
					//Si el usuario es Admin enumarar todas las actas
					$__gradereport = $gradereport->Enumerate();
					
					$info['positionId'] = 1;
					$smarty->assign('info',$info);
				}
				else
				{
					//Enumerar las actas del usuario (docente) que inicio session
					$__gradereport = $gradereport->EnumerateByPersonalId();
				}
				$__gradereport = $gradereport->Enumerate();
				if($__gradereport)
				{
					foreach($__gradereport as $key => $res)
					{
						//sacamos informacion del grupo
						$subject->setGroupId($res['groupId']);
						$groupx = $subject->infoGroup();
						if($groupx)
							$groupx = $util->DecodeRow($groupx);
						//clave del grupo
						$__gradereport[$key]['claveGroup'] = $groupx['clave'];
						//nombre del grupo
						$__gradereport[$key]['nameGroup'] = $groupx['name'];
						//Id del periodo
						$__gradereport[$key]['periodoId'] = $groupx['periodoId'];
						//clave del periodo
						$periodo->setPeriodoId($groupx['periodoId']);
						$infPeriodo = $periodo->Info();
						if($infPeriodo)
							$infPeriodo = $util->DecodeRow($infPeriodo);
						$__gradereport[$key]['clavePeriodo'] = $infPeriodo['identifier'];
						//clave de la materia
						$__gradereport[$key]['subjectId'] = $groupx['subjectId'];
						//nombre de la materia
						$subject->setSubjectId($groupx['subjectId']);
						$infSubject = $subject->Info();
						if($infSubject)
							$infSubject = $util->DecodeRow($infSubject);
						$__gradereport[$key]['nameSubject'] = $infSubject['name'];
						//Id del semestre
						$__gradereport[$key]['semesterId'] = $infSubject['semesterId'];
						//Clave del semestre
						$semester->setSemesterId($infSubject['semesterId']);
						$infSemester = $semester->Info();
						if($infSemester)
							$infSemester = $util->DecodeRow($infSemester);
						$__gradereport[$key]['claveSemester'] = $infSemester['clave'];
						//nombre del semestre
						$__gradereport[$key]['nameSemester'] = $infSemester['name'];
						
						$complete = $gradereport->IsCalifComplete($res['gradereportId']);
			
						$__gradereport[$key]['p1'] = $complete[1];
						$__gradereport[$key]['p2'] = $complete[2];
						$__gradereport[$key]['p3'] = $complete[3];
					}
				}
				
				$__gradereport = $util->EncodeResult($__gradereport);
				
				$smarty->assign("__gradereport", $__gradereport);
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				//$__gradereport = $gradereport->Enumerate();
				//$smarty->assign("__gradereport", $__gradereport);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/gradereport.tpl');
			}
		break;
	case "deleteGradereport":
			$gradereport->setGradereportId($_POST['gradereportId']);
			if($gradereport->Delete())
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				
				if($_SESSION['User']['positionId'] == 1)
				{
					// si el usuario es Admin enumarar todas las actas
					$__gradereport = $gradereport->Enumerate();
					
					$info['positionId'] = 1;
					$smarty->assign('info',$info);
				}
				else
				{
					// enumerar las actas del usuario (docente) que inicio session
					$__gradereport = $gradereport->EnumerateByPersonalId();
				}
				$__gradereport = $gradereport->Enumerate();
				if($__gradereport)
				{
					foreach($__gradereport as $key => $res)
					{
						//sacamos informacion del grupo
						$subject->setGroupId($res['groupId']);
						$groupx = $subject->infoGroup();
						if($groupx)
							$groupx = $util->DecodeRow($groupx);
						//clave del grupo
						$__gradereport[$key]['claveGroup'] = $groupx['clave'];
						//nombre del grupo
						$__gradereport[$key]['nameGroup'] = $groupx['name'];
						//Id del periodo
						$__gradereport[$key]['periodoId'] = $groupx['periodoId'];
						//clave del periodo
						$periodo->setPeriodoId($groupx['periodoId']);
						$infPeriodo = $periodo->Info();
						if($infPeriodo)
							$infPeriodo = $util->DecodeRow($infPeriodo);
						$__gradereport[$key]['clavePeriodo'] = $infPeriodo['identifier'];
						//clave de la materia
						$__gradereport[$key]['subjectId'] = $groupx['subjectId'];
						//nombre de la materia
						$subject->setSubjectId($groupx['subjectId']);
						$infSubject = $subject->Info();
						if($infSubject)
							$infSubject = $util->DecodeRow($infSubject);
						$__gradereport[$key]['nameSubject'] = $infSubject['name'];
						//Id del semestre
						$__gradereport[$key]['semesterId'] = $infSubject['semesterId'];
						//Clave del semestre
						$semester->setSemesterId($infSubject['semesterId']);
						$infSemester = $semester->Info();
						if($infSemester)
							$infSemester = $util->DecodeRow($infSemester);
						$__gradereport[$key]['claveSemester'] = $infSemester['clave'];
						//nombre del semestre
						$__gradereport[$key]['nameSemester'] = $infSemester['name'];
						
						$complete = $gradereport->IsCalifComplete($res['gradereportId']);
			
						$__gradereport[$key]['p1'] = $complete[1];
						$__gradereport[$key]['p2'] = $complete[2];
						$__gradereport[$key]['p3'] = $complete[3];
						
					}
				}
				
				$__gradereport = $util->EncodeResult($__gradereport);
				
				$smarty->assign("__gradereport", $__gradereport);				
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/gradereport.tpl');
			}
		break;
	case "editGradereport": 
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			//si es una edicion se debe configuar los datos iniciales de acuerdo a los que estan guardados en la tabla
			$gradereport->setGradereportId($_POST['gradereportId']);
			$myGradereport = $gradereport->Info();
			$optPeriodosSel = $myGradereport['periodoId'];
			$optSemestersSel = $myGradereport['semesterId'];
			$optGruposSel = $myGradereport['groupId'];
			//recuperamos el periodo
			$periodo->setPeriodoId($optPeriodosSel);
			$result = $periodo->Info();
			$optPeriodosOut = array($result['identifier'] . (($result['active']=='yes')?' | ACTIVO' : ' | INACTIVO') );
			$optPeriodosIds = array($optPeriodosSel);
			//recuperamos el semestre
			$semester->setSemesterId($optSemestersSel);
			$result = $semester->Info();
			$optSemestersOut = array($result['name']);
			$optSemestersIds = array($optSemestersSel);
			//recuperamos el grupo
			$subject->setGroupId($optGruposSel);
			$result = $subject->InfoGroup();
			$optGruposOut = array($result['clave']);
			$optGruposIds = array($optGruposSel);
			//asignamos a smarty las variables $opt
			$smarty->assign('optPeriodosIds', $optPeriodosIds);
			$smarty->assign('optPeriodosOut', $optPeriodosOut);
			$smarty->assign('optPeriodosSel', $optPeriodosSel);
			$smarty->assign('optSemestersIds', $optSemestersIds);
			$smarty->assign('optSemestersOut', $optSemestersOut);
			$smarty->assign('optSemestersSel', $optSemestersSel);
			$smarty->assign('optGruposIds', $optGruposIds);
			$smarty->assign('optGruposOut', $optGruposOut);
			$smarty->assign('optGruposSel', $optGruposSel);
			$smarty->assign("post", $myGradereport);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-gradereport-popup.tpl');
		break;
	case "saveEditGradereport":
			$gradereport->setGradereportId($_POST['gradereportId']);
			//$gradereport->setGroupId($_POST['groupId']);
			$gradereport->setRegularization($_POST['regularization']);
			$gradereport->setGeneration($_POST['generation']);
			if(!$gradereport->Edit())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				if($_SESSION['User']['positionId'] == 1)
				{
					// si el usuario es Admin enumarar todas las actas
					$__gradereport = $gradereport->Enumerate();
					$info['positionId'] = 1;
					$smarty->assign('info',$info);
				}
				else
				{
					// enumerar las actas del usuario (docente) que inicio session
					$__gradereport = $gradereport->EnumerateByPersonalId();
				}
				if($__gradereport)
				{
					foreach($__gradereport as $key => $res)
					{
						//sacamos informacion del grupo
						$subject->setGroupId($res['groupId']);
						$groupx = $subject->infoGroup();
						if($groupx)
							$groupx = $util->DecodeRow($groupx);
						//clave del grupo
						$__gradereport[$key]['claveGroup'] = $groupx['clave'];
						//nombre del grupo
						$__gradereport[$key]['nameGroup'] = $groupx['name'];
						//Id del periodo
						$__gradereport[$key]['periodoId'] = $groupx['periodoId'];
						//clave del periodo
						$periodo->setPeriodoId($groupx['periodoId']);
						$infPeriodo = $periodo->Info();
						if($infPeriodo)
							$infPeriodo = $util->DecodeRow($infPeriodo);
						$__gradereport[$key]['clavePeriodo'] = $infPeriodo['identifier'];
						//clave de la materia
						$__gradereport[$key]['subjectId'] = $groupx['subjectId'];
						//nombre de la materia
						$subject->setSubjectId($groupx['subjectId']);
						$infSubject = $subject->Info();
						if($infSubject)
							$infSubject = $util->DecodeRow($infSubject);
						$__gradereport[$key]['nameSubject'] = $infSubject['name'];
						//Id del semestre
						$__gradereport[$key]['semesterId'] = $infSubject['semesterId'];
						//Clave del semestre
						$semester->setSemesterId($infSubject['semesterId']);
						$infSemester = $semester->Info();
						if($infSemester)
							$infSemester = $util->DecodeRow($infSemester);
						$__gradereport[$key]['claveSemester'] = $infSemester['clave'];
						//nombre del semestre
						$__gradereport[$key]['nameSemester'] = $infSemester['name'];
						
						$complete = $gradereport->IsCalifComplete($res['gradereportId']);
			
						$__gradereport[$key]['p1'] = $complete[1];
						$__gradereport[$key]['p2'] = $complete[2];
						$__gradereport[$key]['p3'] = $complete[3];
					}
				}
				
				$__gradereport = $util->EncodeResult($__gradereport);
				
				$smarty->assign("__gradereport", $__gradereport);
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/gradereport.tpl');
			}
		break;
	case 'requestDataOpts':
		$optGruposIds = array();
		$optGruposOut = array();
		$optGruposSel = 0;
		getGroupsData($optGruposIds, $optGruposOut, $optGruposSel, $_POST['selPeriodo'], $_POST['selSemestre']);
		$optCad= '<select name="groupId" id="groupId">';
		for($i = 0; $i < count($optGruposIds); $i++)
		{
			$optCad .= '<option value="' . $optGruposIds[$i] . '" ';
			if($optGruposSel == $optGruposIds[$i])
				$optCad .= 'selected="selected"';
			$optCad .= '>' . $optGruposOut[$i] . '</option>';
		}
		$optCad .= '</select>';
		$valGeneration = getGeneration($_POST['selPeriodo'], $_POST['selSemestre']);
		echo $optCad . '[#]' . $valGeneration;
		break;
	
	case 'searchGradereport':
			
			$parcial = $_POST['parcial'];
			$status = $_POST['status'];
			$semesterId = $_POST['semesterId'];
			
			if($_SESSION['User']['positionId'] == 1)
			{
				//Si el usuario es Admin enumarar todas las actas
				$gradereport->setSemesterId($semesterId);
				$__gradereport = $gradereport->EnumerateBySearch();
				$info['positionId'] = 1;
				$smarty->assign('info',$info);
			}
			else
			{
				//Enumerar las actas del usuario (docente) que inicio session
				$gradereport->setSemesterId($semesterId);
				$__gradereport = $gradereport->EnumerateByPersonalId();
			}
			
			if($__gradereport)
			{
				$gradereports = array();
				
				foreach($__gradereport as $key => $res)
				{
					$card = $res;
						
					//Sacamos informacion del grupo
					$subject->setGroupId($res['groupId']);
					$groupx = $subject->infoGroup();
					if($groupx)
						$groupx = $util->DecodeRow($groupx);
						
					//Clave del grupo
					$card['claveGroup'] = $groupx['clave'];
					
					//Nombre del grupo
					$card['nameGroup'] = $groupx['name'];
					
					//ID del periodo
					$card['periodoId'] = $groupx['periodoId'];
					
					//Clave del periodo
					$periodo->setPeriodoId($groupx['periodoId']);
					$infPeriodo = $periodo->Info();
					if($infPeriodo)
						$infPeriodo = $util->DecodeRow($infPeriodo);
					$card['clavePeriodo'] = $infPeriodo['identifier'];
					
					//Clave de la materia
					$card['subjectId'] = $groupx['subjectId'];
					
					//Nombre de la materia
					$subject->setSubjectId($groupx['subjectId']);
					$infSubject = $subject->Info();
					if($infSubject)
						$infSubject = $util->DecodeRow($infSubject);
					$card['nameSubject'] = $infSubject['name'];
					$stdLimit = $infSubject['student_limit'];
					
					//ID del semestre
					$card['semesterId'] = $infSubject['semesterId'];
					
					//Clave del semestre
					$semester->setSemesterId($infSubject['semesterId']);
					$infSemester = $semester->Info();
					if($infSemester)
						$infSemester = $util->DecodeRow($infSemester);
					$card['claveSemester'] = $infSemester['clave'];
					
					//Nombre del semestre
					$card['nameSemester'] = $infSemester['name'];
					
					$complete = $gradereport->IsCalifComplete($res['gradereportId']);
					
					$card['p1'] = $complete[1];
					$card['p2'] = $complete[2];
					$card['p3'] = $complete[3];
					
					$gradereport->setGradereportId($res['gradereportId']);
					$stdTotal = $gradereport->GetTotalUsersByGradeReport();
					$card['stdTotal'] = $stdTotal;
					$card['stdLimit'] = $stdLimit;
					$card['stdComplete'] = ($stdTotal >= $stdLimit) ? 'Si' : 'No';
					
					if($parcial == 1 && $complete[1] == $status)				
						$gradereports[$key] = $card;
					elseif($parcial == 2 && $complete[2] == $status)				
						$gradereports[$key] = $card;
					elseif($parcial == 3 && $complete[3] == $status)				
						$gradereports[$key] = $card;
					elseif($parcial == 0)
						$gradereports[$key] = $card;
					
				}//foreach
				
			}//if
			
			$__gradereport = $util->EncodeResult($gradereports);
			
			echo 'ok[#]';
			
			$smarty->assign("__gradereport", $__gradereport);			
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/gradereport.tpl');
			
		break;	
	
}

function getPeriodsData(&$optPeriodosIds, &$optPeriodosOut, &$optPeriodosSel, &$indice)
{
	$optPeriodosIds[] = 0;
	$optPeriodosOut[] = 'Seleccione';
	$optPeriodosSel = 0;
	$optPeriodosInd = 0;
	$indice = 0;
	$periodos = $GLOBALS['periodo']->Enumerate();
	foreach($periodos as $periodo)
	{
		$indice++;
		$optPeriodosIds[] = $periodo['periodoId'];
		$optPeriodosOut[] = $periodo['identifier'] . ' | ' . ($periodo['active'] == 'yes' ? 'activo' : 'inactivo');
		if($periodo['active'] == 'yes')
		{
			$optPeriodosSel = $periodo['periodoId'];
			$optPeriodosInd = $indice;
		}
	}		
}

function getSemesterData(&$optSemestersIds, &$optSemestersOut, &$optSemestersSel)
{
	$optSemestersIds[] = 0;
	$optSemestersOut[] = 'Seleccione';
	$optSemestersSel[] = 0;
	$semesters = $GLOBALS['semester']->Enumerate();
	foreach($semesters as $semester)
	{
		$optSemestersIds[] = $semester['semesterId'];
		$optSemestersOut[] = $semester['name'];
	}
	
}

function getGroupsData(&$optGruposIds, &$optGruposOut, &$optGruposSel, $periodoId = NULL, $semesterId = NULL)
{
	$optGruposIds[] = 0;
	$optGruposOut[] = 'Seleccione';
	$optGruposSel = 0;
	$auxSubjectsG = array(0);
	//$auxPeriodosG = array(0);
	$groups = $GLOBALS['subject']->EnumerateAllGroups();
	if($groups)
		$groups = $GLOBALS['util']->EncodeResult($groups);
	if($periodoId == NULL || $periodoId == 0)
	{
		foreach($groups as $groupx)
		{
			$optGruposIds[] = $groupx['groupId'];
			$optGruposOut[] = $groupx['clave'];
			$auxSubjectsG[] = $groupx['subjectId'];
			//$auxPeriodosG[] = $groupx['periodoId'];
		}
	}
	else
	{
		foreach($groups as $groupx)
		{
			if($groupx['periodoId'] == $periodoId)
			{
				$optGruposIds[] = $groupx['subgpoId'];
				$optGruposOut[] = $groupx['clave'];
				$auxSubjectsG[] = $groupx['subjectId'];
				//$auxPeriodosG[] = $groupx['periodoId'];
			}
		}
	}
	if($semesterId <> NULL && $semesterId > 0)
	{
		$optIds = $optGruposIds;
		$optOut = $optGruposOut;
		//$optPer = $auxPeriodosG;
		//$optSem = $auxSubjectsG;
		$optGruposIds = array(0);
		$optGruposOut = array('Seleccione');
		//$auxPeriodosG = array(0);
		$auxSemesterG = array(0);
		for($i = 1; $i < count($auxSubjectsG); $i++ )
		{
			$GLOBALS['subject']->setSubjectId($auxSubjectsG[$i]);
			$GLOBALS['subject']->Info();
			if($GLOBALS['subject']->getSemesterId() == $semesterId)
			{
				$optGruposIds[] = $optIds[$i];
				$optGruposOut[] = $optOut[$i];
				//$auxPeriodosG[] = $optPer[$i];
			}
		}
	}
	//Eliminar todos los grupos de la lista que ya esten en la tabla de actas
	//guardamos temporalmente los valores de todos los grupos recuperados del mismo periodo y semestre
	$optIds = $optGruposIds;
	$optOut = $optGruposOut;
	//inicializamos los valores de los arreglos de grupos
	$optGruposIds = array(0);
	$optGruposOut = array('Seleccione');
	//por cada indice del arreglo empezando de 1 verificar que no este en la tabla de actas
	for($i = 1; $i < count($optIds); $i++ )
	{
		//establecemos el valor de groupId
		$GLOBALS['gradereport']->setGroupId($optIds[$i]);
		//establecemos el valor de periodoId
		$GLOBALS['gradereport']->setPeriodoId($periodoId);
		//establecemos el valor de semesterId
		$GLOBALS['gradereport']->setSemesterId($semesterId);
		//verificamos si ya existe un grupo en la tabla de actas con el mismo periodo y semestre
		//si existe un registro en la tabla de actas ya no se toma en cuenta este grupo
		$result = $GLOBALS['gradereport']->InfoByGroupPeriodoSemester();
		if(!$result)
		{
			//sino existe en la tabla tomar en cuenta el grupo para visualizarlo llenando los arreglos originales
			$optGruposIds[] = $optIds[$i];
			$optGruposOut[] = $optOut[$i];
		}
	}
}

//asumiendo que los inicios de periodo son FEBRERO Y AGOSTO..de otra forma esta funcion no sirve
function getGeneration($periodoId = NULL, $semesterId = NULL)
{
	if($periodoId == NULL || $semesterId == NULL)
	{
		$generation = "0000";
	}
	else
	{
		//buscamos el periodo segun el valor de periodoId proporcionado...
		$GLOBALS['periodo']->setPeriodoId($periodoId);
		$result = $GLOBALS['periodo']->Info();
		//recuperamos el mes y el año de la fecha representada por el campo 'starts' de la tabla periodo
		$month_start = date('n', strtotime($result['starts']));
		$year_start  = date('Y', strtotime($result['starts']));
		//buscamos el semestre segun el valor de semesterId proporcionado...
		$GLOBALS['semester']->setSemesterId($semesterId);
		$result = $GLOBALS['semester']->Info();
		//recuperamos la clave del semestre (I, II, III, IV, V o VI)...la clave debera estar en este formato para que funcione
		$clave_semester = trim($result['clave']);
		//si el mes del campo starts del periodo seleccionado es Febrero
		if($month_start == 2)
		{
			//si el mes de inicio del periodo es FEBRERO
			if($clave_semester == 'VI')
				$generation = $year_start - 3;
			if($clave_semester == 'V' || $clave_semester == 'IV')
				$generation = $year_start - 2;
			if($clave_semester == 'III' || $clave_semester == 'II')
				$generation = $year_start - 1;
			else
				$generation = $year_start;
		}
		if($month_start == 8)
		{
			//si el mes de inicio del periodo es AGOSTO
			if($clave_semester == 'VI' || $clave_semester == 'V')
				$generation = $year_start - 2;
			if($clave_semester == 'IV' || $clave_semester == 'III')
				$generation = $year_start - 1;
			if($clave_semester == 'II' || $clave_semester == 'I')
				$generation = $year_start;
		}
	}
	return $generation;
}
?>