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
        $util->LoadPage('index_new.php?page=edit-modules-course&id='.$_POST['subjectModuleId']);
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
	
	$activity->setCourseModuleId($_GET["id"]);
	$actividades = $activity->enumerateActivityModule();
	$resources = $resource->enumerateResource($_GET["id"]);
	$smarty->assign('subject', $mySubject);

	$smarty->assign('resources',$resources);
	$smarty->assign('actividades',$actividades);
	$smarty->assign('mnuMain','cursos');
	$smarty->assign('mnuMain','cursos');
	$smarty->assign('courseModuleId',$_GET['id']);
	$smarty->assign('configMateria','si');

	//$smarty->assign('major',$major->Enumerate());	
?>