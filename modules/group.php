<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(6);	
	/* End Session Control */
	
	$groups = $group->Enumerate();	
	$smarty->assign('groups', $groups);

	$periodos = $periodo->Enumerate();
	$smarty->assign('periodos', $periodos);
	$smarty->assign('mnuMain','catalogos');
	
?>