<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "addScheduleGroup": 
		
		$_SESSION['basket'] = new Basket;
		
		$resSem = $semester->Enumerate();
		$semesters = $util->EncodeResult($resSem);
		$smarty->assign('semesters',$semesters);
		
		$schGpoId = $_SESSION['vSchGpoId'];
		$scheduleGroup->setScheduleGroupId($schGpoId);
		$resSub = $scheduleGroup->LoadSubgposSchedule();
		
		$subjects = $util->EncodeResult($resSub);
		$smarty->assign('subjects', $subjects);
		
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-schedule-group-popup.tpl');
		
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
		
		$scheduleGroup->SetSubgpoId($subgpoId);		
		$val = $scheduleGroup->AddSubjectSchedule();
		
		if($val == 'ok'){
			$subject->SetGroupId($subgpoId);
			$info = $subject->InfoGroup();
			
			$subject->SetSubjectId($info['subjectId']);
			$subjectName = $subject->GetNameById();
			
			echo 'ok[#]';
			echo utf8_encode($subjectName);
		}elseif($val == 'exist'){
			echo 'fail[#]';
		/*			
		}elseif($val == 'limit'){
			echo 'limit[#]';
		*/
		}elseif($val == 'duplicated'){
			echo 'duplicated[#]';
		}
										
		break;
	
	case 'delSubject':
		
		$subgpoId = $_POST['subgpoId'];
		
		$scheduleGroup->SetSubgpoId($subgpoId);
		$scheduleGroup->DelSubjectSchedule();
		
		break;
	
	case 'saveAddSchedule':
		
		$schGpoId = $_SESSION['vSchGpoId'];
		$scheduleGroup->setScheduleGroupId($schGpoId);
		
		if(!$scheduleGroup->SaveScheduleBd())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
						
			$scheduleGroupId = $schGpoId;
			$scheduleGroup->setScheduleGroupId($scheduleGroupId);
			
			$periodoId = $periodo->GetPeriodoActive();			
			
			//$scheduleGroup->setPeriodoId($periodoId);
			//$registrationId = $scheduleGroup->GetCurrentRegistrationId();
			
			//Obtenemos el machote de horario			
			$scheduleTime->setPeriodoId($periodoId);
			$time = $scheduleTime->Enumerate();	
			
			$scheduleGroup->setScheduleGroupId($scheduleGroupId);
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
					$card['subject'] = utf8_encode($subject->GetNameById());
					$card['group'] = $inf['clave'];
					$card['classRoom'] = $classRoomName;
					
					$assign[$schtimeId][$day] = $card;
				}//foreach
			
			}//foreach
			
			$smarty->assign('time', $time);
			$smarty->assign('info', $assign);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/schedule-group.tpl');
		}
	
		break;
	
	case 'deleteSchedule':
	
			$scheduleGroupId = $_SESSION['vSchGpoId'];
			$scheduleGroup->setScheduleGroupId($scheduleGroupId);
			
			$periodoId = $periodo->GetPeriodoActive();
			
			$scheduleTime->setPeriodoId($periodoId);
			$time = $scheduleTime->Enumerate();	
									
			if(!$scheduleGroup->DeleteScheduleById()){
				
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			
			}else{
				
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo "[#]";	
				$smarty->assign('time', $time);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/schedule-group.tpl');		
			}
			
		break;
			
}

?>