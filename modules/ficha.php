<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(20);	
	/* End Session Control */
	
	$arrPage = array();		
	$viewPage = 1;			
	$rowsPerPage = 30;		
	
	$pageVar = 'p';	
	
	if(isset($_GET["$pageVar"]))
		$viewPage = $_GET["$pageVar"];	
	
	$fichas = $ficha->EnumerateByPage($viewPage, $rowsPerPage, $pageVar, WEB_ROOT.'/ficha', $arrPage, ' folioFicha ASC, ');
	
	$activate = $ficha->IsActivated();
	
	$smarty->assign('activate', $activate);
	$smarty->assign('fichas', $fichas);	
	$smarty->assign('arrPage', $arrPage);
	$smarty->assign('mnuMain','admision');
		
?>