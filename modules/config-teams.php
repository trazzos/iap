<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	

	if($_GET["delete"] > 0)
	{
		$group->setCourseModuleId($_GET["id"]);
		$group->DeleteTeam($_GET["delete"]);
        $util->LoadPage('edit-modules-course', "/id/".$_GET["id"]);
    }

	if($_POST)
	{
		$module->setCourseModuleId($_GET["id"]);
		$info = $module->InfoCourseModule();
		
		$group->setCourseModuleId($_GET["id"]);
		$group->setCourseId($info["courseId"]);
		$group->CreateTeam($_POST["inTeam"]);
		
		if($_POST["auxTpl"]=="admin"){
			header("Location:".WEB_ROOT."/edit-modules-course/id/".$_GET["id"]);
			exit;
		}
		
	}

	$smarty->assign('id', $_GET["id"]);
	
	$module->setCourseModuleId($_GET["id"]);
	$info = $module->InfoCourseModule();
	
	$group->setCourseModuleId($_GET["id"]);
	$group->setCourseId($info["courseId"]);
	$noTeam = $group->NoTeam();
	$smarty->assign('noTeam', $noTeam);
	
	$numberTeams = $group->GetNumberOfTeams();
	$smarty->assign('numberTeams', $numberTeams);

	$group->setCourseModuleId($_GET["id"]);
	$teams = $group->TeamsModule();
	$smarty->assign('teams', $teams);

?>