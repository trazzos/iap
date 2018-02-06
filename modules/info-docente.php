<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	// echo '<pre>'; print_r($_GET);
	// exit;
	
	if($_GET['cId']=='si'){
		$personalId=$_GET['id'];
	}else if($_GET['cId']=='no'){
		$personalId=$_GET['id'];
	}
	else{
		$personalId=$_SESSION['User']['userId'];
	}
	
	$registros = $solicitud->enumerateTiposSolicitud();
	$personal->setPersonalId($personalId);
	$info = $personal->Info();
	$infoBasic = $personal->InfoBasica();
	
	// echo '<pre>'; print_r($infoBasic);
	// exit;

	$smarty->assign("cId", $_GET['cId']);	
	$smarty->assign("infoBasic", $infoBasic);	
	$smarty->assign("info", $info);	
	$smarty->assign("registrosStudent", $registrosStudent);	
	$smarty->assign("registros", $registros);	
		
	

?>