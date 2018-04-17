<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	


	$lstSol = $solicitud->arraySolicitudes();
	$registros = $solicitud->enumarateSolicitudesStden();
	
		
	// echo "<pre>"; print_r($registros);
	// exit;

	$smarty->assign('registros', $registros);
	$smarty->assign('lstSol', $lstSol);
	

?>