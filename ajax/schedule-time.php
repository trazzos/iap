<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addSchedule_time": 
			
			$hours = $util->GetHours();
			$minutes = $util->GetMinutes();
			
			$smarty->assign("hours",$hours);
			$smarty->assign("minutes",$minutes);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-schedule-time-popup.tpl');
			
			break;	
	
	case "saveAddSchedule_time":
			
			$scheduleTime->setHr_start($_POST['hr_start']);
			$scheduleTime->setHr_start($_POST['hr_start']);
			$scheduleTime->setMin_start($_POST['min_start']);
			$scheduleTime->setHr_end($_POST['hr_end']);
			$scheduleTime->setMin_end($_POST['min_end']);
			if($_POST['free_time'])
				$free_time = 1;
			else
				$free_time = 0;
			$scheduleTime->setFree_time($free_time);
			$scheduleTime->setDescription(utf8_decode($_POST['description']));
			
			$periodoId = $periodo->GetPeriodoActive();
			$scheduleTime->setPeriodoId($periodoId);
			
			if(!$scheduleTime->Save())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$result = $scheduleTime->Enumerate();
				$schedule_time = $util->EncodeResult($result);
				$smarty->assign("schedule_time", $schedule_time);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/schedule-time.tpl');
			}
			break;
	
	case "deleteSchedule_time":
	
			$scheduleTime->setSchtimeId($_POST['schtimeId']);
			if($scheduleTime->Delete())
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$periodoId = $periodo->GetPeriodoActive();
				$scheduleTime->setPeriodoId($periodoId);
				$result = $scheduleTime->Enumerate();
				if($result)
					$schedule_time = $util->EncodeResult($result);
				$smarty->assign("schedule_time", $schedule_time);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/schedule-time.tpl');
			}
			
			break;
		
	case "editSchedule_time": 
	
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$scheduleTime->setSchtimeId($_POST['schtimeId']);
			$info = $scheduleTime->Info();
			$mySchedule_time = $util->EncodeRow($info);
			$hours = $util->GetHours();
			$minutes = $util->GetMinutes();
			
			$smarty->assign("hours",$hours);
			$smarty->assign("minutes",$minutes);			
			$smarty->assign("info", $mySchedule_time);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-schedule-time-popup.tpl');
			
			break;
			
	case "saveEditSchedule_time":
			
			$scheduleTime->setSchtimeId($_POST['schtimeId']);
			$scheduleTime->setHr_start($_POST['hr_start']);
			$scheduleTime->setHr_start($_POST['hr_start']);
			$scheduleTime->setMin_start($_POST['min_start']);
			$scheduleTime->setHr_end($_POST['hr_end']);
			$scheduleTime->setMin_end($_POST['min_end']);
			if($_POST['free_time'])
				$free_time = 1;
			else
				$free_time = 0;
			$scheduleTime->setFree_time($free_time);
			$scheduleTime->setDescription(utf8_decode($_POST['description']));
						
			if(!$scheduleTime->Edit())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$periodoId = $periodo->GetPeriodoActive();
				$scheduleTime->setPeriodoId($periodoId);
				$result = $scheduleTime->Enumerate();
				$schedule_time = $util->EncodeResult($result);
				$smarty->assign("schedule_time", $schedule_time);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/schedule-time.tpl');
			}
		break;
}
?>
