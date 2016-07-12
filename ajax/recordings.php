<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

switch($_POST["type"])
{
	case "addRole": 
		
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-recording-popup.tpl');
				
		break;	

	case "editRole":
			
		$info = $recording->Info($_POST['id']);
		
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-recording-popup.tpl');
		
		break;
		
	case "saveAddRole":				
		
		$recording->setTitle($_POST['title']);
		$recording->setEmbed($_POST['embed']);
		
		if(!$recording->Save())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$recordings = $recording->Enumerate();
			$smarty->assign("recordings", $recordings);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/recordings.tpl');
		}		
		
		break;
		
	case "saveEditRole":
		
		$recording->setTitle($_POST['title']);
		$recording->setEmbed($_POST['embed']);
		
		if(!$recording->Update($_POST["recordingId"]))
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$recordings = $recording->Enumerate();
			$smarty->assign("recordings", $recordings);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/recordings.tpl');
		}
		
		break;
	
	case 'deleteRole':
		
				
		if(!$recording->Delete($_POST['id']))
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$recordings = $recording->Enumerate();
			$smarty->assign("recordings", $recordings);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/recordings.tpl');
		}
			
		break;
}

?>
