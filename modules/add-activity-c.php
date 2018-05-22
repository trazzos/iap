<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	
	

	if($_GET['cId']){
		$infoAc = $activity->infoActivityConfig($_GET['id']);
	}
	
// echo "<pre>"; print_r($infoAc);
	// exit;
	// $activity->setCourseModuleId($_GET["id"]);
	// $actividades = $activity->Enumerate();
	$smarty->assign('actividad', $infoAc);
	$smarty->assign('courseModuleId', $_GET["id"]);
	

?>