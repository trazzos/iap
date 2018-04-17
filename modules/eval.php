<?php
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	


	$user->setUserId($_SESSION['User']['userId']);// exit;
	$infoUser = $user->Info();// exit;

	
		
		
	// $module->setCourseModuleId();
	$ls = $module->getEvaluacion($_GET["id"]);

	// echo '<pre>'; print_r($ls);
	// exit;

	

	$smarty->assign('id', $_GET["id"]);
	$smarty->assign('ls', $ls);


?>