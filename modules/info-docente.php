<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	$registros = $solicitud->enumerateTiposSolicitud();
	$personal->setPersonalId($_SESSION['User']['userId']);
	$info = $personal->Info();
	
	// echo '<pre>'; print_r($info);
	// exit;

	$smarty->assign("info", $info);	
	$smarty->assign("registrosStudent", $registrosStudent);	
	$smarty->assign("registros", $registros);	
		
	

?>