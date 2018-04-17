<?php
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	


	$user->setUserId($_SESSION['User']['userId']);// exit;
	$infoUser = $user->Info();// exit;

	if ($_GET["id"]){
		$smarty->assign('id', $_GET["id"]);
		
		$module->setCourseModuleId($_GET["id"]);
		$info = $module->InfoCourseModule();
	}
	// echo '<pre>'; print_r($info);
	// exit;
	if ($_GET["id"]){
		$lstPreguntas = $encuesta->promedioXRubro($info['courseModuleId'],$info['courseId']);   
	}else{
		
		$lstPreguntas = $encuesta->promedioXRubroAdmin($_GET['personalId']);   
	}

	$smarty->assign('mId', $_GET["id"]);
	$smarty->assign('lstPreguntas', $lstPreguntas);


?>