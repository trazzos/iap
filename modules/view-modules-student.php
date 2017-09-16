<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(8);	


	$empleados = $personal->Enumerate();
	$smarty->assign('empleados', $empleados);
	
	
		
	
	$module->setCourseModuleId($_GET["id"]);
	$myModule = $module->InfoCourseModule();
    $courseId=$myModule["courseId"];
	// echo "<pre>"; print_r($myModule);
	// exit;
	if($myModule['semesId']>1){
		$countIns = $module->compruebaInscripcion($myModule['semesId'],$_GET["id"],$myModule['subjectId']);
		
		// echo 	$countIns;
		// exit;
		if($countIns <= 0){
			header("Location:".WEB_ROOT."/reinscripcion/id/".$_GET["id"]."/s/".$myModule['subjectId']."&c=".$myModule['courseId']);
			exit;
		}
	}
	

	 $course->setCourseId($courseId);
	 $info= $course->Info();
	$modalidad=$info["modality"];
	
	$empleados = $personal->Enumerate();
	$smarty->assign('empleados', $empleados);
	
	$date = date("d-m-Y");
	$smarty->assign('date', $date);

	$smarty->assign('invoiceId', $_GET["id"]);
	$smarty->assign('myModule', $myModule);

	$majorModality = $activity->GetMajorModality();
	$smarty->assign('majorModality', $majorModality);

	$announcements = $announcement->Enumerate($myModule["courseId"], $myModule["courseModuleId"]);
	$smarty->assign('announcements', $announcements);

	$smarty->assign('id', $_GET["id"]);
	
	if($modalidad=="Local")
	$smarty->assign('mnuMain', "modulo1");
	else
	$smarty->assign('mnuMain', "modulo");
	
	$smarty->assign('mnuSubmain','anuncios');

?>