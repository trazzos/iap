<?php
	
	$groupId = $_GET['idgpo'];
	
	$group->setGroupId($groupId);
	$card = $group->Info();
	
	$_SESSION['gpoId'] = $groupId;
	
	$gpoName = $card['clave'].' - '.$card['name'];
	
	$group->setGroupId($groupId);
	$gposubjects = $group->EnumerateSubjects();	

	$smarty->assign('gposubjects', $gposubjects);
	$smarty->assign('gpoName', $gpoName);
	
?>