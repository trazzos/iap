<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access();	
	/* End Session Control */
	
	if(isset($_GET['imp']) && !empty($_GET['imp'])){
		$subjectId = $_GET['imp'];
		
		$scheduleTime->print_pdf_subject($subjectId);
		
		exit;	
	}//if
		
	$subjectId = intval($_GET['idsub']);
	
	$periodoId = $periodo->GetPeriodoActive();
	$scheduleTime->setPeriodoId($periodoId);
	$time = $scheduleTime->Enumerate();	
		
	$subjects = $subject->Enumerate();
	
	$subject->setSubjectId($subjectId);
	$subject->setPeriodoId($periodoId);
	$subjectGroups = $subject->EnumerateGroup();
	
	foreach($subjectGroups as $row){
		
		$card = array();
		
		$subgpoId = $row['subgpoId'];
		$personalId = $row['personalId'];
		
		$personal->setPersonalId($personalId);
		$personalName = $personal->GetNameById();
		$salon = $row['salon'];
				
		$subject->setGroupId($subgpoId);
		$gpoTimes = $subject->EnumerateScheduleByGroup();
		foreach($gpoTimes as $val){
			$day = $val['day'];
			$schtimeId = $val['schtimeId'];
			
			$card["personal"] = $personalName;
			$card["salon"] = 'Salon X';			
			
			$assign[$subgpoId][$schtimeId][$day] = $card;
					
		}
					
	}
	
	$smarty->assign('groups',$subjectGroups);			
	$smarty->assign('subjectId', $subjectId);
	$smarty->assign('name', $name);
	$smarty->assign('subjects', $subjects);
	$smarty->assign('info', $assign);
	$smarty->assign('time', $time);
	
?>