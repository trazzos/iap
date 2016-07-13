<?php
	
	/* For Session Control - Don't remove this */
	//$user->allow_access(18);	
	/* End Session Control */
	
	session_start();
	
	if(!$User['isLogged']){
		header('Location: '.WEB_ROOT.'/login');
		exit;
	}
	
	if(isset($_GET['imp']) && !empty($_GET['imp'])){
		$schGpoId = $_GET['imp'];
		
		$scheduleGroup->print_schedule($schGpoId);
		
		exit;	
	}//if
	
	if(isset($_GET['schGpoId']) && !empty($_GET['schGpoId'])){
		$schGpoId = $_GET['schGpoId'];
		$_SESSION['vSchGpoId'] = $schGpoId;
	}else{
		header('Location: '.WEB_ROOT.'/schedule-groups');
		exit;
	}
			
	//Obtenemos el machote de horario	
	$periodoId = $periodo->GetPeriodoActive();	
	$scheduleTime->setPeriodoId($periodoId);
	$time = $scheduleTime->Enumerate();	
	
	//Obtenemos la info del grupo
	$scheduleGroup->setScheduleGroupId($schGpoId);
	$infG = $scheduleGroup->Info();
	
	$major->setMajorId($infG['majorId']);
	$infG['major'] = $major->GetNameById();
	
	$semester->setSemesterId($infG['semesterId']);
	$infG['semester'] = $semester->GetNameById();
	
	$group->setGroupId($infG['groupId']);
	$infG['group'] = $group->GetNameById();
	
	//Obtenemos el horario del grupo
	$schedule = array();
	
	$scheduleGroup->setScheduleGroupId($schGpoId);
	$schedule = $scheduleGroup->GetScheduleBySchGpoId();
			
	foreach($schedule as $res){
		
		$subgpoId = $res['subgpoId'];
		
		$subject->setGroupId($subgpoId);
		$schGroup = $subject->EnumerateScheduleByGroup();
		
		foreach($schGroup as $val){
			$day = $val['day'];
			$schtimeId = $val['schtimeId'];
			
			$subject->setGroupId($subgpoId);
			$inf = $subject->InfoGroup();
			
			$classroom->setClassroomId($inf['classroomId']);
			$classRoomName = $classroom->GetNameById();
						
			$subject->setSubjectId($inf['subjectId']);
			$card['subject'] = $subject->GetNameById();
			$card['group'] = $inf['clave'];
			$card['classRoom'] = $classRoomName;
			
			$assign[$schtimeId][$day] = $card;
		}//foreach
	
	}//foreach		
		
	$smarty->assign('infG', $infG);
	$smarty->assign('info', $assign);
	$smarty->assign('time', $time);
		
?>