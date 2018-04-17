<?php		
/* For Session Control - Don't remove this */
// $user->allow_access(37);	
if($_POST){
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
$info =  $solicitud->Info($_GET['sId']);
$infoBaja =  $solicitud->buscaBaja();
// echo "<pre>"; print_r($infoBaja);
// exit;
$smarty->assign('info', $info);
$smarty->assign('infoBaja', $infoBaja);
	
// echo '<pre>'; print_r($info);
// exit;	

?>