<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(12);	
	/* End Session Control */
	
	$scheduleGroups = $scheduleGroup->Enumerate();	
	$smarty->assign('scheduleGroups', $scheduleGroups);
	
	
?>