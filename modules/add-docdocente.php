<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	// echo '<pre>'; print_r($_GET);
	// exit;
	$personal->setPersonalId($_SESSION['User']['userId']);
	$registros = $personal->enumerateCatProductos();
	
	
	$smarty->assign("catId", $_GET['id']);	
	$smarty->assign("registros", $registros);	
		
	

?>