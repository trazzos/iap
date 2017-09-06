<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addClassroom": 
			
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-classroom-popup.tpl');
				
		break;	

	case "editClassroom":
			
		$classroom->setClassroomId($_POST['id']);
		$info = $classroom->Info();
		
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-classroom-popup.tpl');
		
		break;
		
	case "saveAddClassroom":				
		
		$classroom->setClave($_POST['clave']);
		$classroom->setName($_POST['name']);
		$classroom->setDescription($_POST['description']);
		
		if(!$classroom->Save())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $classroom->Enumerate();
			$classrooms = $util->EncodeResult($result);
			$smarty->assign("classrooms", $classrooms);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/classroom.tpl');
		}		
		
		break;
		
	case "saveEditClassroom":	 	
		
		$classroom->setClassroomId($_POST['id']);	
		$classroom->setClave($_POST['clave']);
		$classroom->setName($_POST['name']);
		$classroom->setDescription($_POST['description']);	
		
		if(!$classroom->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $classroom->Enumerate();
			$classrooms = $util->EncodeResult($result);
			$smarty->assign("classrooms", $classrooms);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/classroom.tpl');
		}
			
		break;
	
	case 'deleteClassroom':
		
		$classroom->setClassroomId($_POST['id']);	
				
		if(!$classroom->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $classroom->Enumerate();
			$classrooms = $util->EncodeResult($result);
			$smarty->assign("classrooms", $classrooms);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/classroom.tpl');
		}
			
		break;
}

?>
