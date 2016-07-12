<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addScheduleStudent": 
		
		$_SESSION['basket'] = new Basket;
				
		$resSem = $semester->Enumerate();
		$semesters = $util->EncodeResult($resSem);
		$smarty->assign('semesters',$semesters);
		
		$periodoId = $periodo->GetPeriodoActive();
		$user->setPeriodoId($periodoId);
		
		$User = $_SESSION['User'];
		$user->setUserId($User['userId']);
		
		if($user->GetCurrentRegistrationId()){
			$resSub = $user->LoadSubgposScheduleBd();				
			$subjects = $util->EncodeResult($resSub);
		}
		
		$smarty->assign('subjects', $subjects);		
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-schedule-student-popup.tpl');
								
		break;
	
	case 'loadSubjects':
		
		$semesterId =  $_POST['semesterId'];
		$specialityId =  $_POST['specialityId'];
		
		$subject->setSemesterId($semesterId);
		
		if($specialityId){
			$subject->setSpecialityId($specialityId);
			$resSub = $subject->EnumerateBySpeciality();
		}else{			
			$resSub = $subject->EnumerateBySemester();
		}
		$subjects = $util->EncodeResult($resSub);
		$smarty->assign('subjects',$subjects);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/lists/list-subject-schedule.tpl');
		
		break;
	
	case 'loadSpecialities':					
	
		$resSpecs = $speciality->Enumerate();
		$specialities = $util->EncodeResult($resSpecs);
		$smarty->assign('specialities',$specialities);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/lists/list-speciality-schedule.tpl');
		
		break;
	
	case 'loadGroups':
		
		$subjectId =  $_POST['subjectId'];
		
		$subject->setSubjectId($subjectId);
		$periodoId = $periodo->GetPeriodoActive();
		$subject->setPeriodoId($periodoId);
		$resGpo = $subject->EnumerateGroups();
		$groups = $util->EncodeResult($resGpo);
		$smarty->assign('groups',$groups);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/lists/list-group-schedule.tpl');
		
		break;

	case 'loadDetails':	
		
		$subgpoId = $_POST['subgpoId'];
		
		$subject->setGroupId($subgpoId);
		$info = $subject->InfoGroup();
				
		$personal->setPersonalId($info['personalId']);
		$personalName = $personal->GetNameById();
		
		$classroom->setClassroomId($info['classroomId']);
		$classRoomName = $classroom->GetNameById();
		
		echo utf8_encode($personalName);
		echo "[#]";
		echo $classRoomName;
		
		break;
	
	case 'addSubject':
		
		$subgpoId = $_POST['subgpoId'];
		
		$user->SetSubgpoId($subgpoId);		
		$val = $user->AddSubjectSchedule();
		
		if($val == 'ok'){		
			$subject->SetGroupId($subgpoId);
			$info = $subject->InfoGroup();
			
			$subject->SetSubjectId($info['subjectId']);
			$subjectName = $subject->GetNameById();
			
			echo 'ok[#]';
			echo utf8_encode($subjectName);
		}elseif($val == 'exist'){
			echo 'fail[#]';		
		}elseif($val == 'limit'){
			echo 'limit[#]';
		}elseif($val == 'duplicated'){
			echo 'duplicated[#]';
		}
										
		break;
	
	case 'delSubject':
		
		$subgpoId = $_POST['subgpoId'];
		
		$user->SetSubgpoId($subgpoId);
		$user->DelSubjectSchedule();
		
		break;
	
	case 'saveAddSchedule':
		
		if(!$user->SaveScheduleBd())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			
			$User = $_SESSION['User'];
			
			$userId = $User['studentId'];
			$user->setUserId($userId);
			
			$periodoId = $periodo->GetPeriodoActive();			
			
			$user->setPeriodoId($periodoId);
			$registrationId = $user->GetCurrentRegistrationId();
						
			$scheduleTime->setPeriodoId($periodoId);
			$time = $scheduleTime->Enumerate();	
			
			$user->setRegistrationId($registrationId);
			$schedule = $user->GetScheduleByRegistration();
	
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
					$card['subject'] = utf8_encode($subject->GetNameById());
					$card['group'] = $inf['clave'];
					$card['classRoom'] = $classRoomName;
					
					$assign[$schtimeId][$day] = $card;
				}//foreach
			
			}//foreach
			
			$smarty->assign('time', $time);
			$smarty->assign('info', $assign);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule-student.tpl');
		}
	
		break;
	
	/*
	case 'saveAddSchedule':
		
		if(!$user->SaveSchedule())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
			
			if(!isset($_SESSION['basket']))	
				$_SESSION['basket'] = new Basket;
			
			$basket = $_SESSION['basket'];
			
			$periodoId = $periodo->GetPeriodoActive();
			$scheduleTime->setPeriodoId($periodoId);
			$time = $scheduleTime->Enumerate();	
			
			$subgpos = $basket->GetItems();
	
			foreach($subgpos as $res){
			
				$subject->setGroupId($res[0]);
				$schGroup = $subject->EnumerateScheduleByGroup();
				
				foreach($schGroup as $val){
					$day = $val['day'];
					$schtimeId = $val['schtimeId'];
					
					$subject->setGroupId($res[0]);
					$inf = $subject->InfoGroup();
					
					$classroom->setClassroomId($inf['classroomId']);
					$classRoomName = $classroom->GetNameById();
								
					$subject->setSubjectId($inf['subjectId']);
					$card['subject'] = utf8_encode($subject->GetNameById());
					$card['group'] = $inf['clave'];
					$card['classRoom'] = $classRoomName;
					
					$assign[$schtimeId][$day] = $card;
				}//foreach
			
			}//foreach	
			
			$smarty->assign('time', $time);
			$smarty->assign('info', $assign);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule-student.tpl');
		}
	
		break;
	*/
	
		
	case 'confirmSchedule':
		
		if(!$user->ConfirmSchedule())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		
		}
						
		break;
	
	case 'confirmScheduleV1':
		
		$user->setUserId($_POST['userId']);
		$user->setSchGpoId($_POST['schGpoId']);
		
		if(!$user->ConfirmScheduleV1())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		
		}
						
		break;
	
}

?>