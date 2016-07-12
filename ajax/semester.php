<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

$smarty->assign("DOC_ROOT", DOC_ROOT);
switch($_POST["type"])
{
	case 'addSemester':
		//$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-semester-popup.tpl');
		break;
	case 'saveAddSemester':
		$semester->setClave($_POST['frmClave']);
		$semester->setName($_POST['frmName']);
		//$position->setDescription($_POST['frmDescription']);
		if($semester->Save())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('semesters', $util->EncodeResult($semester->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/semester.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
		}
		break;
	case 'editSemester':
		//establecemos el valor de positionId de la clase
		$semester->setSemesterId($_POST['id']);
		//asignamos a la variable 'post' de smarty la informacion del puesto
		$smarty->assign('post', $semester->Info());
		//visualizamos la pantalla de edicion de datos
		$smarty->display(DOC_ROOT . '/templates/boxes/edit-semester-popup.tpl');
		break;
	case 'saveEditSemester':
		$semester->setSemesterId($_POST['semesterId']);
		$semester->setClave($_POST['clave']);
		$semester->setName($_POST['name']);	
		//$position->setDescription($_POST['description']);
		if($semester->Update())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('semesters', $util->EncodeResult($semester->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/semester.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
		}
		break;
	case 'deleteSemester':
		$semester->setSemesterId($_POST['semesterId']);
		if($semester->Delete())
		{
			echo 'Ok|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '|';
			$smarty->assign('semesters', $util->EncodeResult($semester->Enumerate()));
			$smarty->display(DOC_ROOT . '/templates/lists/semester.tpl');
		}
		else
		{
			echo 'Fail|';
			$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
		}
		break;
}
?>