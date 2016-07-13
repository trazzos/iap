<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	/* End Session Control */
	
	if($_POST)
	{
		$module->setSubjectModuleId($_GET['id']);
		$module->setSubjectId($_POST['subjectId']);
		$module->setClave(strtoupper($_POST['frmClave']));
		$module->setName(strtoupper($_POST['frmName']));
		$module->setWelcomeText($_POST['welcomeText']);
		$module->setIntroduction($_POST['introduction']);
		$module->setIntentions($_POST['intentions']);
		$module->setObjectives($_POST['objectives']);
		$module->setThemes($_POST['themes']);
		$module->setScheme($_POST['scheme']);
		$module->setMethodology($_POST['methodology']);
		$module->setPolitics($_POST['politics']);
		$module->setEvaluation($_POST['evaluation']);
		$module->setBibliography($_POST['bibliography']);
		$module->setSemesterId($_POST['semesterId']);
		
		$module->Update();
	}

	$module->setSubjectModuleId($_GET['id']);
	$myModule = $module->Info();
	$smarty->assign('post', $myModule);

	//checar a que curriculas tengo permiso
	if(in_array(2, $info["roles"]))
	{
		$smarty->assign('docente', 1);
		$permisosDocente = $user->PermisosDocente();
		if(!in_array($myModule["subjectModuleId"], $permisosDocente["subjectModule"]))
		{
			header("Location: ".WEB_ROOT);
		}
	}
	
	$subject->setSubjectId($myModule["subjectId"]);
	$mySubject = $subject->Info();
	$smarty->assign('subject', $mySubject);

	$smarty->assign('mnuMain','cursos');
	$smarty->assign('courseId',$_GET["course"]);

	//$smarty->assign('major',$major->Enumerate());	
?>