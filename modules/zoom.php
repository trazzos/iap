<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	// echo "<pre>"; print_r($_POST);
	// exit;

	$date = date("d-m-Y");
	$smarty->assign('date', $date);
	$smarty->assign('id', $_GET["id"]);

	$activity->setCourseModuleId($_GET["id"]);
	$actividades = $activity->Enumerate();
	$smarty->assign('actividades', $actividades);
	

?>