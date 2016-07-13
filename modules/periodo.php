<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(14);	
	/* End Session Control */
	
	$__periodo = $periodo->Enumerate();
	$smarty->assign("__periodo", $__periodo);
	$smarty->assign('mnuMain','configuracion');

?>