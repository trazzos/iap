<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	$countSol = $solicitud->cursoActivo();
	$lstSemestres = $solicitud->semestresxSubject($countSol[0]['subjectId'],$countSol[0]['courseId']);
	// echo $countSol[0]['courseId'];
	// exit;
	// echo '<pre>'; print_r($lstSemestres);
	// exit;
	$smarty->assign('userId', $_SESSION['User']['userId']);
	$smarty->assign('courseId', $countSol[0]['courseId']);
	$smarty->assign('subjectId', $countSol[0]['subjectId']);
	$smarty->assign('lstSemestres', $lstSemestres);
	

?>