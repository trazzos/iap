<?php
		
		// echo '<pre>'; print_r($_GET);
	// exit;	
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	/* End Session Control */
	
	$module->setCourseModuleId($_GET['id']);
	$myModule = $module->InfoCourseModule();
	
	// echo '<pre>'; print_r($myModule);
	// exit;
// exit;
	$smarty->assign('id', $_GET['id']);
	$smarty->assign('personalId', $_GET['personalId']);
	$smarty->assign('myModule', $myModule);
	
?>