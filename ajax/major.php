<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case "addMajor": 
			
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/boxes/add-major-popup.tpl');
			
			break;
			
		case "saveAddMajor": 
		
				$major->setName($_POST['name']);
				$major->setDescription($_POST['description']);
				$major->setIdentifier($_POST['identifier']);
				$major->setAuthorization($_POST['authorization']);
	
				if(!$major->Save())
				{
					echo "fail[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				}
				else
				{
					echo "ok[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					echo "[#]";
					$majors = $major->Enumerate();
					$majors = $util->EncodeResult($majors);
					$smarty->assign("majors", $majors);
					$smarty->assign("DOC_ROOT", DOC_ROOT);
					$smarty->display(DOC_ROOT.'/templates/lists/major.tpl');
				}
				
			break;	
		
		case "deleteMajor":
				
				$major->setMajorId($_POST['id']);
				if($major->Delete())
				{
					echo "ok[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					echo "[#]";
					$majors = $major->Enumerate();
					$majors = $util->EncodeResult($majors);
					$smarty->assign("majors", $majors);
					$smarty->assign("DOC_ROOT", DOC_ROOT);
					$smarty->display(DOC_ROOT.'/templates/lists/major.tpl');
				}
				
			break;
			
		case "editMajor":
		
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$major->setMajorId($_POST['id']);
				$myMajor = $major->Info();
				$myMajor = $util->EncodeRow($myMajor);
				
				$smarty->assign("post", $myMajor);
				$smarty->display(DOC_ROOT.'/templates/boxes/edit-major-popup.tpl');
			
			break;
			
		case "saveEditMajor":
		 
				$major->setMajorId($_POST['majorId']);
				$major->setName($_POST['name']);
				$major->setDescription($_POST['description']);
				$major->setIdentifier($_POST['identifier']);
				$major->setAuthorization($_POST['authorization']);
				
				if(!$major->Edit())
				{
					echo "fail[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				}
				else
				{
					echo "ok[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					echo "[#]";
					$majors = $major->Enumerate();
					$majors = $util->EncodeResult($majors);
					$smarty->assign("majors", $majors);
					$smarty->assign("DOC_ROOT", DOC_ROOT);
					$smarty->display(DOC_ROOT.'/templates/lists/major.tpl');
				}
				
			break;	
	
	}

?>
