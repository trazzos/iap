<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(8);	

	$smarty->assign('id', $_GET["id"]);
	
	$smarty->assign('mnuMain', "modulo");
	$smarty->assign('mnuSubmain','miequipo');
	$smarty->assign('mnuSubmain','clase');

?>