<?php
	// visualizar todas las calificaciones parciales y globales de un alumno en especifico

	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	/* End Session Control */
	
	//obtenemos la informacion del ID del reporte y del ID del alumno 
	//		( se obtienen con el ID del primer registro de la primer calificacion parcial )
	$gradereport->setGradReportUserId($_GET['gradReportUserId']);
	$gradescoreInfo = $gradereport->GetUserScoreByGradReportUserId();
	
	//obtenemos la informacion de todos los examenes que tiene registrado el alumno en el acta correspondiente
	$gradereport->setGradereportId($gradescoreInfo['gradereportId']);
	$gradereport->setAlumnoId($gradescoreInfo['alumnoId']);
	$gradescoreEnum = $gradereport->GetScoresByGradreportAndAlumno();	
	//obtenemos la informacion del acta
	$gradereport->setGradereportId($gradescoreInfo['gradereportId']);
	$gradereportInfo = $gradereport->Info();
	//pasamos las variables a smarty
	$smarty->assign('gradescoreInfo', $gradescoreInfo);
	$smarty->assign('gradescoreEnum', $gradescoreEnum);
	$smarty->assign('gradereportInfo', $gradereportInfo);
?>