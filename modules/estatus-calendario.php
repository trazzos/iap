<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	

	$infoCar = $student->infoCarrera();
	$lstPagos = $student->verCalendarioPagos();
	
	// echo '<pre>'; print_r($lstPagos);
	// exit;
	
	$smarty->assign('lstPagos', $lstPagos);

?>