<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	
	$registros = $solicitud->enumerateSincronizacion();

	$smarty->assign("lstSolicitudes", $lstSolicitudes);	
	$smarty->assign("registrosStudent", $registrosStudent);	
	$smarty->assign("registros", $registros);	
		
	

?>