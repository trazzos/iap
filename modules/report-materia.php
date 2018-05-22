<?php


// exit;
	$subject->setTipo('Docente');
	$subject->scriptLLenaMaterias();
	
	// exit;
	$lstPosgrados = $subject->getPosgrados();

	// echo '<pre>'; print_r($personals);
	// exit;
	$smarty->assign("lstPosgrados", $lstPosgrados);

?>