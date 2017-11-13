<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	$countSol = $solicitud->countReferenciaBancaria();
	$student->setUserId($_SESSION['User']['userId']);
	$infoStudent = $student->GetInfo();
	
	if($infoStudent['referenciaBancaria']==''){
		$countSol = 0;
	} 
	
		// echo  $infoStudent['referenciaBancaria'];
		// exit;
	$lstCuentas = $bank->getCuentas();
	$smarty->assign('courseId', $_GET['id']);
	$smarty->assign('countSol', $countSol);
	$smarty->assign('infoStudent', $infoStudent);
	

?>