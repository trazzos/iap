<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	

	
	if($_GET['id']){
		$info = $solicitud->infoSolicitud($_GET['id']);
		// $registros = $solicitud->enumarateSolicitudesAdmin();
	}
	
	
		
	// echo "<pre>"; print_r($info);
	// exit;

	$smarty->assign('id', $_GET['id']);
	$smarty->assign('info', $info);
	$smarty->assign('lstSol', $lstSol);
	

?>