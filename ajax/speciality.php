<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addSpeciality": 
	
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-speciality-popup.tpl');
		
		break;	

	case "editSpeciality":
	
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$speciality->setSpecialityId($_POST['id']);
		$info = $speciality->Info();
		$smarty->assign("info", $info);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-speciality-popup.tpl');
		
		break;
		
	case "saveAddSpeciality":		
		
		$speciality->setClave($_POST['clave']);
		$speciality->setName($_POST['name']);
			
		if(!$speciality->Save())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $speciality->Enumerate();
			$specialities = $util->EncodeResult($result);
			$smarty->assign("specialities", $specialities);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/speciality.tpl');
		}		
		
		break;
		
	case "saveEditSpeciality":
	 	
		$speciality->setSpecialityId($_POST['id']);	
		$speciality->setClave($_POST['clave']);
		$speciality->setName($_POST['name']);
				
		if(!$speciality->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $speciality->Enumerate();
			$specialities = $util->EncodeResult($result);
			$smarty->assign("specialities", $specialities);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/speciality.tpl');
		}
			
		break;
	
	case 'deleteSpeciality':
		
		$speciality->setSpecialityId($_POST['id']);	
				
		if(!$speciality->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $speciality->Enumerate();
			$specialities = $util->EncodeResult($result);
			$smarty->assign("specialities", $specialities);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/speciality.tpl');
		}
			
		break;
}

?>
