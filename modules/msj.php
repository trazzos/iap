<?php


// exit;
	$personal->setTipo('Docente');
	$personals = $personal->EnumerateMsj();

	// echo '<pre>'; print_r($personals);
	// exit;
	$smarty->assign("personals", $personals);

?>