<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(8);	
	/* End Session Control */
	//check if docente, 2 == docente
	
	

	// $result = $course->getMateriaxCourse($_GET['m']);
	
	// echo '<pre>'; print_r($_GET);
	// exit;
	
	$smarty->assign('id', $_GET['id']);
	$smarty->assign('cmId', $_GET['cmId']);
	$smarty->assign('result', $result);

	// -------------------------------------------------------------------------------------------------
	
	$smarty->assign('mnuMain','cursos');
	$smarty->assign('mnuSubmain','historial');
?>