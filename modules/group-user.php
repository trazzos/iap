<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(6);	
	/* End Session Control */
	
	$groupId = $_GET['gpoId'];
	
	$group->setGroupId($groupId);
	$info = $group->Info();
	
	$majorId = $info['majorId'];
	$semesterId = $info['semesterId'];
	
	$student->setMajorId($majorId);
	$student->setSemesterId($semesterId);
	$student->setGroupId($groupId);
		
	$users = $student->SearchByGroup();	
	$smarty->assign('users', $users);
	$smarty->assign('mnuMain','catalogos');

?>