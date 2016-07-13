<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(5);	
	/* End Session Control */
	
	$profesions = $profesion->Enumerate();
	$smarty->assign('profesions', $profesions);
	$smarty->assign('mnuMain','catalogos');
	$smarty->assign('mnuSubmain','profesiones');	
	
?>