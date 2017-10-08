<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	$countSol = $solicitud->countReferenciaBancaria();
	$student->setUserId($_SESSION['User']['userId']);
	$infoStudent = $student->GetInfo();
	
	if($infoStudent['referenciaBancaria']<>''){
		$countSol = 1;
	} 
	
		// echo '<pre>'; print_r($infoStudent);
		// exit;
	$lstCuentas = $bank->getCuentas();
	$smarty->assign('countSol', $countSol);
	$smarty->assign('infoStudent', $infoStudent);
	

?>