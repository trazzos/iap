<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	$student->setUserId($_SESSION['User']['userId']);
	$infoStudent = $student->GetInfo();

	
	if($infoStudent['referenciaBancaria']<>''){
		$countSol = 1;
	}else{
		$countSol = 0;
		if($infoStudent['referenciaBancaria']<>''){
		$infoPor = $student->GetPorcentajeBeca($infoStudent['referenciaBancaria']);
		}
		$smarty->assign('infoPor', $infoPor);
		header("Location:".WEB_ROOT."/referencia-bancaria");
		exit;
	} 
	
	$infoCar = $student->infoCarrera();
	$lstPagos = $student->verCalendarioPagoscxc();
	

	
	$smarty->assign('infoCar', $infoCar);
	$smarty->assign('infoStudent', $infoStudent);
	$smarty->assign('lstPagos', $lstPagos);

?>