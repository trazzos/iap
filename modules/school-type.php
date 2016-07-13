<?php

	$schoolType->SetPage($_GET["p"]);
	$resSchoolType = $schoolType->Enumerate();
	$smarty->assign("resSchoolType", $resSchoolType);
	
	$smarty->assign('mnuMain','catalogos');
	
?>