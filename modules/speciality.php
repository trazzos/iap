<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(2);	
	/* End Session Control */
	
	$specialities = $speciality->Enumerate();	
	
	$smarty->assign('specialities', $specialities);
	$smarty->assign('mnuMain','catalogos');
	
?>