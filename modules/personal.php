<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(3);	
	/* End Session Control */
		
	$personals = $personal->Enumerate('lastname_paterno ASC');
	$smarty->assign('personals', $personals);
	$smarty->assign('mnuMain','catalogos');
	$smarty->assign('mnuSubmain','personal');	
	
	
?>