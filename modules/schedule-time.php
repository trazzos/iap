<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(16);	
	/* End Session Control */
	
	$periodoId = $periodo->GetPeriodoActive();
	$scheduleTime->setPeriodoId($periodoId);
	
	$result = $scheduleTime->Enumerate();
	
	$smarty->assign("schedule_time", $result);
	$smarty->assign('mnuMain','configuracion');

?>