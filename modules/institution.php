<?php

	/* For Session Control - Don't remove this */
	$user->allow_access(13);	
	/* End Session Control */

	$__institution = $institution->Enumerate();
	$smarty->assign("__institution", $__institution);
	$smarty->assign('mnuMain','configuracion');
	
?>