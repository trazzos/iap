<?php
	session_start();
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

// recuperar la lista de programa de examenes  parciales y globales del periodo al que pertenece el acta de calificaion
// obtenemos el ID del Periodo del Acta de calificaciones ( se obtienen con el ID del la calificacion )
$periodoReport = $gradereport->GetPeriodoByGradReportUserId[$_POST['gradReportUserId']];
//  recuperamos el ID de los examenes parcial y global
$parcialId = $typetest->InfoIdByTypetest('PARCIAL');
$globalId = $typetest->InfoIdByTypetest('GLOBAL');
// obtener la lista de las fechas de los examenes parciales, proporcionando el ID del examen y el ID del periodo
$parcialTests = $schedule_test->GetDatesScheduleBy($parcialId, $periodoReport);
// obtener la lista de las fechas de los examenes globales, proporcionando el ID del examen y el ID del periodo
$globalTests = $schedule_test->GetDatesScheduleBy($globalId, $periodoReport);

		
switch($_POST['type'])
{
	case 'deleteGradescore':
		$gradereport->setGradReportUserId($_POST['gradReportUserId']);
		// obtenemos la informacion del reporte de califiaciones antes de eliminar la calificaciones
		//		se necesitara para desplegar la lista de examens del alumno por si se elimina el examen
		//obtenemos la informacion del ID del reporte y del ID del alumno 
		//		( se obtienen con el ID del primer registro de la primer calificacion parcial )
		$gradescoreInfo = $gradereport->GetUserScoreByGradReportUserId();		
		if($gradereport->DeleteReportScore())
		{
			$gradereport->SaveToKardex();
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo '[#]';
			// ENUMERAR LISTA DE EXAMENES DEL ALUMNO  -------------------------
			//obtenemos la informacion de todos los examenes que tiene registrado el alumno en el acta correspondiente
			$gradereport->setGradereportId($gradescoreInfo['gradereportId']);
			$gradereport->setAlumnoId($gradescoreInfo['alumnoId']);
			$gradescoreEnum = $gradereport->GetScoresByGradreportAndAlumno();
			// FIN DE ENUMERACION  --------------------------------------------
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->assign('gradescoreEnum', $gradescoreEnum);
			$smarty->display(DOC_ROOT . '/templates/lists/gradescore-user.tpl');
		}
		else
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		break;
	case 'editGradescore':
		// obtenemos la informacion de la calificacion que se va a modificar
		$gradereport->setGradReportUserId($_POST['gradReportUserId']);
		$gradeScoreInfo = $gradereport->InfoGradeScore();
		// tomamos la fecha actual
		$currDat = date('Y-m-d');
		// dateIni = fecha de la entrega de calificaciones - 3 dias
		$dateIni = date('Y-m-d', strtotime('-1 days', strtotime($gradeScoreInfo['datetest'])));
		// dateIni = fecha de la entrega de calificaciones + 3 dias
		$dateEnd = date('Y-m-d', strtotime('+2 days', strtotime($gradeScoreInfo['datetest'])));
		// si la fecha es menor que dateIni o es mayor que dateEnd
		if( ( $currDat < $dateIni || $currDat > $dateEnd ) && $_SESSION['User']['positionId'] != 1)
		{
			// fuera del rango de fecha para la entrega de calificaciones -3 dias a +3 dias de la fecha de entrega
			$error->setError(30116, 'error');
			$error->PrintErrors();
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
		}
		else
		{
			// asignamos la informacion a la variable smarty post
			$smarty->assign('post', $gradeScoreInfo);
			// visualizamos la pantalla de edicion de datos
			$smarty->display(DOC_ROOT . '/templates/boxes/edit-gradescore-user-popup.tpl');
		}
		break;
	case 'saveEditGradescore':		
					
		$gradescore = $_POST['gradescore'];
		$attendance = $_POST['attendance'];
				
		$gradereport->setGradReportUserId($_POST['gradReportUserId']);
		$gradereport->setTestIdentifier($_POST['testIdentifier']);
		$gradereport->setGradeScore($gradescore);
			
		if($gradescore == -2 || $gradescore == 0 || ($gradescore >= 5 && $gradescore <= 10))
			$validCalif = true;
		else
			$validCalif = false;
								
		if(!$validCalif){
								
			$error->setError(10076, 'error');
			$error->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		
		}
		
		if($attendance >= 0 && $attendance <= 20)
			$validAttendance = true;
		else
			$validAttendance = false;
								
		if(!$validAttendance){
								
			$error->setError(10077, 'error');
			$error->PrintErrors();
			
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			exit;
		
		}
				
		if($gradereport->UpdateReportScore())
		{			
			//Guardamos la Asistencia
			$gradereport->setGradReportUserId($_POST['gradReportUserId']);
			$gradereport->setTestIdentifier($_POST['testIdentifier']);
			$gradereport->setAttendance($attendance);
				
			$gradereport->UpdateReportAttendance();
			
			//Guardamos en el Kardex
			$gradereport->SaveToKardex();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT . '/templates/boxes/status.tpl');
			echo '[#]';
			
			// ENUMERAR LISTA DE EXAMENES DEL ALUMNO  -------------------------
			$gradereport->setGradReportUserId($_POST['gradReportUserId']);
			$gradescoreInfo = $gradereport->GetUserScoreByGradReportUserId();
			$gradereport->setGradereportId($gradescoreInfo['gradereportId']);
			$gradereport->setAlumnoId($gradescoreInfo['alumnoId']);
			$gradescoreEnum = $gradereport->GetScoresByGradreportAndAlumno();
			// FIN DE ENUMERACION  --------------------------------------------
			
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->assign('gradescoreEnum', $gradescoreEnum);
			$smarty->display(DOC_ROOT . '/templates/lists/gradescore-user.tpl');		
		}
		else
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT . '/templates/boxes/status_on_popup.tpl');
		}
		break;
}

?>