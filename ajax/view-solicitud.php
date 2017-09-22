<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case 'addSolicitud':
		
			if($_POST['solicitudId']==''){
				echo 'fail[#]';
				echo '<center><font color="red">Por favor, seleccione el tipo de solicitud</font></center>';
				exit;
			}
		

				$solicitud->setTipo($_POST['solicitudId']);
				if ($solicitud->SaveSolicitud()){
					echo 'ok[#]';
					echo '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  La solicitud se genero correctamente
					</div>';
					echo '[#]';
					$lstSol = $solicitud->arraySolicitudes();
						$registros = $solicitud->enumarateSolicitudesStden();
						$smarty->assign('registros', $registros);
					$smarty->assign("lstSol", $lstSol);
					$smarty->display(DOC_ROOT.'/templates/lists/view-solicitud.tpl');
				}else{
					echo 'fail[#]';
				}

					
			break;
			
			case 'enviarArchivo';
			
				// echo '<pre>'; print_r($_POST);
				// echo '<pre>'; print_r($_FILES);
				// exit;
				$solicitud->setSolicitudId($_POST['solicitudId']);
				if ($solicitud->enviarArchivo()){
					echo 'ok[#]';
					echo '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  El Comprobante se adjunto correctamente
					</div>';
					echo '[#]';
					$lstSol = $solicitud->arraySolicitudes();
					$registros = $solicitud->enumarateSolicitudesAdmin();
					$smarty->assign('registros', $registros);
					$smarty->assign("lstSol", $lstSol);
					$smarty->display(DOC_ROOT.'/templates/lists/view-solicitud.tpl');
				}else{
					echo 'fail[#]';
				}
			
			break;

	
	}

?>
