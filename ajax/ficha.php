<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	
	case "addStudent": 
			
			$resCode = $code->Enumerate();
			$codes = $util->EncodeResult($resCode);
			$smarty->assign('codes',$codes);	
			
			$resSem = $semester->Enumerate();
			$semesters = $util->EncodeResult($resSem);
			$smarty->assign('semesters',$semesters);
			
			$resGroup = $group->Enumerate();
			$groups = $util->EncodeResult($resGroup);
			$smarty->assign('groups',$groups);
			
			$resSchTypes = $schoolType->EnumerateAll();
			$schTypes = $util->EncodeResult($resSchTypes);
			$smarty->assign('schTypes',$schTypes);
						
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$resMajorList = $major->Enumerate();
			$majorList = $util->EncodeResult($resMajorList);
			$smarty->assign("majorList", $majorList);
			$smarty->display(DOC_ROOT.'/templates/boxes/add-student-popup.tpl');
			break;	
	
	case "editStudent":
			
			$resCode = $code->Enumerate();
			$codes = $util->EncodeResult($resCode);
			$smarty->assign('codes',$codes);			
			
			$resSem = $semester->Enumerate();
			$semesters = $util->EncodeResult($resSem);
			$smarty->assign('semesters',$semesters);
						
			$resMajorList = $major->Enumerate();
			$majorList = $util->EncodeResult($resMajorList);
			$smarty->assign("majorList", $majorList);
			
			$resSchTypes = $schoolType->EnumerateAll();
			$schTypes = $util->EncodeResult($resSchTypes);
			$smarty->assign('schTypes',$schTypes);
			
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$student->setUserId($_POST['id']);
			$result = $student->GetInfo();
			$info = $util->EncodeRow($result);
			
			$group->setSemesterId($info['semesterId']);
			$group->setMajorId($info['majorId']);
			$resGroup = $group->Search();
			$groups = $util->EncodeResult($resGroup);
			$smarty->assign('groups',$groups);
			
			$bd = explode('-',$info['birthdate']);
			$info['dayBirthdate'] = $bd[0];
			$info['monthBirthdate'] = $bd[1];
			$info['yearBirthdate'] = $bd[2];
			$smarty->assign("info", $info);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-student-popup.tpl');
			break;

	case "saveAddStudent":
			
			$status = $_POST['status'];
			
			$student->setNames($_POST['names']);
			$student->setLastNamePaterno($_POST['lastNamePaterno']);
			$student->setLastNameMaterno($_POST['lastNameMaterno']);
			$student->setControlNumber($_POST['controlNumber']);
			$student->setMajorId($_POST['majorId']);
			$student->setSemesterId($_POST['semesterId']);
			$student->setGroupId($_POST['groupId']);
			$student->setAverage($_POST['average']);
			$student->setBirthdate($_POST['day'],$_POST['month'],$_POST['year']);
			$student->setEmail($_POST['email']);
			$student->setPhone($_POST['phone']);
			$student->setPassword($_POST['password']);
			$student->setStatus($status);
						
			if($status == 'baja'){
				$student->setCodeId($_POST['codeId']);
				$cancelPeriodoId = $periodo->GetPeriodoActive();
				$student->setCancelPeriodoId($cancelPeriodoId);
			}else{
				$student->setCodeId(0);
				$student->setCancelPeriodoId(0);
			}
			
			$student->setStreet($_POST['street']);
			$student->setNumber($_POST['number']);
			$student->setColony($_POST['colony']);
			$student->setCity($_POST['city']);
			$student->setState($_POST['state']);
			$student->setCountry($_POST['country']);
			$student->setPostalCode($_POST['postalCode']);
			$student->setSexo($_POST['sexo']);
			$student->setCurp($_POST['curp']);
			$student->setCityBorn($_POST['cityBorn']);
			$student->setStateBorn($_POST['stateBorn']);
			$student->setCountryBorn($_POST['countryBorn']);
			$student->setMainMajor($_POST['mainMajor']);
			$student->setSecondMajor($_POST['secondMajor']);
			$student->setThirdMajor($_POST['thirdMajor']);
			$student->setMode($_POST['mode']);
			$student->setTutorNames($_POST['tutorNames']);
			$student->setTutorLastNamePaterno($_POST['tutorLastNamePaterno']);
			$student->setTutorLastNameMaterno($_POST['tutorLastNameMaterno']);
			$student->setTutorAddress($_POST['tutorAddress']);
			$student->setTutorPhone($_POST['tutorPhone']);
			$student->setPrevSchNames($_POST['prevSchNames']);
			$student->setPrevSchType($_POST['prevSchType']);
			$student->setPrevSchKey($_POST['prevSchKey']);
			$student->setPrevSchMode($_POST['prevSchMode']);
			$student->setPrevSchCity($_POST['prevSchCity']);
			$student->setPrevSchState($_POST['prevSchState']);
			$student->setPrevSchAverage($_POST['prevSchAverage']);
			$student->setPrevSchCertified($_POST['prevSchCertified']);
			
			if(!$student->Save())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo "[#]";				
				
				$arrPage = array();		
				$viewPage = 1;			
				$rowsPerPage = 30;		
				
				$pageVar = 'p';	
				
				if(isset($_GET["$pageVar"]))
					$viewPage = $_GET["$pageVar"];	
				
				$students = $student->EnumerateByPage($viewPage, $rowsPerPage, $pageVar, WEB_ROOT.'/student', $arrPage, ' semesterId ASC, ');
				$smarty->assign('students', $students);	
				$smarty->assign('arrPage', $arrPage);
				
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/student.tpl');
			}		
			break;
	
	case "saveEditFicha":	
						
			$student->setUserId($_POST['id']);
			
			$student->setMainMajor($_POST['mainMajor']);
			$student->setSecondMajor($_POST['secondMajor']);
			$student->setThirdMajor($_POST['thirdMajor']);
			$student->setMode($_POST['mode']);
			
			$student->setNames($_POST['names']);
			$student->setLastNamePaterno($_POST['lastNamePaterno']);
			$student->setLastNameMaterno($_POST['lastNameMaterno']);
			$student->setSexo($_POST['sexo']);
			$student->setBirthdate($_POST['day'],$_POST['month'],$_POST['year']);
			
			$student->setCityBorn($_POST['cityBorn']);
			$student->setStateBorn($_POST['stateBorn']);
			$student->setCountryBorn($_POST['countryBorn']);
									
			$student->setStreet($_POST['street']);
			$student->setNumber($_POST['number']);
			$student->setColony($_POST['colony']);
			$student->setCity($_POST['city']);
			$student->setState($_POST['state']);
			$student->setCountry($_POST['country']);
			$student->setPostalCode($_POST['postalCode']);
			$student->setPhone($_POST['phone']);
			$student->setCurp($_POST['curp']);
			
			$student->setTutorNames($_POST['tutorNames']);
			$student->setTutorLastNamePaterno($_POST['tutorLastNamePaterno']);
			$student->setTutorLastNameMaterno($_POST['tutorLastNameMaterno']);
			$student->setTutorAddress($_POST['tutorAddress']);
			$student->setTutorPhone($_POST['tutorPhone']);
			
			$student->setPrevSchNames($_POST['prevSchNames']);
			$student->setPrevSchType($_POST['prevSchType']);
			$student->setPrevSchKey($_POST['prevSchKey']);
			$student->setPrevSchMode($_POST['prevSchMode']);
			$student->setPrevSchCity($_POST['prevSchCity']);
			$student->setPrevSchState($_POST['prevSchState']);
			$student->setPrevSchAverage($_POST['prevSchAverage']);
			$student->setPrevSchCertified($_POST['prevSchCertified']);
			
			$student->setAverage($_POST['average']);
					
			if(!$student->UpdateFicha())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				
				$arrPage = array();		
				$viewPage = 1;			
				$rowsPerPage = 30;		
				
				$pageVar = 'p';	
				
				if(isset($_GET["$pageVar"]))
					$viewPage = $_GET["$pageVar"];	
				
				$fichas = $ficha->EnumerateByPage($viewPage, $rowsPerPage, $pageVar, WEB_ROOT.'/ficha', $arrPage, ' folioFicha ASC, ');
				$smarty->assign('fichas', $fichas);	
				$smarty->assign('arrPage', $arrPage);
				
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/ficha.tpl');
			}		
			break;
			
	case 'deleteStudent':
		
			$ficha->setUserId($_POST['id']);	
					
			if(!$ficha->Delete())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				
				$arrPage = array();		
				$viewPage = 1;			
				$rowsPerPage = 30;		
				
				$pageVar = 'p';	
				
				if(isset($_GET["$pageVar"]))
					$viewPage = $_GET["$pageVar"];	
				
				$fichas = $ficha->EnumerateByPage($viewPage, $rowsPerPage, $pageVar, WEB_ROOT.'/ficha', $arrPage, ' folioFicha ASC, ');
				if($fichas)
					$fichas = $util->EncodeResult($fichas);
				$smarty->assign('fichas', $fichas);	
				$smarty->assign('arrPage', $arrPage);
				
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/ficha.tpl');
			}
				
			break;
	
	case 'searchStudent':
			
			if($_POST['name'])
				$sqlSearch = ' AND names LIKE "%'.$_POST['name'].'%"';
			if($_POST['folio'])
				$sqlSearch .= ' AND folioFicha = "'.intval($_POST['folio']).'"';
			if($_POST['apPaterno'])
				$sqlSearch .= ' AND lastNamePaterno LIKE "%'.$_POST['apPaterno'].'%"';
			if($_POST['apMaterno'])
				$sqlSearch .= ' AND lastNameMaterno LIKE "%'.$_POST['apMaterno'].'%"';
			if($_POST['status'])
				$sqlSearch .= ' AND status = "'.$_POST['status'].'"';
							
			echo "ok[#]";
						
			$resStudents = $ficha->Enumerate(' folioFicha ASC, ', $sqlSearch);
			if($resStudents)
				$fichas = $util->EncodeResult($resStudents);
			$smarty->assign('fichas', $fichas);	
						
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/ficha.tpl');
					
		break;
	
	case 'changeStatus':
		
		$status = $_POST['status'];
				
		$user->setUserId($_POST['userId']);
		$user->setStatus($status);
		
		if($status == 'baja')
			$user->setCodeId(0);
		
		if(!$user->changeStatus())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
		}
		
		break;
	
	case 'doAccepted':
				
		if($_POST['checked'])
			$user->setType('student');
		else
			$user->setType('user');
				
		$user->setUserId($_POST['userId']);
						
		if(!$user->UpdateType())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo "[#]";
		}
		
		break;
	
	case 'activateFichas':
				
		$activate = $_POST['activate'];
		$ficha->setActivate($activate);
						
		if(!$ficha->UpdateActivate())
		{
			echo "fail[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo "[#]";
		}
		
		break;
	
	case 'LoadGroups':
		
		$semesterId = intval($_POST['semesterId']);
		$majorId = $_POST['majorId'];
		
		$group->setSemesterId($semesterId);
		$group->setMajorId($majorId);
		$result = $group->Search();
		
		echo 'ok[#]';
		
		$smarty->assign('groups',$result);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/lists/list-group.tpl');
				
		break;
	
	case "editFicha":
			
			$student->setUserId($_POST['id']);
			$result = $student->GetInfo();
			$info = $util->EncodeRow($result);
			
			$resMajorList = $major->Enumerate();
			$majorList = $util->EncodeResult($resMajorList);
			$smarty->assign("majorList", $majorList);
			
			$resSchTypes = $schoolType->EnumerateAll();
			$schTypes = $util->EncodeResult($resSchTypes);
			$smarty->assign('schTypes',$schTypes);
						
			$bd = explode('-',$info['birthdate']);
			$info['dayBirthdate'] = $bd[0];
			$info['monthBirthdate'] = $bd[1];
			$info['yearBirthdate'] = $bd[2];
			
			$smarty->assign("info", $info);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/boxes/edit-ficha-popup.tpl');
		
		break;

}

?>
