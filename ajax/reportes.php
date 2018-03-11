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
			$arrPage = array();		// ---- arreglo donde guarda los resultados de la paginacion...para usarse en footer-pages-links.tpl
			$viewPage = 1;			// ---- por default se toma la primera pagina, por si aun no esta definidala en la variable GET
			$rowsPerPage = 500;		//<<--- se podria tomar este valor de una variable o constante global, o especificarla para un caso particular
			$pageVar = 'p';	// ---- el nombre de la variable en GET que trae la pagina a mostrar, en este caso se usa viewPage para pasar la pagina a visualizar
			if(isset($_GET["$pageVar"]))
				$viewPage = $_GET["$pageVar"];	//si ya esta definida la variable GET['viewPage'] tomar el valor de esta
			
			
			$course->setAparece('si');
			$coursesCount = $course->EnumerateCount();
			$result = $course->EnumerateByPage($viewPage, $rowsPerPage, $pageVar, WEB_ROOT.'/history-subject', $arrPage);
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
