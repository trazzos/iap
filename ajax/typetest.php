<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addTypetest": 
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-typetest-popup.tpl');
		break;	
	case "saveAddTypetest":
			//recuperamos el periodo activo
			$periodoActive = $periodo->GetPeriodoActive();
			//establecemos los valores de los datos que se van a guardar
			$typetest->setIdentifier(strtoupper($_POST['identifier']));
			$typetest->setTypetest(strtoupper($_POST['typetest']));
			$typetest->setRegularization($_POST['regularization']);
			if(!$typetest->Save())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$__typetest = $util->EncodeResult($typetest->Enumerate());
				$smarty->assign("__typetest", $__typetest);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/typetest.tpl');
			}
		break;
	case "deleteTypetest":
			$typetest->setTestId($_POST['testId']);
			if($typetest->Delete())
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$__typetest = $typetest->Enumerate();
				$smarty->assign("__typetest", $__typetest);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/typetest.tpl');
			}
			else
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			}
		break;
	case "editTypetest": 
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$typetest->setTestId($_POST['testId']);
			$myTypetest = $typetest->Info();
			$smarty->assign("post", $myTypetest);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-typetest-popup.tpl');
		break;
	case "saveEditTypetest":
			$typetest->setTestId(strtoupper($_POST['testId']));
			$typetest->setIdentifier(strtoupper($_POST['identifier']));
			$typetest->setTypetest($_POST['typetest']);
			$typetest->setRegularization($_POST['regularization']);
			if(!$typetest->Edit())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				$__typetest = $util->EncodeResult($typetest->Enumerate());
				$smarty->assign("__typetest", $__typetest);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/typetest.tpl');
			}
		break;
}
?>
