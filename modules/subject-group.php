<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access();	
	/* End Session Control */
	
	$subjectId = $_GET['idsub'];
		
	$_SESSION['subId'] = $subjectId;
	
	$subject->setSubjectId($subjectId);
	$subjectName = $subject->GetNameById();
	$periodoId = $periodo->GetPeriodoActive();
	$subject->setPeriodoId($periodoId);
	$resGroups = $subject->EnumerateGroups();
			
	$groups = array();
	foreach($resGroups as $key => $val){
		
		$card = $val;
		
		if($val['groupId']){
			$group->setGroupId($val['groupId']);
			$card['clave'] = $group->GetNameById();	
		}
						
		$groups[$key] = $card;
			
	}
		
	$smarty->assign('groups', $groups);
	$smarty->assign('subjectName', $subjectName);
	
	$smarty->assign('periodos', $periodo->Enumerate());
	$smarty->assign('mnuMain','catalogos');
	
?>