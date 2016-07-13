<?php
	
	/* For Session Control - Don't remove this */
//	$user->allow_access(29);	
	/* End Session Control */
	if($_POST['accion'] == 'export'){
		$courseId = $_POST['courseId'];
		$modality = $_POST['modality'];
			
		        //if($modality==0)
				header('Location: '.WEB_ROOT.'/reportes/historial.php?courseId='.$courseId.'&modality='.$modality);
		exit;
			
	}
		
	$courses = $course->EnumerateAll();					
	$smarty->assign('courses', $courses);
	$smarty->assign('mnuMain','reportes');
			
?>