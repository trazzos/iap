<?php

	/* For Session Control - Don't remove this */
	$user->allow_access();	
	/* End Session Control */
	$smarty->assign('mnuMain', "tv");
	
	$recordings = $recording->Enumerate();
	$smarty->assign('recordings', $recordings);
	

	$actual = $recording->Info($_GET["id"]);
	$smarty->assign('actual', $actual);
	$smarty->assign('mnuSubmain','grabaciones');


?>