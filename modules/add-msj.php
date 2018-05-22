<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	
	// echo '<pre>'; print_r($_GET);
	// exit;
	$personal->setTipo('Docente');
	$personals = $personal->EnumerateNew();
	$smarty->assign("personals", $personals);
	
	
	if($_GET['id']){

		$infoMsj = $personal->InfoMsjs($_GET['id']);
		$lsd = $personal->enumerateDocentesMsj($_GET['id']);
		$smarty->assign("lsd", $lsd);
		$smarty->assign("infoMsj", $infoMsj);
		
	}

	

?>