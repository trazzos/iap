<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(7);	
	/* End Session Control */
	
	$smarty->assign('semesters',$semester->Enumerate());
	$smarty->assign('mnuMain','catalogos');
	
?>