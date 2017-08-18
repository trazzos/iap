<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	// $solicitud->setTipo(2);
	$registros = $solicitud->enumarateSolicitudesAdmin();
	
	
	$smarty->assign("registros", $registros);	
		
	

?>