<?php
	
	session_start();
	
	/* For Session Control - Don't remove this */
	$user->allow_access();
	
	if($User['positionId'] != 1){	
		if(!$user->allow_access_module($User['userId'], 11)){
			if(!$user->allow_access_module($User['userId'], 31)){
				header('Location: '.WEB_ROOT);
				exit;
			}else{
				$viewMode = 1;
			}
		}	
	}
	
	/* End Session Control */
		
	if($_SESSION['User']['positionId'] == 1 || $viewMode == 1)
	{
		// si el usuario es Admin enumarar todas las actas
		$__gradereport = $gradereport->Enumerate();
	}
	else
	{
		// enumerar las actas del usuario (docente) que inicio session
		$__gradereport = $gradereport->EnumerateByPersonalId();
	}

	if($__gradereport)
	{
		foreach($__gradereport as $key => $gradereportx)
		{
			//Sacamos informacion del grupo
			$subject->setGroupId($gradereportx['groupId']);
			$_group = $subject->infoGroup();
			if($_group)
				$_group = $util->DecodeRow($_group);
			
			//Clave del grupo
			$__gradereport[$key]['claveGroup'] = $_group['clave'];
			
			//Nombre del grupo
			$__gradereport[$key]['nameGroup'] = $_group['name'];
			
			//ID del periodo
			$__gradereport[$key]['periodoId'] = $_group['periodoId'];
			
			//Clave del periodo
			$periodo->setPeriodoId($_group['periodoId']);
			$infPeriodo = $periodo->Info();
			if($infPeriodo)
				$infPeriodo = $util->DecodeRow($infPeriodo);
			$__gradereport[$key]['clavePeriodo'] = $infPeriodo['identifier'];
			
			//Clave de la materia
			$__gradereport[$key]['subjectId'] = $_group['subjectId'];
			
			//Nombre de la materia
			$subject->setSubjectId($_group['subjectId']);
			$infSubject = $subject->Info();
			if($infSubject)
				$infSubject = $util->DecodeRow($infSubject);
			$__gradereport[$key]['nameSubject'] = $infSubject['name'];
			$stdLimit = $infSubject['student_limit'];
			
			//ID del semestre
			$__gradereport[$key]['semesterId'] = $infSubject['semesterId'];
			
			//Clave del semestre
			$semester->setSemesterId($infSubject['semesterId']);
			$infSemester = $semester->Info();
			if($infSemester)
				$infSemester = $util->DecodeRow($infSemester);
			$__gradereport[$key]['claveSemester'] = $infSemester['clave'];
			
			//Nombre del semestre
			$__gradereport[$key]['nameSemester'] = $infSemester['name'];
			
			$complete = $gradereport->IsCalifComplete($gradereportx['gradereportId']);
			
			$__gradereport[$key]['p1'] = $complete[1];
			$__gradereport[$key]['p2'] = $complete[2];
			$__gradereport[$key]['p3'] = $complete[3];
			
			$gradereport->setGradereportId($gradereportx['gradereportId']);
			$stdTotal = $gradereport->GetTotalUsersByGradeReport();
			$__gradereport[$key]['stdTotal'] = $stdTotal;
			$__gradereport[$key]['stdLimit'] = $stdLimit;
			$__gradereport[$key]['stdComplete'] = ($stdTotal >= $stdLimit) ? 'Si' : 'No';
						
		}
	}
	
	//Obtenemos los semestres
	$resSem = $semester->Enumerate();
	$semesters = $util->EncodeResult($resSem);
	$smarty->assign('semesters',$semesters);
	
	$smarty->assign("__gradereport", $__gradereport);
	$smarty->assign('mnuMain','actas');
?>