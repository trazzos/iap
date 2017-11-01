<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	$infoSol = $solicitud->Info($_GET['id']);
	// $lstSemestres = $solicitud->semestresxSubject($countSol[0]['subjectId']);
	// echo $countSol[0]['courseId'];
	// exit;
	// echo '<pre>'; print_r($infoSol);
	// exit;
	// $smarty->assign('userId', $_SESSION['User']['userId']);
	// $smarty->assign('courseId', $countSol[0]['courseId']);
	// $smarty->assign('subjectId', $countSol[0]['subjectId']);
	// $smarty->assign('lstSemestres', $lstSemestres);
	$smarty->assign('infoSol', $infoSol);
	$smarty->assign('id', $_GET['id']);
	

?>