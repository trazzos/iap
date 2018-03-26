<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	
	// $personal->setPersonalId($_SESSION['User']['userId']);
	$infoSol = $solicitud->Info($_GET['id']);
	// echo '<pre>'; print_r($infoSol);
	// exit;
	
	$smarty->assign("infoSol", $infoSol);	
		
	

?>