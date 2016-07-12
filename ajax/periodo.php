<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
		
	switch($_POST["type"])
	{
		case "addPeriodo":
		
				$optActiveIds = array('*', 'yes', 'no');
				$optActiveOut = array('Seleccione', 'SI', 'NO');
				$optActiveSel = '*';
				$smarty->assign("optActiveIds", $optActiveIds);
				$smarty->assign("optActiveOut", $optActiveOut);
				$smarty->assign("optActiveSel", $optActiveSel);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/boxes/add-periodo-popup.tpl');
				
			break;	
			
		case "saveAddPeriodo":
		
				$periodo->setIdentifier(strtoupper($_POST['identifier']));
				$periodo->setName(strtoupper($_POST['name']));
				$periodo->setStarts($_POST['starts']);
				$periodo->setEnds($_POST['ends']);
				$periodo->setFichasStarts($_POST['fichasStarts']);
				$periodo->setFichasEnds($_POST['fichasEnds']);
				$periodo->setVacationsStarts($_POST['vacationsStarts']);
				$periodo->setVacationsEnds($_POST['vacationsEnds']);
				$periodo->setActive($_POST['active']);
				
				if(!$periodo->Save())
				{
					echo "fail[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				}
				else
				{
					echo "ok[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					echo "[#]";
					$__periodo = $periodo->Enumerate();
					$smarty->assign("__periodo", $__periodo);
					$smarty->assign("DOC_ROOT", DOC_ROOT);
					$smarty->display(DOC_ROOT.'/templates/lists/periodo.tpl');
				}
				
			break;
			
		case "deletePeriodo":
		
				$periodo->setPeriodoId($_POST['periodoId']);
				
				if($periodo->Delete())
				{
					echo "ok[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					echo "[#]";
					$__periodo = $periodo->Enumerate();
					$smarty->assign("__periodo", $__periodo);
					$smarty->assign("DOC_ROOT", DOC_ROOT);
					$smarty->display(DOC_ROOT.'/templates/lists/periodo.tpl');
				}
				
			break;
			
		case "editPeriodo": 
		
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$periodo->setPeriodoId($_POST['periodoId']);
				$myPeriodo = $periodo->Info();
				$smarty->assign("post", $myPeriodo);
				$optActiveIds = array('*', 'yes', 'no');
				$optActiveOut = array('Seleccione', 'SI', 'NO');
				$optActiveSel = $myPeriodo['active'];
				$smarty->assign("optActiveIds", $optActiveIds);
				$smarty->assign("optActiveOut", $optActiveOut);
				$smarty->assign("optActiveSel", $optActiveSel);
				$smarty->display(DOC_ROOT.'/templates/boxes/edit-periodo-popup.tpl');
				
			break;
			
		case "saveEditPeriodo":
		
				$periodo->setPeriodoId($_POST['periodoId']);
				$periodo->setIdentifier(strtoupper($_POST['identifier']));
				$periodo->setName(strtoupper($_POST['name']));
				$periodo->setStarts($_POST['starts']);
				$periodo->setEnds($_POST['ends']);
				$periodo->setFichasStarts($_POST['fichasStarts']);
				$periodo->setFichasEnds($_POST['fichasEnds']);
				$periodo->setVacationsStarts($_POST['vacationsStarts']);
				$periodo->setVacationsEnds($_POST['vacationsEnds']);
				$periodo->setActive($_POST['active']);
				
				if(!$periodo->Edit())
				{
					echo "fail[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				}
				else
				{
					echo "ok[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					echo "[#]";
					$__periodo = $periodo->Enumerate();
					$smarty->assign("__periodo", $__periodo);
					$smarty->assign("DOC_ROOT", DOC_ROOT);
					$smarty->display(DOC_ROOT.'/templates/lists/periodo.tpl');
				}
				
			break;
			
	}
?>
