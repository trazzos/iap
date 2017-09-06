<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addGroup": 
		
		$groupId = $_SESSION['gpoId'];
		
		$group->setGroupId($groupId);
		$semesterId = $group->GetIdSemester();
		
		$result = $subject->Enumerate();
		$listSubjects = $util->EncodeResult($result);
		
		$result2 = $group->GetSubjects();
		$subInGpo = array();
		foreach($result2 as $key => $val){
			$subInGpo[$key] = $val['subjectId'];
		}
						
		foreach($listSubjects as $key => $row){
			if($row['semesterId'] == $semesterId && !in_array($row['subjectId'],$subInGpo))
				$subjects[$key] = $row;
		}
		
		$smarty->assign("subjects",$subjects);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-group-subject-popup.tpl');
				
		break;	

	case "editGroup":
		
		$groupId = $_SESSION['gpoId'];
		$group->setGroupId($groupId);
		$semesterId = $group->GetIdSemester();		
		
		$group->setGpoSubId($_POST['id']);
		$info = $group->InfoSubject();
		
		$result = $subject->Enumerate();
		$listSubjects = $util->EncodeResult($result);
		
		$result2 = $group->GetSubjects();
		foreach($result2 as $key => $val){
			$subInGpo[$key] = $val['subjectId'];
		}
						
		foreach($listSubjects as $key => $row){
			if($row['subjectId'] == $info['subjectId'])
				$subjects[$key] = $row;
			elseif($row['semesterId'] == $semesterId && !in_array($row['subjectId'],$subInGpo))
				$subjects[$key] = $row;
		}
		
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->assign("subjects",$subjects);
		$smarty->assign("info", $info);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-group-subject-popup.tpl');
		
		break;
		
	case "saveAddGroup":		
		
		$groupId = $_SESSION['gpoId'];
		$group->setGroupId($groupId);
		$group->setSubjectId($_POST['subjectId']);
						
		if(!$group->AssignSubject())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			
			$groupId = $_SESSION['gpoId'];
			
			$group->setGroupId($groupId);
			$result = $group->EnumerateSubjects();
			$gposubjects = $util->EncodeResult($result);
			
			$smarty->assign('gposubjects', $gposubjects);	
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group-subject.tpl');
		}		
		
		break;
		
	case "saveEditGroup":
	 	
		$gposubId = $_POST['id'];
		$group->setGpoSubId($gposubId);
		$group->setSubjectId($_POST['subjectId']);	
		
		if(!$group->UpdateSubject())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			
			$groupId = $_SESSION['gpoId'];
			
			$group->setGroupId($groupId);
			$result = $group->EnumerateSubjects();
			$gposubjects = $util->EncodeResult($result);
			
			$smarty->assign('gposubjects', $gposubjects);	
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group-subject.tpl');
		}
			
		break;
	
	case 'deleteGroup':
		
		$group->setGpoSubId($_POST['id']);	
				
		if(!$group->DeleteSubject())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			
			$groupId = $_SESSION['gpoId'];
			
			$group->setGroupId($groupId);
			$result = $group->EnumerateSubjects();
			$gposubjects = $util->EncodeResult($result);
			
			$smarty->assign('gposubjects', $gposubjects);	
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group-subject.tpl');
		}
			
		break;
}

?>
