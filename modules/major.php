<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(1);	
	/* End Session Control */
	
	$majors = $major->Enumerate();
	$smarty->assign("majors", $majors);
	$smarty->assign('mnuMain','catalogos');
	$smarty->assign('mnuSubmain','programas');	
	
?>