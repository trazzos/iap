<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	

		
		// echo '<pre>'; print_r($_GET);
		// exit;
		$student->setUserId($_SESSION["User"]["userId"]);
		$activeCourses = $student->StudentCourses("activo", "si");
		$finishedCourses = $student->StudentCourses("finalizado");

		$smarty->assign("solicitudjjId", $_GET['id']);
		$smarty->assign("soljId", $_GET['soljId']);
		$smarty->assign("finishedCourses", $finishedCourses);
		$smarty->assign("activeCourses", $activeCourses);
?>