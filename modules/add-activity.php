<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	
	// echo "<pre>"; print_r($_POST);
	// exit;

	if($_POST)
	{
		$activity->setCourseModuleId($_GET["id"]);
		$activity->setActivityType($_POST["activityType"]);

		$activity->setInitialDate($_POST["initialDate"]);
		$activity->setFinalDate($_POST["finalDate"]);

		$activity->setModality($_POST["modality"]);
		$activity->setResumen($_POST["resumen"]);
		$activity->setDescription($_POST["description"]);
		$activity->setRequiredActivity($_POST["requiredActivity"]);
		$activity->setPonderation($_POST["ponderation"]);
		$activity->setHoraInicial($_POST["horaInicial"]);
		$activity->Save();
		
		if($_POST["auxTpl"]=="admin"){
			header("Location:".WEB_ROOT."/edit-modules-course/id/".$_POST["id"]."");
			exit;
		}
		
	}

	$date = date("d-m-Y");
	$smarty->assign('date', $date);
	$smarty->assign('id', $_GET["id"]);

	$activity->setCourseModuleId($_GET["id"]);
	$actividades = $activity->Enumerate();
	$smarty->assign('actividades', $actividades);
	

?>