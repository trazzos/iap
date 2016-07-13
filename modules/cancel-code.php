<?php
	
	/* For Session Control - Don't remove this */
	//$user->allow_access(7);	
	/* End Session Control */
	
	$codes = $code->Enumerate();
	$smarty->assign('codes',$codes);
	$smarty->assign('mnuMain','catalogos');
	
?>