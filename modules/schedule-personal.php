<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(12);	
	/* End Session Control */
	
	if(isset($_GET['imp']) && !empty($_GET['imp'])){
		$personalId = $_GET['imp'];
		
		$scheduleTime->print_pdf($personalId);
		
		exit;	
	}//if
		
	$personalId = intval($_GET['idper']);
	
	if($personalId == 0 && $User['positionId'] == 4){
		
		header('Location: '.WEB_ROOT.'/schedule-personal/idper/'.$User['userId']);
		exit;
		
	}//if
	
	$periodoId = $periodo->GetPeriodoActive();
	$scheduleTime->setPeriodoId($periodoId);
	$time = $scheduleTime->Enumerate();	
	
	if($personalId){
		$personal->setPersonalId($personalId);
		$name = $personal->GetNameById();
	}
	
	$personal->setPositionId(4);
	$personals = $personal->EnumerateByPosition();
	
	$subject->setPersonalId($personalId);
	$periodoId = $periodo->GetPeriodoActive();
	$subject->setPeriodoId($periodoId);
	$subjectGroups = $subject->EnumerateGroupByPersonal();
	
	foreach($subjectGroups as $row){
		
		$card = array();
		
		if($row['recursamiento'] == 0){
		
			$subgpoId = $row['subgpoId'];
			$subjectId = $row['subjectId'];
			
			$subject->setSubjectId($subjectId);
			$subjectName = $subject->GetNameById();
			$group = $row['clave'];
					
			$subject->setGroupId($subgpoId);
			$gpoTimes = $subject->EnumerateScheduleByGroup();
			foreach($gpoTimes as $val){
				$day = $val['day'];
				$schtimeId = $val['schtimeId'];
				
				$card["subject"] = $subjectName;
				$card["group"] = $group;			
				
				$assign[$schtimeId][$day] = $card;
						
			}//foreach
		
		}//if
					
	}//foreach
				
	$smarty->assign('personalId', $personalId);
	$smarty->assign('name', strtoupper($name));
	$smarty->assign('personals', $personals);
	$smarty->assign('info', $assign);
	$smarty->assign('time', $time);
	$smarty->assign('mnuMain','docentes');
	
?>