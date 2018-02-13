<?php
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	


	$user->setUserId($_SESSION['User']['userId']);// exit;
	$infoUser = $user->Info();// exit;

	$smarty->assign('id', $_GET["id"]);
	
	$module->setCourseModuleId($_GET["id"]);
	$info = $module->InfoCourseModule();
	
	// echo '<pre>'; print_r($info);
	// exit;

	$lstPreguntas = $encuesta->promedioXRubro($info['courseModuleId'],$info['courseId']);       

	$smarty->assign('lstPreguntas', $lstPreguntas);


?>