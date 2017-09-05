<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	

	

// echo "<pre>"; print_r($_POST);
	$user->setUserId($_SESSION['User']['userId']);// exit;
	$infoUser = $user->Info();// exit;
	// echo "<pre>"; print_r($info);
	
	$smarty->assign('id', $_GET["id"]);
	
	$module->setCourseModuleId($_GET["id"]);
	$info = $module->InfoCourseModule();
	
	$group->setCourseModuleId($_GET["id"]);
	$group->setCourseId($info["courseId"]);
	$noTeam = $group->actaCalificacion();
	$smarty->assign('noTeam', $noTeam);
	
	$numberTeams = $group->GetNumberOfTeams();
	$smarty->assign('numberTeams', $numberTeams);

	$teams = $group->Teams();
	$smarty->assign('infoUser', $infoUser);
	$smarty->assign('teams', $teams);

?>