<?php
	
	/* For Session Control - Don't remove this */
	$user->allow_access(27);	
	/* End Session Control */
		
	if($_POST['accion'] == 'imprimir_report'){
						
		$report->PrintPdfDesercion();
		
	}//if
	
	$smarty->assign('mnuMain','reportes');
					
?>