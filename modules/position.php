<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(5);	
	/* End Session Control */
	
	$positions = $position->Enumerate();
	$smarty->assign('positions', $positions);
	$smarty->assign('mnuMain','catalogos');
	$smarty->assign('mnuSubmain','puestos');	
	
?>