<?php


// exit;
	// $subject->setTipo('Docente');
	$lstPosgrados = $subject->getPosgrados();

	// echo '<pre>'; print_r($personals);
	// exit;
	$smarty->assign("lstPosgrados", $lstPosgrados);

?>