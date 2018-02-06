<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	// echo '<pre>'; print_r($_GET);
	// exit;
	$docente->setId($_GET['id']);
	$Info = $docente->infoDocumento();
	
	// echo '<pre>'; print_r($registros);
	// exit;
	
	$smarty->assign("catId", $_GET['id']);	
	$smarty->assign("personalId", $_SESSION['User']['userId']);	
	$smarty->assign("Info", $Info);	
	$smarty->assign("registros", $registros);	
		
	

?>