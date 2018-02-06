<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	
	$personal->setPersonalId($_SESSION['User']['userId']);
	$registros = $personal->enumerateCatProductos();
	
	
	$smarty->assign("registros", $registros);	
		
	

?>