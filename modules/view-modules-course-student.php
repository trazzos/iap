<?php
		
	/* For Session Control - Don't remove this */
	//$user->allow_access(8);	
	
	
	$course->setCourseId($_GET["id"]);
	
	$date = date("d-m-Y");
	$infoCourses = $course->Info();
	$addedModules = $course->StudentCourseModules();
	
	// echo "<pre>"; print_r($addedModules );
	// exit;
	$smarty->assign('infoCourses', $infoCourses);
	$smarty->assign('date', $date);
	$smarty->assign('invoiceId', $_GET["id"]);
	$smarty->assign('subjects', $addedModules);

?>