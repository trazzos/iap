<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	

	if($_POST)
	{
		$activity->setActivityId($_GET["id"]);
		$activity->setActivityType($_POST["activityType"]);

		$activity->setInitialDate($_POST["initialDate"]);
		$activity->setFinalDate($_POST["finalDate"]);

		$activity->setModality($_POST["modality"]);
		$activity->setResumen($_POST["resumen"]);
		$activity->setDescription($_POST["description"]);
		$activity->setRequiredActivity($_POST["requiredActivity"]);
		$activity->setPonderation($_POST["ponderation"]);
		$activity->Edit();
	}

	$date = date("d-m-Y");
	$smarty->assign('date', $date);

	$activity->setActivityId($_GET["id"]);
	$smarty->assign('id', $_GET["id"]);
	$actividad = $activity->Info();
	$smarty->assign('actividad', $actividad);
	
	$activity->setCourseModuleId($actividad["courseModuleId"]);
	$actividades = $activity->Enumerate();
	$smarty->assign('actividades', $actividades);
	

?>