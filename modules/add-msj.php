<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	
	$personal->setTipo('Docente');
	$personals = $personal->EnumerateNew();

	$smarty->assign("personals", $personals);

?>