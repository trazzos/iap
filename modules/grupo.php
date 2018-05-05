<?php
		
	// $student->setUserId($_SESSION['User']["userId"]);
	$lstGrupo = $group->getGrupo($_GET['id']);
	
	
	// echo '<pre>'; print_r($lstGrupo);
	
	$smarty->assign("lstGrupo", $lstGrupo);
	
	$smarty->assign('mnuMain', "modulo");
$smarty->assign('mnuSubmain','docente');
?>