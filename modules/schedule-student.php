<?php
	
	/* For Session Control - Don't remove this */
	//$user->allow_access(18);	
	/* End Session Control */
	
	if(!$User['isLogged']){
		header('Location: '.WEB_ROOT.'/login');
		exit;
	}
				
	if(isset($_GET['imp']) && !empty($_GET['imp'])){
		$userId = $_GET['imp'];
		
		if($schV1){
			$user->setUserId($userId);
			$infU = $user->InfoUser();
		
			$scheduleGroup->setMajorId($infU['majorId']);
			$scheduleGroup->setSemesterId($infU['semesterId']);
			$scheduleGroup->setGroupId($infU['groupId']);
			$schGpoId = $scheduleGroup->GetSchGpoIdByIds();
			
			$scheduleGroup->setUserId($userId);
			$scheduleGroup->print_schedule($schGpoId);			
		}else
			$user->print_schedule($userId);
		
		exit;	
	}//if
	
	$User = $_SESSION['User'];
		
	$periodoId = $periodo->GetPeriodoActive();
	
	$scheduleTime->setPeriodoId($periodoId);
	$time = $scheduleTime->Enumerate();	
	
	$userId = $User['studentId'];
	$user->setUserId($userId);
	
	$name = $user->GetNameById();
	
	$user->setPeriodoId($periodoId);
	$registrationId = $user->GetCurrentRegistrationId();
	
	$schedule = array();
	
	if($schV1){
		
		$infU = $user->InfoUser();
		
		$scheduleGroup->setMajorId($infU['majorId']);
		$scheduleGroup->setSemesterId($infU['semesterId']);
		$scheduleGroup->setGroupId($infU['groupId']);
		$schGpoId = $scheduleGroup->GetSchGpoIdByIds();
		
		$scheduleGroup->setScheduleGroupId($schGpoId);
		$schedule = $scheduleGroup->GetScheduleBySchGpoId();
		
		$user->setPeriodoId($periodoId);
		$registrationId = $user->GetCurrentRegistrationIdV1();
		
		if($registrationId)
			$confirmated = true;
		
	}else{
	
		if($registrationId){
		
			$user->setRegistrationId($registrationId);
			$schedule = $user->GetScheduleByRegistration();
			
			$confirmated = true;
		
		}else{
		
			if(!isset($_SESSION['basket']))	
				$_SESSION['basket'] = new Basket;
			
			$basket = $_SESSION['basket'];			
						
			$subgpos = $basket->GetItems();
			
			foreach($subgpos as $key => $res){
				$schedule[$key]['subgpoId'] = $res[0];
			}
			
			$confirmated = false;
		
		}//else
	
	}
	
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
	
	$smarty->assign('schGpoId',$schGpoId);
	$smarty->assign('userId',$userId);
	$smarty->assign('name', $name);	
	$smarty->assign('info', $assign);
	$smarty->assign('time', $time);
	$smarty->assign('confirmated',$confirmated);
	
?>