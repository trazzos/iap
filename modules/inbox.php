<?php
		
	/* For Session Control - Don't remove this */
	//	$user->allow_access(8);	

	// echo '<pre>'; print_r($_SESSION);	
	// echo '<pre>'; print_r($_POST);	
	// exit;
	
	if ($_SESSION['User']['type']=='student'){
		$module->setQuienEnviaId('personal');
		$smarty->assign('mnuSubmain','foro');
	}else{
		$module->setQuienEnviaId('alumno');
		$smarty->assign('mnuMain', "cursos");
	}
	$module->setStatusIn('activo');
	$module->setTipoReporte('entrada');
	$module->setRecibeId($_SESSION['User']['userId']);
	$module->setCMId($_GET["id"]);
	
	if ($_SESSION['User']['positionId'] == 1){
		$lstMsj = $module->EnumerateInboxAdmin();
	}else{
		$lstMsj = $module->EnumerateInbox(); 
	}
	
	
	
	$smarty->assign('id', $_GET["id"]);
	$smarty->assign('infoC', $infoC);
	$smarty->assign('courseMId', $_GET["id"]);
	$smarty->assign('lstMsj', $lstMsj);
	

?>