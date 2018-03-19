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
	
	$student->setCountry(1);
	$estados=$student->EnumerateEstados();
	
	
	if(file_exists(DOC_ROOT."/".$info['foto'])){
		$foto = WEB_ROOT."/".$info['foto'].'?'.rand();
	}else{
		$foto = WEB_ROOT."/alumnos/no_foto.JPG";
	}
	
	$registros = $student->cargarCiudades($info["stateId"]);
	$smarty->assign("foto", $foto);
	$smarty->assign("registrosc", $registros);
	$smarty->assign("cId", $_GET['cId']);	
	$smarty->assign("estados", $estados);	
	$smarty->assign("infoBasic", $infoBasic);	
	$smarty->assign("info", $info);	
	$smarty->assign("registrosStudent", $registrosStudent);	
	$smarty->assign("registros", $registros);	
		
	

?>