<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(15);	
	/* End Session Control */
	
	$periodoId = $periodo->GetPeriodoActive();
	
	$schedule_test->setPeriodoId($periodoId);
	$__schedule_test = $schedule_test->Enumerate();

	$smarty->assign("__schedule_test", $__schedule_test);
	$smarty->assign('mnuMain','configuracion');
?>