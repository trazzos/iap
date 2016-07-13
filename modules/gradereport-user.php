<?php
	//imprimir la lista de alumnos que pertenecen al ACTA NUM: $gradereportId

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
		
	//Imprimir el Acta Semestral
	if(isset($_GET['printReportId']) && !empty($_GET['printReportId']) ){
		$gradereport->PrintReport($_GET['printReportId']);
		$_GET['gradereportId'] = $_GET['printReportId'];
		exit();
	}
	
	//Imprimir el Acta R1
	if(isset($_GET['printR1Id']) && !empty($_GET['printR1Id']) ){
		$gradereport->setPrintR1(true);
		$gradereport->PrintReport($_GET['printR1Id']);
		$_GET['gradereportId'] = $_GET['printR1Id'];
		exit();
	}
	
	//Imprimir la Lista de Alumnos
	if(isset($_GET['printReportList']) && !empty($_GET['printReportList']) ){
		$gradereport->PrintReportList($_GET['printReportList']);
		$_GET['gradereportId'] = $_GET['printReportList'];
		exit();
	}
	
	
	//Recuperamos la info del acta
	$gradereport->setGradereportId($_GET['gradereportId']);
	$gradeReportInfo = $gradereport->Info();
	
	$resUserlist = array();
	
	//Recuperamos info de las calificaciones de los alumnos
	$gradereport->setGradereportId($_GET['gradereportId']);
	$resUserlist = $gradereport->EnumerateUsersByGradeReport();
	
	//Recuperamos el periodo del acta
	$periodoReport = $gradeReportInfo['periodoId'];


	//*** Verificamos si es un acta de alumnos irregulares o regulares
	if($gradeReportInfo['regularization'] == 'N')
	{
		//Recuperamos la lista de examenes del periodo activo, parciales y globales
		//Recuperamos los ID's de los examenes parcial y global
		$parcialId = $typetest->InfoIdByTypetest('PARCIAL');
		$globalId = $typetest->InfoIdByTypetest('GLOBAL');
		
		//Establecemos el id del periodo del programa de examenes
		$schedule_test->setPeriodoId($periodoReport);
		
		//Recuperamos la lista de los examenes parciales del programa de examenes
		$schedule_test->setTypetestId($parcialId);
		$parcialEnum = $schedule_test->EnumerateDatetestByTypetestAndPeriodo();
		
		$parcialTests = array();
		foreach($parcialEnum as $index => $datetest)
		{
			$parcialTests[] = $datetest['datetest'];
		}
		
		//Recuperamos la lista de los examenes globales del programa de examenes
		$schedule_test->setTypetestId($globalId);
		$globalEnum = $schedule_test->EnumerateDatetestByTypetestAndPeriodo();
		
		$globalTests = array();
		foreach($globalEnum as $key => $date)
		{
			$globalTests[] = $date['datetest'];
		}
		
		//Recuperamos el ID del examen R1
		$r1Id = $GLOBALS['typetest']->InfoIdByTypetest('RECUPERACION');
		
		//Recuperamos INfo del examen r1
		$r1Tests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($r1Id, $periodoReport);
		
		//Recuperamos solo la fecha del R1
		$r1Test = $r1Tests[0][0];
		
		/********* CALCULAMOS EL PROMEDIO *********/
		
		$userlist = array();
		//Obtenemos el Promedio	
		foreach($resUserlist as $key => $res){
			
			$card = $res;			
			
			$parciales = array();
			$globales = array();		
							
			foreach($parcialTests as $itm){
				
				$parciales[] = $res[$itm];			
			}
			
			foreach($globalTests as $itm){
				
				$globales[] = $res[$itm];			
			}
			
			$r1 = $res[$r1Test];			
						
			$promedio = 0;			
			
			if($parciales[2] != -2){
				
				//Checamos si no reprobo algun Parcial 
				//en caso afirmativo tomamos la calificacion del Global correspondiente			
				if($parciales[0] >= 0 && $parciales[0] < 6)
					$parciales[0] = $globales[0];
				if($parciales[1] >= 0 && $parciales[1] < 6)
					$parciales[1] = $globales[1];
				if($parciales[2] >= 0 && $parciales[2] < 6)
					$parciales[2] = $globales[2];
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($parciales[0] < 6 || $parciales[1] < 6 || $parciales[2] < 6)
					$promedio = 5;
				else						
					$promedio = round(($parciales[0] + $parciales[1] + $parciales[2]) / 3);					
				
				//Si reprueba 3 parciales se va directo a R1
				if($parciales[0] < 6 && $parciales[1] < 6 && $parciales[2] < 6)
					$promedio = $r1;
				//Si reprobo algun global se va directo a R1
				elseif($parciales[0] < 6 || $parciales[1] < 6 || $parciales[2] < 6)
					$promedio = $r1;
							
			}elseif($parciales[1] != -2){
				
				if($parciales[0] >= 0 && $parciales[0] <= 5)
					$parciales[0] = $globales[0];
				if($parciales[1] >= 0 && $parciales[1] <= 5)
					$parciales[1] = $globales[1];
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($parciales[0] < 6 || $parciales[1] < 6)
					$promedio = 5;
				else						
					$promedio = round(($parciales[0] + $parciales[1]) / 2);					
						
			}elseif($parciales[0] != -2){
				
				if($parciales[0] >= 0 && $parciales[0] <= 5)
					$parciales[0] = $globales[0];
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($parciales[0] < 6)
					$promedio = 5;
				else						
					$promedio = $parciales[0];
					
			}
					
			 $promedio = number_format(round($promedio),2);
			 $card['averageScore'] = $promedio;
			
			$userlist[$key] = $card;
				
		}//foreach
		
		/********* FIN CALCULAMOS EL PROMEDIO *********/
		
		//ParcialTests, globalTests y r1Test se utilizan para visualizar correctamente las calificaciones de cada examen parcial y global
		$smarty->assign('parcialTests', $parcialTests);				// info de la cantidad de parciales
		$smarty->assign('globalTests', $globalTests);				// info de la cantidad de globales
		$smarty->assign('r1Test', $r1Test);							// fecha del R1
	}
	else
	{
		// recuperamos el ID del examen Intersemestral
		$interSemId = $GLOBALS['typetest']->InfoIdByTypetest('INTERSEMESTRAL');
		// recuperamos la fecha del Intersemetral con el ID y el periodo del acta
		$interTests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($interSemId, $periodoReport);
		// tomamos la fecha del examen Intersemestral
		$interTest = $interTests[0][0];
		$smarty->assign('interTest', $interTest);					// fecha del Intersemestral
	}
	
	$smarty->assign('WEB_ROOT', WEB_ROOT);
	$smarty->assign('gradeReportInfo', $gradeReportInfo);		// info de la cabecera
	$smarty->assign('userlist', $userlist);						// info de la lista de alumnos
	$smarty->assign('viewMode', $viewMode);
	$smarty->assign('mnuMain','actas');
	
?>