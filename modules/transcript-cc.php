<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	if($_POST){
		
		$solicitud->setTipo(2);
		if($solicitud->SaveSolicitud()){
			$smarty->assign("msj", 'si');	
		}else{
			$smarty->assign("msj", 'no');	
		}
		
		
	}
	
	$solicitud->setTipo(2);
	$registros = $solicitud->enumarateSolicitudes();
	$lstCuentas = $bank->getCuentas();
	
	$smarty->assign("registros", $registros);	
	$smarty->assign("lstCuentas", $lstCuentas);	
	

?>