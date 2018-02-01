<?php


// exit;
	$personal->setTipo('Maestro');
	$personals = $personal->EnumerateNew();

	// echo '<pre>'; print_r($personals);
	// exit;
	$smarty->assign("personals", $personals);

?>