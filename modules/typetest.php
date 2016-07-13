<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(10);	
	/* End Session Control */
	
	$__typetest = $typetest->Enumerate();
	$smarty->assign("__typetest", $__typetest);
	$smarty->assign('mnuMain','catalogos');
?>