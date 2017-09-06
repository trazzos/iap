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
		$smarty->display(DOC_ROOT.'/templates/boxes/add-position-popup.tpl');
		break;
	case 'saveAddPosition':
		$position->setClave(strtoupper($_POST['frmClave']));
		$position->setName(strtoupper($_POST['frmName']));
		$position->setDescription(strtoupper($_POST['frmDescription']));
		if($position->Save())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('positions', $util->EncodeResult($position->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/position.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
		}
		break;
	case 'editPosition':
		//establecemos el valor de positionId de la clase
		$position->setPositionId($_POST['id']);
		//asignamos a la variable 'post' de smarty la informacion del puesto
		$smarty->assign('post', $position->Info());
		//visualizamos la pantalla de edicion de datos
		$smarty->display(DOC_ROOT . '/templates/boxes/edit-position-popup.tpl');
		break;
	case 'saveEditPosition':
		$position->setPositionId($_POST['positionId']);
		$position->setClave(strtoupper($_POST['clave']));
		$position->setName(strtoupper($_POST['name']));
		$position->setDescription(strtoupper($_POST['description']));
		if($position->Update())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('positions',$util->EncodeResult($position->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/position.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
		}
		break;
	case 'deletePosition':
		$position->setPositionId($_POST['positionId']);
		if($position->Delete())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('positions', $util->EncodeResult($position->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/position.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
		}
		break;
}
?>