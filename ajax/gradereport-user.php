<?php

	session_start();
	
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	switch($_POST['type'])
	{
		case 'addIregularsIntersem':
		
			$gradereport->setGradereportId($_POST['gradereportId']);
			
			$gradereport->setSubjectId($_POST['subjectId']);
			$gradereport->setPeriodoId($_POST['periodoId']);
			$gradereport->setSemesterId($_POST['semesterId']);
			
			// agregamos los alumnos irregulares de la materia, periodo y semestre, corrwspondiente al acta
			$gradereport->AddIrregularStudent();
			
			//recuperamos la info del acta
			$gradeReportInfo = $gradereport->Info();
			//recuperamos info de las calificaciones de los alumnos
			$userlist = $gradereport->EnumerateUsersByGradeReport();
			//	recuperamos el periodo del acta
			$periodoReport = $gradeReportInfo['periodoId'];
			// recuperamos el ID del examen Intersemestral
			$interSemId = $GLOBALS['typetest']->InfoIdByTypetest('INTERSEMESTRAL');
			// recuperamos la fecha del Intersemetral con el ID y el periodo del acta
			$interTests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($interSemId, $periodoReport);
			// tomamos la fecha del examen Intersemestral
			$interTest = $interTests[0][0];
			// mandamos a smarty las variables
			$smarty->assign('interTest', $interTest);					// fecha del Intersemestral
			$smarty->assign('WEB_ROOT', WEB_ROOT);
			$smarty->assign('gradeReportInfo', $gradeReportInfo);		// info de la cabecera
			$smarty->assign('userlist', $userlist);						// info de la lista de alumnos
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '[#]';
			$smarty->display(DOC_ROOT . '/templates/lists/gradereport-user.tpl');
			break;
		case 'editIntersemScore':
			// tomamos la fecha actual
			$currDat = date('Y-m-d');
			// dateIni = fecha de la entrega de calificaciones - 3 dias
			$dateIni = date('Y-m-d', strtotime('-1 days', strtotime($gradeScoreInfo['datetest'])));
			// dateIni = fecha de la entrega de calificaciones + 3 dias
			$dateEnd = date('Y-m-d', strtotime('+6 days', strtotime($gradeScoreInfo['datetest'])));
			// si la fecha es menor que dateIni o es mayor que dateEnd
			if( ( $currDat < $dateIni || $currDat > $dateEnd ) && $_SESSION['User']['username'] != 'Admin')
			{
				// fuera del rango de fecha para la entrega de calificaciones -3 dias a +3 dias de la fecha de entrega
				$error->setError(30116, 'error');
				$error->PrintErrors();
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			}
			else
			{
				//sacamos el acta y la lista de calidficaciones del alumno
				$gradereport->setGradReportUserId($_POST['gradReportUserId']);
				$gradeScoreInfo = $gradereport->InfoGradeScore();
				
				//echo '<br/><br/>---<br/>';
				//echo 'calif id : ' . $_POST['gradReportUserId'] . '<br/>';
				//print_r($gradeScoreInfo);
				//echo '<br/>---<br/>';
				
				// asignamos la informacion a la variable smarty post
				$smarty->assign('post', $gradeScoreInfo);
				// visualizamos la pantalla de edicion de datos
				$smarty->display(DOC_ROOT . '/templates/boxes/edit-gradescore-user-popup.tpl');
			}
			break;
		case 'saveEditGradescore':
			$gradereport->setGradReportUserId($_POST['gradReportUserId']);
			$gradereport->setTestIdentifier($_POST['testIdentifier']);
			$gradereport->setGradeScore($_POST['gradescore']);
			if($gradereport->UpdateReportScore())
			{
				// recuperamos informacion del acta -- del registro de calificaciones del alumno
				$gradereport->setGradReportUserId($_POST['gradReportUserId']);
				$gradescoreInfo = $gradereport->GetUserScoreByGradReportUserId();
				// usamos la informacion del acta recuperada para sacar la lista de alumnos de esta acta para revisualizar los datos
				$gradereport->setGradereportId($gradescoreInfo['gradereportId']);
				//recuperamos la info del acta
				$gradeReportInfo = $gradereport->Info();
				//recuperamos info de las calificaciones de los alumnos
				$userlist = $gradereport->EnumerateUsersByGradeReport();
				//	recuperamos el periodo del acta
				$periodoReport = $gradeReportInfo['periodoId'];
				// recuperamos el ID del examen Intersemestral
				$interSemId = $GLOBALS['typetest']->InfoIdByTypetest('INTERSEMESTRAL');
				// recuperamos la fecha del Intersemetral con el ID y el periodo del acta
				$interTests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($interSemId, $periodoReport);
				// tomamos la fecha del examen Intersemestral
				$interTest = $interTests[0][0];
				// mandamos a smarty las variables
				$smarty->assign('interTest', $interTest);					// fecha del Intersemestral
				$smarty->assign('WEB_ROOT', WEB_ROOT);
				$smarty->assign('gradeReportInfo', $gradeReportInfo);		// info de la cabecera
				$smarty->assign('userlist', $userlist);						// info de la lista de alumnos
				echo 'ok[#]';
				$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$smarty->display(DOC_ROOT . '/templates/lists/gradereport-user.tpl');
			}
			else
			{
				echo 'fail[#]';
				$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
			}
			break;
			
		case 'captAllScores':
		
			// tomamos la fecha actual
			$currDat = date('Y-m-d');
			// dateIni = fecha de la entrega de calificaciones - 3 dias
			$dateIni = $_POST['datetest'];
			// dateIni = fecha de la entrega de calificaciones + 3 dias
			$dateEnd = date('Y-m-d', strtotime('+6 days', strtotime($_POST['datetest'])));
			// si la fecha es menor que dateIni o es mayor que dateEnd		
			if( ( $currDat >= $dateIni && $currDat <= $dateEnd ) || $_SESSION['User']['username'] == 'Admin')			
			{
				$gradereport->setGradereportId($_POST['gradereportId']);
				$gradereport->setDatetest($_POST['datetest']);
				$scoresEnum = $gradereport->GetListScoresByReportIdDatetest();			
				$labelText = 'CALIFICACIONES : ';
				$labelTest = '';
				$testIdentifier = '';
				if($_POST['keytest'] == 'P1')
				{
					$labelTest = 'PRIMER PARCIAL';
					$testIdentifier = 'PARCIAL';
				}
				if($_POST['keytest'] == 'P2')
				{
					$labelTest = 'SEGUNDO PARCIAL';
					$testIdentifier = 'PARCIAL';
				}
				if($_POST['keytest'] == 'P3')
				{
					$labelTest = 'TERCER PARCIAL';
					$testIdentifier = 'PARCIAL';
				}
				if($_POST['keytest'] == 'G1')
				{
					$labelTest = 'PRIMER GLOBAL';
					$testIdentifier = 'GLOBAL';
				}
				if($_POST['keytest'] == 'G2')
				{
					$labelTest = 'SEGUNDO GLOBAL';
					$testIdentifier = 'GLOBAL';
				}
				if($_POST['keytest'] == 'G3')
				{
					$labelTest = 'TERCER GLOBAL';
					$testIdentifier = 'GLOBAL';
				}
				if($_POST['keytest'] == 'R1')
				{
					$labelTest = 'RECUPERACION (R1)';
					$testIdentifier = 'RECUPERACION';
				}
				if($_POST['keytest'] == 'Inter')
				{
					$labelTest = 'INTERSEMESTRAL';
					$testIdentifier = 'INTERSEMESTRAL';
				}
				$smarty->assign('scoresEnum', $scoresEnum);
				$smarty->assign('datetest', $_POST['datetest']);
				$smarty->assign('labelText', $labelText);
				$smarty->assign('labelTest', $labelTest);
				$smarty->assign('testIdentifier', $testIdentifier);
				$smarty->assign('gradereportId', $_POST['gradereportId']);
				$smarty->display(DOC_ROOT . '/templates/boxes/edit-allusersscores-popup.tpl');
			
			}else{
			
				// fuera del rango de fecha para la entrega de calificaciones -3 dias a +3 dias de la fecha de entrega
				$error->setError(30116, 'error');
				$error->PrintErrors();
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				
			}
			break;
		case 'saveEditAllGradescore':
				
			// arreglo de calificaciones de todos los alumnos
			$scores = array();
			$attendances = array();
			// por cada clave del arreglo POST (que tiene el nombre/valor de cada control del formulario posteado)
			foreach($_POST as $key => $value)
			{					
				// si el nombre de la clave del POST inicia con gradescore recuperamos el Id del registro de calificaciones
				// 	y el valor de la calificacion y lo metemos en el arreglo de callificaciones
				if(substr($key, 0, 10) == 'gradescore'){
				
					//Verificamos si la calificacion es un valor valido
					if($value == -2 || $value == 0 || ($value >= 5 && $value <= 10)){
						$scores[] = array( 'gradReportUserId' => substr($key, 11), 'gradescore' => $value );								
					}else{
						
						$error->setError(10076, 'error');
						$error->PrintErrors();
						
						echo 'fail[#]';
						$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
						exit;
					}//else
					
				//Capturamos la Asistencia
				}elseif(substr($key, 0, 10) == 'attendance'){
				
					//Verificamos si la calificacion es un valor valido
					if($value >= 0 && $value <= 20){			
						$attendances[] = array( 'gradReportUserId' => substr($key, 11), 'attendance' => $value );								
					}else{
						
						$error->setError(10077, 'error');
						$error->PrintErrors();
						
						echo 'fail[#]';
						$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
						exit;
					}
				}
							
			}//foreach
					
			$scoresSavedOk = true;
			
			//Grabamos cada calificacion
			foreach($scores as $score)
			{				
				$gradereport->setGradReportUserId($score['gradReportUserId']);
				$gradereport->setTestIdentifier($_POST['testIdentifier']);
				$gradereport->setGradeScore($score['gradescore']);
				
				if( !$gradereport->UpdateReportScore(false) )
				{
					$scoresSavedOk = false;
					break;
				}else{ //Actualizamos el kardex
					$gradereport->setGradReportUserId($score['gradReportUserId']);
					$gradereport->SaveToKardex();
				}//else
				
			}//foreach
			
			if(!$scoresSavedOk){
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			//Grabamos las Asistencias
			if($scoresSavedOk){
				foreach($attendances as $att){
					
					$gradereport->setGradReportUserId($att['gradReportUserId']);
					$gradereport->setTestIdentifier($_POST['testIdentifier']);
					$gradereport->setAttendance($att['attendance']);
					
					$gradereport->UpdateReportAttendance();
					
				}//foreach
				
			}//if
			
			if( $scoresSavedOk )
			{
				// se grabaron las calificaciones correctamente
				$error->setError(30132, 'complete');
				$error->PrintErrors();
	
				//recuperamos la info del acta
				$gradereport->setGradereportId($_POST['gradereportId']);
				$gradeReportInfo = $gradereport->Info();
				
				
				//recuperamos info de las calificaciones de los alumnos
				//$gradereport->setGradereportId($_GET['gradereportId']);
				$resUserlist = $gradereport->EnumerateUsersByGradeReport();
				
				//	recuperamos el periodo del acta
				$periodoReport = $gradeReportInfo['periodoId'];
			
			
				//*** verificar si es un acta de alumnos irregulares o regulares
				if($gradeReportInfo['regularization'] == 'N')
				{
					// recuperar la lista de examenes del periodo activo, parciales y globales
					//  recuperamos los ID's de los examenes parcial y global
					$parcialId = $typetest->InfoIdByTypetest('PARCIAL');
					$globalId = $typetest->InfoIdByTypetest('GLOBAL');
					// establecemos el id del periodo del programa de examenes
					$schedule_test->setPeriodoId($periodoReport);
					// recuperamos la lista de los examenes parciales del programa de examenes
					$schedule_test->setTypetestId($parcialId);
					$parcialEnum = $schedule_test->EnumerateDatetestByTypetestAndPeriodo();
					$parcialTests = array();
					foreach($parcialEnum as $index => $datetest)
					{
						$parcialTests[] = $datetest['datetest'];
					}
					// recuperamos la lista de los examenes globales del programa de examenes
					$schedule_test->setTypetestId($globalId);
					$globalEnum = $schedule_test->EnumerateDatetestByTypetestAndPeriodo();
					$globalTests = array();
					foreach($globalEnum as $key => $date)
					{
						$globalTests[] = $date['datetest'];
					}
					
					//  recuperamos el ID del examen R1
					$r1Id = $GLOBALS['typetest']->InfoIdByTypetest('RECUPERACION');
					// recuperamos INfo del examen r1
					$r1Tests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($r1Id, $periodoReport);
					// recuperamos solo la fecha del R1
					$r1Test = $r1Tests[0][0];
					
					/********* CALCULAMOS EL PROMEDIO *********/
					
					$userlist = array();
					//Obtenemos el Promedio	
					foreach($resUserlist as $key => $res){
						
						$card = $res;			
						
						$card['studentFullName'] = utf8_encode($res['studentFullName']);
						
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
					
					//parcialTests, globalTests y r1Test se utilizan para visualizar correctamente las calificaciones de cada examen parcial y global
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
				
				echo 'ok[#]';
				$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
				echo '[#]';
				$smarty->display(DOC_ROOT . '/templates/lists/gradereport-user.tpl');
				
			}
			else
			{
				// hubo un problema en la grabacion de las calificaciones
				$error->setError(30133, 'complete');
				$error->PrintErrors();
				echo 'fail[#]';
				$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
			}
			
			break;
	}

?>