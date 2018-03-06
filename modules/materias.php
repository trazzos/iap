<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	// echo '<pre>'; print_r($_GET);
	// exit;
	
	
	$registros = $module->materiasProfesores($_GET['id']);
	
	// echo '<pre>'; print_r($registros);
	// exit;


	$smarty->assign("pId", $_GET['id']);	
	$smarty->assign("registros", $registros);	
		
	

?>