<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(8);	

	
	
	$smarty->assign('mnuMain', "modulo");
	$smarty->assign('mnuSubmain','calendario');
	
	$smarty->assign('id', $_GET["id"]);

?>