<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(19);	
	/* End Session Control */
		
	if($_POST['action'] == 'searchSubjects'){
		
		$semesterId = $_POST['semesterId'];		
		$noControl = $_POST['noControl'];	
		$majorId = $_POST['majorId'];
		
		//Obtenemos el userId de acuerdo al No. de Control		
		$student->setControlNumber($noControl);
		$userId = $student->GetStdIdByControlNo();
				
		//Obtenemos el nombre del alumno
		$user->setUserId($userId);
		$nombre = $user->GetNameById();
		
		//Obtenemos el nombre del semestre
		$semester->setSemesterId($semesterId);		
		$semestre = $semester->GetNameById();
		
		//Checamos si existe ya un kardex con el userId y el semestre
		//Si existe cargamos el kardex con la carrera que tiene dicho kardex
		$student->setUserId($userId);
		$student->setSemesterId($semesterId);
		$idMajor = $student->SearchKardexByUserIdAndSemesterId();
		
		if($idMajor)
			$majorId = $idMajor;
		
		//Obtenemos el nombre de la carrera
		$major->setMajorId($majorId);
		$carrera = $major->GetNameById();
		
		//Agropecuario
		if($majorId == 1) $specialityId = 15;
		//Desarrollo Comunitario
		elseif($majorId == 2) $specialityId = 18;
		//Agronegocios
		elseif($majorId == 5) $specialityId = 16;
		//Informatica 
		elseif($majorId == 6) $specialityId = 17;
		//Agroindustrias
		elseif($majorId == 7) $specialityId = 19;
				
		//Obtenemos los tipos de calificaciones
		$typeCalifs = $typeCalif->Enumerate();
		
		//Obtenemos las materias de acuerdo al semestre
		$subject->setSemesterId($semesterId);
		$resSubjects = $subject->EnumerateBySemester();
		
		$subjects = array();
		foreach($resSubjects as $key => $val){
			
			$card = $val;
			
			$subject->setSubjectId($val['subjectId']);
			$idSpeciality = $subject->GetIdSpeciality();
			
			if($idSpeciality >= 15 && $idSpeciality <= 19){
				
				if($idSpeciality == $specialityId)
					$subjects[$key] = $card;
				
			}else			
				$subjects[$key] = $card;
			
		}
		
		//Obtenemos los periodos
		$periodos = $periodo->Enumerate();
		
		//Obtenemos las calificaciones ya guardadas
		$student->setUserId($userId);
		$student->setMajorId($majorId);
		$student->setSemesterId($semesterId);
		
		$resCalifs = $student->GetKardexCalif();
		
		$califs = array();
		foreach($resCalifs as $key => $val){
			
			$subjectId = $val['subjectId'];
			
			$califs[$subjectId] = $val;
			
		}

		$smarty->assign('calif',$califs);
		$smarty->assign('periodos',$periodos);
		$smarty->assign('typeCalifs',$typeCalifs);
		$smarty->assign('subjects',$subjects);
		$smarty->assign('modo','capturar');
		$smarty->assign('userId',$userId);
		$smarty->assign('majorId',$majorId);
		$smarty->assign('semesterId',$semesterId);
		$smarty->assign('nombre',$nombre);
		$smarty->assign('semestre',$semestre);
		$smarty->assign('carrera',$carrera);
		
	}elseif($_POST['type'] == 'deleteCalif'){
		
		$semesterId = $_POST['semesterId'];		
		$userId = $_POST['userId'];	
		$majorId = $_POST['majorId'];
		
		//Obtenemos el nombre del alumno
		$user->setUserId($userId);
		$nombre = $user->GetNameById();
		
		//Obtenemos el nombre del semestre
		$semester->setSemesterId($semesterId);		
		$semestre = $semester->GetNameById();
		
		//Obtenemos el nombre de la carrera
		$major->setMajorId($majorId);
		$carrera = $major->GetNameById();
		
		//Borramos exl kardex
		$student->setUserId($userId);
		$student->setMajorId($majorId);
		$student->setSemesterId($semesterId);
		
		$student->DeleteKardexCalif();
		
		$msg = 'El kardex fue eliminado correctamente';
		
		$smarty->assign('msg',$msg);
		$smarty->assign('modo','capturar');
		$smarty->assign('nombre',$nombre);
		$smarty->assign('semestre',$semestre);
		$smarty->assign('carrera',$carrera);
	}
	
	//Obtenemos los semestres
	$semesters = $semester->Enumerate();					
	$smarty->assign('semesters', $semesters);
	
	//Obtenemos las carreras
	$majors = $major->Enumerate();					
	$smarty->assign('majors', $majors);
	
	//Obtenemos el periodo activo
	$periodoId = $periodo->GetPeriodoActive();
	$smarty->assign('periodoId',$periodoId);
	
	$smarty->assign('mnuMain','catalogos');
			
?>