<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addGroup": 
		
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-group-popup.tpl');
				
		break;	

	case "editGroup":
	
		$group->setGroupId($_POST['id']);
		$info = $group->Info();
	
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-group-popup.tpl');
		
		break;
		
	case "saveAddGroup":		
				
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
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $group->Enumerate();
			$groups = $util->EncodeResult($result);
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group.tpl');
		}		
		
		break;
		
	case "saveEditGroup":
	 	
		$group->setGroupId($_POST['id']);
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
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $group->Enumerate();
			$groups = $util->EncodeResult($result);
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group.tpl');
		}
			
		break;
	
	case 'deleteGroup':
		
		$group->setGroupId($_POST['id']);	
						
		if(!$group->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $group->Enumerate();
			$groups = $util->EncodeResult($result);
			$smarty->assign("groups", $groups);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/group.tpl');
		}
			
		break;
}

?>