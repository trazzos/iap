<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addGroup": 
		
		$personal->setPositionId(4);
		$resPers = $personal->EnumerateByPosition();
		$personals = $util->EncodeResult($resPers);
		$subjectId = $_SESSION['subId'];					
		$subject->setSubjectId($subjectId);
		$periodoId = $periodo->GetPeriodoActive();
		$subject->setPeriodoId($periodoId);
		$scheduleTime->setPeriodoId($periodoId);
		$scheduleTimes = $scheduleTime->Enumerate();
		
		$resClass = $classroom->Enumerate();
		$classrooms = $util->EncodeResult($resClass);
		
		$resGroups = $group->Enumerate();
		$groups = $util->EncodeResult($resGroups);
		
		$infS = $subject->Info();
		
		if($subject->IsGroupComplete()){
			$util->Util()->setError(10047,'error');			
			$util->Util()->PrintErrors();
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}else{
			$smarty->assign("tipo",$infS['tipo']);
			$smarty->assign("groups",$groups);
			$smarty->assign("classrooms",$classrooms);
			$smarty->assign("scheduleTimes", $scheduleTimes);
			$smarty->assign("personals", $personals);		
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-subject-group-popup.tpl');
		}		
		break;	

	case "editGroup":
		
		$personal->setPositionId(4);
		$resPers = $personal->EnumerateByPosition();
		$personals = $util->EncodeResult($resPers);
		
		$subject->setGroupId($_POST['id']);
		$result = $subject->InfoGroup();
		$info = $util->EncodeRow($result);
		
		$periodoId = $periodo->GetPeriodoActive();
		$subject->setPeriodoId($periodoId);
		$scheduleTime->setPeriodoId($periodoId);
		$scheduleTimes = $scheduleTime->Enumerate();
		$reSch = $subject->InfoGroupSchedule();
		$sch = array();
		foreach($reSch as $val){
			$schtimeId = $val['schtimeId'];
			$day = $val['day'];
			$sch[$schtimeId][$day] = 1;	
		}
		
		$resClass = $classroom->Enumerate();
		$classrooms = $util->EncodeResult($resClass);
		
		$resGroups = $group->Enumerate();
		$groups = $util->EncodeResult($resGroups);
		
		$subject->setSubjectId($info['subjectId']);
		$infS = $subject->Info();
		
		$smarty->assign("tipo",$infS['tipo']);
		$smarty->assign("groups",$groups);
		$smarty->assign("classrooms", $classrooms);
		$smarty->assign("sch", $sch);
		$smarty->assign("scheduleTimes", $scheduleTimes);
		$smarty->assign("personals", $personals);		
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-subject-group-popup.tpl');
		
		break;
		
	case "saveAddGroup":		
		
		$subjectId = $_SESSION['subId'];
		$subject->setSubjectId($subjectId);
		$subject->setPersonalId($_POST['personalId']);
		
		$infS = $subject->Info();
		if($infS['tipo'] == 'a')	
			$subject->setClave($_POST['clave']);	
		else			
			$subject->setClaveGroupId($_POST['groupId']);
		
		$subject->setName($_POST['name']);
		$subject->setDescription($_POST['description']);
		$subject->setClassroomId($_POST['classroomId']);
		$subject->setRecursamiento($_POST['recursamiento']);
		$periodoId = $periodo->GetPeriodoActive();
		$subject->setPeriodoId($periodoId);
		$subject->setSch($_POST['sch']);
				
		//Si es recursamiento NO checamos horario para que pueda hacerse el mismo horario de la materia a recursar.
		if($_POST['recursamiento'] == 0){
		
			if(!$subject->CheckGroup()){
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				break;		
			}//if
		
		}//if
			
		if(!$subject->SaveGroup())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$subject->setSubjectId($_SESSION['subId']);
			$result = $subject->EnumerateGroups();
			$resGroups = $util->EncodeResult($result);
			
			$groups = array();
			foreach($resGroups as $key => $val){
				
				$card = $val;
				
				if($val['groupId']){
					$group->setGroupId($val['groupId']);
					$card['clave'] = $group->GetNameById();	
				}
								
				$groups[$key] = $card;
					
			}
			
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/subject-group.tpl');
		}		
		
		break;
		
	case "saveEditGroup":

		$periodoId = $periodo->GetPeriodoActive();
		$subject->setPeriodoId($periodoId);
		$subject->setGroupId($_POST['id']);
		$subject->setPersonalId($_POST['personalId']);
		$subject->setName($_POST['name']);		
		$subject->setDescription($_POST['description']);
		$subject->setClassroomId($_POST['classroomId']);
		$subject->setRecursamiento($_POST['recursamiento']);	
		$subject->setSch($_POST['sch']);		
		
		$subjectId = $subject->GetGroupSubjectId();		
		
		$subject->setSubjectId($subjectId);
		$infS = $subject->card();
		if($infS['tipo'] == 'a')	
			$subject->setClave($_POST['clave']);	
		else			
			$subject->setClaveGroupId($_POST['groupId']);

		//Si es recursamiento NO checamos horario para que pueda hacerse el mismo horario de la materia a recursar.
		if($_POST['recursamiento'] == 0){
			
			if(!$subject->CheckGroup()){
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				break;		
			}//if
		
		}//if
				
		if(!$subject->UpdateGroup())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			
			echo "[#]";
			
			$subject->setSubjectId($_SESSION['subId']);
			$periodoId = $periodo->GetPeriodoActive();
			$subject->setPeriodoId($periodoId);
			$result = $subject->EnumerateGroups();
			$resGroups = $util->EncodeResult($result);
			
			$groups = array();
			foreach($resGroups as $key => $val){
				
				$card = $val;
				
				if($val['groupId']){
					$group->setGroupId($val['groupId']);
					$card['clave'] = $group->GetNameById();	
				}
								
				$groups[$key] = $card;
					
			}
			
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/subject-group.tpl');
		}
			
		break;
	
	case 'deleteGroup':
		
		$subject->setGroupId($_POST['id']);	
				
		if(!$subject->DeleteGroup())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		else
		{
			echo "ok[#]";
			
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			
			echo "[#]";
			
			$subject->setSubjectId($_SESSION['subId']);
			$periodoId = $periodo->GetPeriodoActive();
			$subject->setPeriodoId($periodoId);
			$result = $subject->EnumerateGroups();
			$resGroups = $util->EncodeResult($result);
			
			$groups = array();
			foreach($resGroups as $key => $val){
				
				$card = $val;
				
				if($val['groupId']){
					$group->setGroupId($val['groupId']);
					$card['clave'] = $group->GetNameById();	
				}
								
				$groups[$key] = $card;
					
			}
			
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/subject-group.tpl');
		}
			
		break;
}

?>
