<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	$lstSemestres = $solicitud->enumerateSolicitudes();

	$smarty->assign('lstSemestres', $lstSemestres);
	

?>