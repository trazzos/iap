<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(29);	
	/* End Session Control */
		
	if($_POST['accion'] == 'imprimir_reporte'){
		
		$semesterId = $_POST['semesterId'];
		$noControl = $_POST['noControl'];
		
		$student->setControlNumber($noControl);
		$userId = $student->GetStdIdByControlNo();
		
		$report->setUserId($userId);
		$report->setSemesterId($semesterId);		
				
		$report->PrintPdfBoleta();
				
	}elseif($_POST['accion'] == 'imprimir_reporte_hist'){
		
		$semesterId = $_POST['semesterId2'];
		$noControl = $_POST['noControl2'];
		
		$student->setControlNumber($noControl);
		$userId = $student->GetStdIdByControlNo();
		
		$report->setUserId($userId);
		$report->setSemesterId($semesterId);		
				
		$report->PrintPdfBoletaHist();
				
	}elseif($_POST['accion'] == 'imprimir_reporte_const'){
		
		$noControl = $_POST['noControl3'];
		
		$student->setControlNumber($noControl);
		$userId = $student->GetStdIdByControlNo();
		
		$student->setUserId($userId);
		$semesterId = $student->_GetSemesterId();
		
		$report->setSemesterId($semesterId);
		$report->setUserId($userId);
						
		$report->PrintPdfBoletaConst();
	
	}elseif($_POST['accion'] == 'imprimir_reporte_parcial'){
		
		$semesterId = $_POST['semesterId4'];
		$noControl = $_POST['noControl4'];
		
		$student->setControlNumber($noControl);
		$userId = $student->GetStdIdByControlNo();
				
		$report->setSemesterId($semesterId);
		$report->setUserId($userId);
						
		$report->PrintPdfBoletaParcial();
				
	}
	
	$semesters = $semester->Enumerate();					
	$smarty->assign('semesters', $semesters);
	$smarty->assign('mnuMain','reportes');
			
?>