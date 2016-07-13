<?php

	/* For Session Control - Don't remove this */
	$user->allow_access();	
	/* End Session Control */
	$smarty->assign('mnuMain', "catalogos");
	
	$recordings = $recording->Enumerate();
	$smarty->assign('recordings', $recordings);
	$smarty->assign('mnuSubmain','videoconferencias');	
	

?>