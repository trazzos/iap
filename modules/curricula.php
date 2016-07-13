<?php

	/* For Session Control - Don't remove this */
	//$user->allow_access(32);	
	/* End Session Control */
	$student->setUserId($_SESSION["User"]["userId"]);
	$activeCourses = $student->StudentCourses("activo", "si");
	$smarty->assign("activeCourses", $activeCourses);	

	$inactiveCourses = $student->StudentCourses("inactivo", "si");
	$smarty->assign("inactiveCourses", $inactiveCourses);	

	$finishedCourses = $student->StudentCourses("finalizado");
	$smarty->assign("finishedCourses", $finishedCourses);	
	
?>