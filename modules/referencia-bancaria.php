<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	
	$countSol = $solicitud->countReferenciaBancaria();
	$student->setUserId($_SESSION['User']['userId']);
	$infoStudent = $student->GetInfo();
	
	// echo $infoStudent['referenciaBancaria'];
	// exit;
	
	if($infoStudent['referenciaBancaria']<>''){
		$countSol = 1;
	}else{
		$countSol = 0;
	} 
	
	// if($countSol >= 1){
		// $countSol = 1;
	// } 
	
	// exit;
	
		// echo  $infoStudent['referenciaBancaria'];
		// exit;
	$lstCuentas = $bank->getCuentas();
	$smarty->assign('courseId', $_GET['id']);
	$smarty->assign('countSol', $countSol);
	$smarty->assign('infoStudent', $infoStudent);
	

?>