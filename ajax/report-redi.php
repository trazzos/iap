<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	
	case 'loadGroups':
		
		$semesterId =  $_POST['semesterId'];
		$majorId =  $_POST['majorId'];
				
		$group->setSemesterId($semesterId);
		$group->setMajorId($majorId);
		$resGrp = $group->Search();	
		$groups = $util->EncodeResult($resGrp);
		
		$smarty->assign('groups',$groups);
		$smarty->assign("DOC_ROOT", DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/lists/list-group.tpl');
		
		break;
	
}

?>
