<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

if($_POST["type"] == 'addSchedule_test' || $_POST["type"] == 'editSchedule_test' )
{
	//recuperamos los tipos de examenes que existen
	$optTypetestIds = array(0);
	$optTypetestOut = array('Seleccione');
	$optTypetestSel = 0;
	$typetestEnum = $typetest->Enumerate();
	if($typetestEnum)
	{
		$typetestEnum = $util->EncodeResult($typetestEnum);
		foreach($typetestEnum as $row)
		{
			$optTypetestIds[] = $row['testId'];
			$optTypetestOut[] = $row['typetest'];
		}
	}
	$smarty->assign('optTypetestIds', $optTypetestIds);
	$smarty->assign('optTypetestOut', $optTypetestOut);
	$smarty->assign('optTypetestSel', $optTypetestSel);
	//recuperamos el Id del periodo activo
	$periodoId = $periodo->GetPeriodoActive();
	$smarty->assign('periodoId', $periodoId);
	//construimos la fecha de seleccion
	//año
	$optDateYearsIds = array();
	$optDateYearsOut = array();
	$optDateYearsSel = 0;
	$currYear = (int)date('Y');
	for($i = $currYear - 5; $i < $currYear + 5; $i++)
	{
		$optDateYearsIds[] = $i;
		$optDateYearsOut[] = $i;
		if($i == $currYear)
			$optDateYearsSel = $i;
	}
	//mes
	$optDateMonthIds = array(1,2,3,4,5,6,7,8,9,10,11,12);
	$optDateMonthOut = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
	$optDateMonthSel = (int)date('m');
	//dia
	$optDateDayIds = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	$optDateDayOut = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	$optDateDaySel = (int)date('d');
	$smarty->assign('optDateYearsIds', $optDateYearsIds);
	$smarty->assign('optDateYearsOut', $optDateYearsOut);
	$smarty->assign('optDateYearsSel', $optDateYearsSel);
	$smarty->assign('optDateMonthIds', $optDateMonthIds);
	$smarty->assign('optDateMonthOut', $optDateMonthOut);
	$smarty->assign('optDateMonthSel', $optDateMonthSel);
	$smarty->assign('optDateDayIds', $optDateDayIds);
	$smarty->assign('optDateDayOut', $optDateDayOut);
	$smarty->assign('optDateDaySel', $optDateDaySel);
}

switch($_POST["type"])
{
	case "addSchedule_test": 
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-schedule_test-popup.tpl');
		break;	
	case "saveAddSchedule_test":
			$schedule_test->setTypetestId($_POST['typetestId']);
			$schedule_test->setDatetest($_POST['typetestYear'], $_POST['typetestMonth'], $_POST['typetestDay']);
			$schedule_test->setComments($_POST['comments']);
			$schedule_test->setPeriodoId($_POST['periodoId']);
			if(!$schedule_test->Save())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$__schedule_test = $schedule_test->Enumerate();
				$__schedule_test = $util->EncodeResult($__schedule_test);
				$smarty->assign("__schedule_test", $__schedule_test);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/schedule_test.tpl');
			}
		break;
	case "deleteSchedule_test":
	
			$schedule_test->setScheduletestId($_POST['scheduletestId']);
						
			if($schedule_test->Delete())
			{
				$periodoId = $periodo->GetPeriodoActive();
				$schedule_test->setPeriodoId($periodoId);	
					
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$__schedule_test = $schedule_test->Enumerate();
				$__schedule_test = $util->EncodeResult($__schedule_test);
				$smarty->assign("__schedule_test", $__schedule_test);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/schedule_test.tpl');
			}
			else
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			}
			
		break;
		
	case "editSchedule_test": 
	
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$schedule_test->setScheduletestId($_POST['scheduletestId']);
			$mySchedule_test = $schedule_test->Info();
			$mySchedule_test = $util->EncodeRow($mySchedule_test);
			
			$smarty->assign('optTypetestSel', $mySchedule_test['typetestId']);
			$smarty->assign('optDateYearsSel', (int)substr($mySchedule_test['datetest'], 0, 4));
			$smarty->assign('optDateMonthSel', (int)substr($mySchedule_test['datetest'], 5, 2));
			$smarty->assign('optDateDaySel', (int)substr($mySchedule_test['datetest'], 8, 2));
			//si se edita un periodo, se toma el mismo periodoId que tiene el examen a modificar
			$smarty->assign('periodoId', $mySchedule_test['periodoId']);
			$smarty->assign("post", $mySchedule_test);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-schedule_test-popup.tpl');
			
		break;
		
	case "saveEditSchedule_test":
	
			$schedule_test->setScheduletestId($_POST['scheduletestId']);
			$schedule_test->setTypetestId($_POST['typetestId']);
			$schedule_test->setDatetest($_POST['typetestYear'], $_POST['typetestMonth'], $_POST['typetestDay']);
			$schedule_test->setComments($_POST['comments']);
			$schedule_test->setPeriodoId($_POST['periodoId']);
			
			if(!$schedule_test->Edit())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$__schedule_test = $schedule_test->Enumerate();
				$__schedule_test = $util->EncodeResult($__schedule_test);
				$smarty->assign("__schedule_test", $__schedule_test);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/schedule_test.tpl');
			}
			
		break;
		
}
?>
