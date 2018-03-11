<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');
session_start();

switch($_POST["type"])
{
	case "saveEditContrato": 
		
			// echo '<pre>'; print_r($_POST);
		$course->setTarifa($_POST['tarifa']);
		$course->setHora($_POST['horas']);
		if($course->editaCosto($_POST['id']))
		{
			
			$course->setAparece('si');
			$result = $course->EnumerateCourse();
			$result = $util->orderMultiDimensionalArray($result,'active',true);
			echo 'ok[#]';
			echo 'exit';
			echo '[#]';
			$smarty->assign('subjects', $result);
			$smarty->assign('arrPage', $arrPage);
			$smarty->assign('coursesCount', $coursesCount);
			$smarty->display(DOC_ROOT.'/templates/lists/new/tabla-costo.tpl');
		}
		else{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
				
	break;	

}

?>
