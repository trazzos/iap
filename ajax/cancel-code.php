<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

switch($_POST["type"])
{
	case "addCode": 
				
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-cancel-code-popup.tpl');
				
		break;	

	case "editCode":
			
		$code->setCodeId($_POST['id']);
		$info = $code->Info();
		
		$smarty->assign("info", $info);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-cancel-code-popup.tpl');
		
		break;
		
	case "saveAddCode":				
		
		$code->setClave($_POST['clave']);
		$code->setName($_POST['name']);
				
		if(!$code->Save())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $code->Enumerate();
			$codes = $util->EncodeResult($result);
			$smarty->assign("codes", $codes);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cancel-code.tpl');
		}		
		
		break;
		
	case "saveEditCode":	 	
		
		$code->setCodeId($_POST['id']);	
		$code->setClave($_POST['clave']);
		$code->setName($_POST['name']);
				
		if(!$code->Update())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $code->Enumerate();
			$codes = $util->EncodeResult($result);
			$smarty->assign("codes", $codes);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cancel-code.tpl');
		}
			
		break;
	
	case 'deleteCode':
		
		$code->setCodeId($_POST['id']);	
				
		if(!$code->Delete())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			$result = $code->Enumerate();
			$codes = $util->EncodeResult($result);
			$smarty->assign("codes", $codes);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/cancel-code.tpl');
		}
			
		break;
}

?>
