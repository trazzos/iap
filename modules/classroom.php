<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(17);	
	/* End Session Control */
	
	$classrooms = $classroom->Enumerate();	
	$smarty->assign('classrooms', $classrooms);
	$smarty->assign('mnuMain','catalogos');
	
?>