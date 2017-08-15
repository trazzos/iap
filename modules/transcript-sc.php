<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	

	if($_POST){
		
		$solicitud->setTipo(1);
		if($solicitud->SaveSolicitud()){
			$smarty->assign("msj", 'si');	
		}else{
			$smarty->assign("msj", 'no');	
		}
		
		
	}

	

	$lstCuentas = $bank->getCuentas();
	$solicitud->setTipo(1);
	$registros = $solicitud->enumarateSolicitudes();
	// echo "<pre>"; print_r($lstCuentas);
	// exit;
	$smarty->assign("registros", $registros);	
	$smarty->assign("lstCuentas", $lstCuentas);	
	

?>