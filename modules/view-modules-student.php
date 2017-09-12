<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(8);	

	 // echo "<pre>"; print_r($courseId);
	// exit;
	
	header("Location:".WEB_ROOT."/reinscripcion");
	exit;
	
	$module->setCourseModuleId($_GET["id"]);
	$myModule = $module->InfoCourseModule();
     $courseId=$myModule["courseId"];

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