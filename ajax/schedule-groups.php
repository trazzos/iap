<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addGroup": 
		
		$majors = $major->Enumerate();
		$semesters = $semester->Enumerate();				
		$majors = $util->EncodeResult($majors);		
		
		$smarty->assign("semesters",$semesters);
		$smarty->assign("majors",$majors);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-schedule-groups-popup.tpl');
				
		break;	

	case "editGroup":
	
		$scheduleGroup->setScheduleGroupId($_POST['id']);
		$info = $scheduleGroup->Info();
		$semesters = $semester->Enumerate();
		$majors = $major->Enumerate();
		
		$majors = $util->EncodeResult($majors);
		
		$group->setSemesterId($info['semesterId']);
		$group->setMajorId($info['majorId']);
		$_groups = $group->Search();
		
		$smarty->assign("majors",$majors);
		$smarty->assign("_groups",$_groups);		
		$smarty->assign("semesters",$semesters);
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-schedule-groups-popup.tpl');
		
		break;
		
	case "saveAddGroup":		
				
		$scheduleGroup->setMajorId($_POST['majorId']);
		$scheduleGroup->setSemesterId($_POST['semesterId']);
		$scheduleGroup->setGroupId($_POST['groupId']);
						
		if(!$scheduleGroup->Save())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			
			echo "[#]";
			
			$result = $scheduleGroup->Enumerate();
			
			$scheduleGroups = $util->EncodeResult($result);
			
			$smarty->assign("scheduleGroups", $scheduleGroups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule-groups.tpl');
		}		
		
		break;
		
	case "saveEditGroup":
	 	
		$scheduleGroup->setMajorId($_POST['majorId']);
		$scheduleGroup->setSemesterId($_POST['semesterId']);
		$scheduleGroup->setGroupId($_POST['groupId']);
		$scheduleGroup->setScheduleGroupId($_POST['id']);
				
		if(!$scheduleGroup->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$result = $scheduleGroup->Enumerate();
			$scheduleGroups = $util->EncodeResult($result);
			$smarty->assign("scheduleGroups", $scheduleGroups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule-groups.tpl');
		}
			
		break;
	
	case 'deleteGroup':
		
		$scheduleGroup->setScheduleGroupId($_POST['id']);	
				
		if(!$scheduleGroup->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$result = $scheduleGroup->Enumerate();
			$scheduleGroups = $util->EncodeResult($result);
			$smarty->assign("scheduleGroups", $scheduleGroups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule-groups.tpl');
		}
			
		break;

	case 'LoadGroups':
			
			$semesterId = intval($_POST['semesterId']);
			$majorId = intval($_POST['majorId']);
						
			$group->setSemesterId($semesterId);
			$group->setMajorId($majorId);
			$result = $group->Search();
			
			echo 'ok[#]';
			
			$smarty->assign('groups',$result);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/list-group.tpl');
					
			break;
}

?>
