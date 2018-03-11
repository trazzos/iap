<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(8);	
	/* End Session Control */
	//check if docente, 2 == docente
	

	
	// $smarty->assign('subjects', $_GET['']);

	
	$course->setCourseId($_GET['id']);	
	$info = $course->Info();	
	
		// echo '<pre>'; print_r($info);	
	// exit;
	
	$smarty->assign('info',$info);
	$smarty->assign('id',$_GET['id']);
	$smarty->assign('mnuMain','cursos');
	$smarty->assign('mnuSubmain','historial');
?>