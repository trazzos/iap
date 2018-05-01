<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(8);	

	$module->setCourseModuleId($_GET["id"]);
	$myModule = $module->InfoCourseModule();
	$smarty->assign('myModule', $myModule);
	
	$forum->setCourseModuleId($myModule["courseModuleId"]);
	$forum->setCourseId($myModule["courseId"]);
	$forum = $forum->Enumerate();
	// echo "<pre>"; print_r($myModule);  
	// exit;
	$smarty->assign('forum', $forum);
	
	$smarty->assign('id', $_GET["id"]);
	
	$smarty->assign('mnuMain', "modulo");
	$smarty->assign('mnuSubmain','foro');

?>