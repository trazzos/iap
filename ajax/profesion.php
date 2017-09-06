<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$smarty->assign("DOC_ROOT", DOC_ROOT);
switch($_POST["type"])
{
	case 'addPosition':
		//$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-profesion-popup.tpl');
		break;
	case 'saveAddPosition':
		$profesion->setProfesionName(strtoupper($_POST['frmName']));
		if($profesion->Save())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('profesions', $util->EncodeResult($profesion->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/profesion.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
		}
		break;
	case 'editPosition':
		//establecemos el valor de positionId de la clase
		$profesion->setProfesionId($_POST['id']);
		//asignamos a la variable 'post' de smarty la informacion del puesto
		$smarty->assign('post', $profesion->Info());
		//visualizamos la pantalla de edicion de datos
		$smarty->display(DOC_ROOT . '/templates/boxes/edit-profesion-popup.tpl');
		break;
	case 'saveEditPosition':
		$profesion->setProfesionId($_POST['positionId']);
		$profesion->setProfesionName(strtoupper($_POST['name']));
		if($profesion->Update())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('profesions',$util->EncodeResult($profesion->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/profesion.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
		}
		break;
	case 'deletePosition':
		$profesion->setProfesionId($_POST['positionId']);
		if($profesion->Delete())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('profesions', $util->EncodeResult($profesion->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/profesion.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
		}
		break;
}
?>