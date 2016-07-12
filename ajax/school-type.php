<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');
switch($_POST["type"])
{
	case "addSchoolType": 
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-school-type-popup.tpl');
		break;	
	case "saveAddSchoolType":
			$schoolType->setClave($_POST['clave']);
			$schoolType->setName($_POST['name']);
			if(!$schoolType->Save())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$result = $schoolType->Enumerate();
				$result['items'] = $util->EncodeResult($result['items']);
				$smarty->assign("resSchoolType", $result);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/school-type.tpl');
			}
		break;
	case "deleteSchoolType":
			$schoolType->setSchtypId($_POST['schtypId']);
			if($schoolType->Delete())
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$resSchoolType = $schoolType->Enumerate();
				$resSchoolType['items'] = $util->EncodeResult($resSchoolType['items']);
				$smarty->assign("resSchoolType", $resSchoolType);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/school-type.tpl');
			}
		break;
	case "editSchoolType": 
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$schoolType->setSchtypId($_POST['schtypId']);
			$row = $schoolType->Info();
			$mySchoolType = $util->EncodeRow($row);
			$smarty->assign("post", $mySchoolType);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-school-type-popup.tpl');
		break;
	case "saveEditSchoolType":
			$schoolType->setSchtypId($_POST['schtypId']);
			$schoolType->setClave($_POST['clave']);
			$schoolType->setName($_POST['name']);
			if(!$schoolType->Edit())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				
				$result = $schoolType->Enumerate();
				$result['items'] = $util->EncodeResult($result['items']);
								
				$smarty->assign("resSchoolType", $result);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/school-type.tpl');
			}
		break;
}
?>
