<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(9);	
	/* End Session Control */
	
	$roles = $role->Enumerate();	
	$smarty->assign('roles', $roles);
	$smarty->assign('mnuMain','catalogos');
	$smarty->assign('mnuSubmain','roles');	
	
?>