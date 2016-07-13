<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(26);	
	/* End Session Control */
		
	if($_POST['accion'] == 'imprimir_regulares'){
		
		$semesterId = $_POST['semesterId'];
				
		$report->setSemesterId($semesterId);		
				
		$report->PrintPdfRegular();
		
	}//if
	
	$semesters = $semester->Enumerate();
					
	$smarty->assign('semesters', $semesters);
	$smarty->assign('mnuMain','reportes');
				
?>