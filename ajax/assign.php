<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

switch($_POST["type"])
{
	case "addAssign": 
		
		$semesters = $semester->Enumerate();
		$personal->setPositionId(1);
		$listPersonals = $personal->EnumerateByPosition();
		$personals = $util->EncodeResult($listPersonals);
		$groups = $group->Enumerate();	

		$smarty->assign('groups', $groups);
		
		$smarty->assign("personals",$personals);
		$smarty->assign("semesters",$semesters);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-assign-popup.tpl');
				
		break;	

	case "editAssign":
	
		$group->setGroupId($_POST['id']);
		$info = $group->Info();
		$semesters = $semester->Enumerate();		
		$specialities = $speciality->Enumerate();
		
		$smarty->assign("specialities",$specialities);		
		$smarty->assign("semesters",$semesters);
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-assign-popup.tpl');
		
		break;
		
	case "saveAddAssign":		
		
		$group->setSemesterId($_POST['semesterId']);
		$group->setSpecialityId($_POST['specialityId']);
		$group->setClave($_POST['clave']);
		$group->setName($_POST['name']);
				
		if(!$group->Save())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$result = $group->Enumerate();
			$groups = $util->EncodeResult($result);
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group.tpl');
		}		
		
		break;
		
	case "saveEditAssign":
	 	
		$group->setSemesterId($_POST['semesterId']);
		$group->setGroupId($_POST['id']);
		$group->setSpecialityId($_POST['specialityId']);	
		$group->setName($_POST['name']);
		$group->setClave($_POST['clave']);	
		
		if(!$group->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$result = $group->Enumerate();
			$groups = $util->EncodeResult($result);
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group.tpl');
		}
			
		break;
	
	case 'deleteAssign':
		
		$group->setGroupId($_POST['id']);	
				
		if(!$group->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
			$result = $group->Enumerate();
			$groups = $util->EncodeResult($result);
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group.tpl');
		}
	
	case "loadSpecialities": 
				
		echo "ok[#]";
		
		$result = $speciality->Enumerate();
		$specialities = $util->EncodeResult($result);
				
		$smarty->assign("specialities",$specialities);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/lists/list-speciality.tpl');
		
		echo "[#]";
		
		$smarty->display(DOC_ROOT.'/templates/lists/list-subject.tpl');
		
		break;
	
	case "loadSubjects": 
		
		$semesterId = $_POST['idSemester'];
		$specialityId = $_POST['idSpeciality'];
		
		echo "ok[#]";
		
		$subject->setSemesterId($semesterId);
		$subject->setSpecialityId($specialityId);
		$result = $subject->EnumerateById();
		$subjects = $util->EncodeResult($result);
				
		$smarty->assign("subjects",$subjects);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/lists/list-subject.tpl');
				
		break;
	
	case "loadGroups": 
		
		$semesterId = $_POST['idSemester'];
		$specialityId = $_POST['idSpeciality'];
		$subjectId = $_POST['idSubject'];
		
		echo "ok[#]";
		/*
		$subject->setSemesterId($semesterId);
		$subject->setSpecialityId($specialityId);
		$subject->setSubjectId($subjectId);
		
		$result = $group->EnumerateById();
		$groups = $util->EncodeResult($result);
				
		$smarty->assign("groups",$groups);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/lists/opt-group.tpl');
		*/
		break;
	
}

?>
