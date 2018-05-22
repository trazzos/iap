<?php
		
	// $student->setUserId($_SESSION['User']["userId"]);
	$lstGrupo = $group->getGrupo($_GET['id']);
	
	
	// echo '<pre>'; print_r($_SESSION);
	// exit;
	$smarty->assign("lstGrupo", $lstGrupo);
	
	if($_SESSION['User']['perfil'] == 'Administrador' or $_SESSION['User']['perfil'] == 'Docente'){
		$smarty->assign('mnuMain', "cursos");
	}else{
		$smarty->assign('mnuMain', "modulo");
		$smarty->assign('mnuSubmain','docente');
	}
	
	$smarty->assign('rand', rand());
	$smarty->assign('id', $_GET["id"]);
	
?>