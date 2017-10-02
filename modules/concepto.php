<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	// $solicitud->setTipo(2);
	$registros = $solicitud->enumerateTiposSolicitud();
	// $registrosStudent = $student->EnumerateTotal();
	// $lstSolicitudes = $solicitud->arraySolicitudes();
	
// echo '<pre>'; print_r($lstSolicitudes);
// exit;
	$smarty->assign("lstSolicitudes", $lstSolicitudes);	
	$smarty->assign("registrosStudent", $registrosStudent);	
	$smarty->assign("registros", $registros);	
		
	

?>