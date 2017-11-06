<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(8);	

	// $module->setCourseModuleId($_GET["id"]);
	$module->setStatusIn('activo');
	$module->setTipoReporte('entrada');
	$module->setQuienEnviaId('personal');
	$module->setRecibeId($_SESSION['User']['userId']);
	$module->setCMId($_GET["id"]);
	$lstMsj = $module->EnumerateInbox();
	$infoC = $module->infoChat($_GET["cId"]);
	// exit;
	// $smarty->assign('myModule', $myModule);
	
	// $forum->setCourseId($myModule["courseId"]);
	// $forum = $forum->Enumerate();
	// echo "<pre>"; print_r($infoC);
	// exit;
	// $smarty->assign('forum', $forum);
	
	$smarty->assign('id', $_GET["id"]);
	
	$smarty->assign('infoC', $infoC);
	$smarty->assign('courseMId', $_GET["id"]);
	$smarty->assign('lstMsj', $lstMsj);
	$smarty->assign('mnuMain', "modulo");
	$smarty->assign('mnuSubmain','foro');

?>