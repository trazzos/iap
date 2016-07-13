<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(8);	

	$date = date("d-m-Y");
	$smarty->assign('date', $date);

	$activity->setActivityId($_GET["id"]);
	$actividad = $activity->Info();
	$smarty->assign('actividad', $actividad);
	
	$activity->setCourseModuleId($actividad["courseModuleId"]);
	$actividades = $activity->Enumerate();
	$smarty->assign('actividades', $actividades);
	

?>