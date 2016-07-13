<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(21);	
	/* End Session Control */
		
	if($_POST['accion'] == 'imprimir_reporte'){
		
		$report->setMajorId($_POST['majorId']);		
		$report->setSemesterId($_POST['semesterId']);
		$report->setGroupId($_POST['groupId']);
		$report->PrintPdfRedi();
				
	}//if
	
	$majors = $major->Enumerate();
	$semesters = $semester->Enumerate();
	$groups = $group->Enumerate();
	
	$smarty->assign('majors',$majors);			
	$smarty->assign('semesters', $semesters);
	$smarty->assign('groups', $groups);
	$smarty->assign('mnuMain','reportes');
		
?>