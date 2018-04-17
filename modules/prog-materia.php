<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(8);	
	/* End Session Control */
	//check if docente, 2 == docente
	
	

	$result = $course->getMateriaxCourse($_GET['m']);
	
	// echo '<pre>'; print_r($result);
	// exit;
	
	$smarty->assign('result', $result);

	// -------------------------------------------------------------------------------------------------
	
	$smarty->assign('mnuMain','cursos');
	$smarty->assign('mnuSubmain','historial');
?>