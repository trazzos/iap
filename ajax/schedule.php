<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addSchedule": 
	
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-schedule-popup.tpl');
		
		break;	

	case "editSchedule":
	
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$schedule->setScheduleId($_POST['id']);
		$info = $schedule->Info();
		$smarty->assign("info", $info);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-schedule-popup.tpl');
		
		break;
		
	case "saveAddSchedule":		
		
		$schedule->setName($_POST['name']);
		$schedule->setDescription($_POST['description']);			
		
		if(!$schedule->Save())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$result = $schedule->Enumerate();
			$schedules = $util->EncodeResult($result);
			$smarty->assign("schedules", $schedules);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule.tpl');
		}		
		
		break;
		
	case "saveEditSchedule":
	 	
		$schedule->setScheduleId($_POST['id']);	
		$schedule->setName($_POST['name']);
		$schedule->setDescription($_POST['description']);	
		
		if(!$schedule->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$result = $schedule->Enumerate();
			$schedules = $util->EncodeResult($result);
			$smarty->assign("schedules", $schedules);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule.tpl');
		}
			
		break;
	
	case 'deleteSchedule':
		
		$schedule->setScheduleId($_POST['id']);	
				
		if(!$schedule->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$result = $schedule->Enumerate();
			$schedules = $util->EncodeResult($result);
			$smarty->assign("schedules", $schedules);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule.tpl');
		}
			
		break;
}

?>
