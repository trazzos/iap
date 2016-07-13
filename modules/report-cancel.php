<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(25);	
	/* End Session Control */
		
	if($_POST['accion'] == 'imprimir_baja'){
		
		$semsId = $_POST['semesters'];
		$groupId = $_POST['groupId'];
				
		$report->setSemsId($semsId);		
		$report->setGroupId($groupId);
		
		$report->PrintPdfBaja();
				
	}elseif($_POST['accion'] == 'imprimir_reprobacion'){
		
		$semesterId = $_POST['semesterId'];
						
		$report->setSemesterId($semesterId);
				
		$report->PrintPdfBajaRep();
				
	}//if
	
	$semesters = $semester->Enumerate();
	$groups = $group->Enumerate();
				
	$smarty->assign('semesters', $semesters);
	$smarty->assign('groups', $groups);
	$smarty->assign('mnuMain','reportes');
			
?>