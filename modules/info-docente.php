<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	$registros = $solicitud->enumerateTiposSolicitud();
	$personal->setPersonalId($_SESSION['User']['userId']);
	$info = $personal->Info();
	$infoBasic = $personal->InfoBasica();
	
	// echo '<pre>'; print_r($infoBasic);
	// exit;

	$smarty->assign("infoBasic", $infoBasic);	
	$smarty->assign("info", $info);	
	$smarty->assign("registrosStudent", $registrosStudent);	
	$smarty->assign("registros", $registros);	
		
	

?>