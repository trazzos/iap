<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access();	
	/* End Session Control */
		
	if($_POST['accion'] == 'export'){
		
		$semesterId = $_POST['semesterId'];
		$parcial = $_POST['parcial'];
			
		header('Location: '.WEB_ROOT.'/reports/excel/historial.php?semId='.$semesterId.'&parcial='.$parcial);
		exit;
			
	}
	
	$semesters = $semester->Enumerate();
	
	$smarty->assign('semesters',$semesters);
	$smarty->assign('mnuMain','reportes');
		
?>