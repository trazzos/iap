<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$specialities = $util->EncodeResult($speciality->Enumerate());
$semesters = $util->EncodeResult($semester->Enumerate());

$smarty->assign("DOC_ROOT", DOC_ROOT);

switch($_POST["type"])
{

	case 'buscarSolicitud': 
			
			// echo '<pre>'; print_r($_POST);
			// exit;
			
			$solicitud->setUserId($_POST['alumnoId']);
			$solicitud->setTipoSolicitudId($_POST['tipo']);
			$solicitud->setStatus($_POST['estatus']);
			$registros = $solicitud->enumarateSolicitudesAdmin();
			$smarty->assign("registros", $registros);
			$smarty->display(DOC_ROOT.'/templates/lists/new/solicitud.tpl');
	break;
		
		
		
}
?>