<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	$module->setCourseModuleId($_GET["id"]);
	$myModule = $module->InfoCourseModule();
	
	// echo '<pre>'; print_r($myModule);
	// exit;
	
	$lstPreguntas = $encuesta->extraeCuestionario();
	
	$personal->setPersonalId($myModule["access"][1]);
	$docente = $personal->Info();
	
	// echo '<pre>'; print_r($docente);
	// exit;

	$smarty->assign('docente', $docente);
	$smarty->assign('myModule', $myModule);
	$smarty->assign('lstPreguntas', $lstPreguntas);
	

?>