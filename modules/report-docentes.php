<?php


// exit;
	$personal->setTipo('Docente');
	$personals = $personal->EnumerateNew();

	// echo '<pre>'; print_r($personals);
	// exit;
	$smarty->assign("personals", $personals);

?>