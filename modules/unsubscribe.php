<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	


	if($_POST){
			
			
// echo "<pre>"; print_r($_POST);
	// exit;
		if($_POST['type'] ==  'saveSolicitudBaja'){

			if($solicitud->upSolicitudBaja()){
				$smarty->assign("msj", 'si');	
			}else{
				$smarty->assign("msj", 'no');	
			}
			
		}else{
			$solicitud->setTipo(3);
			$solicitud->setMotivo($_POST['motivo']);
			if($solicitud->SaveSolicitud()){
				$smarty->assign("msj", 'si');	
			}else{
				$smarty->assign("msj", 'no');	
			}
		}
		
		
		
	}


	$infoBaja =  $solicitud->buscaBaja();
	

	$smarty->assign('infoBaja', $infoBaja);
	

?>