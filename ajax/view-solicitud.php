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
			
			case 'solicitarReferencia':
			
					echo 'llega';
						$student->setUserId($_SESSION['User']['userId']);
					$info = $student->GetInfo();
					echo '<pre>'; print_r($info);
					exit;
				$solicitud->setTipo(5);
				if ($solicitud->SaveSolicitud()){
					echo 'ok[#]';
					echo '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  La solicitud se envio correctamente en breve nos pondremos en contacto contigo
					</div>';
					echo 'llega';
					$sendmail = new SendMail;
				
					;
					$html = 'Solicitud de Referencia Bancaria<br><br><br>
					
					';
					
					$sendmail->PrepareAttachment("Solicitud de Referencia Bancaria",$html, "", "", "facturasfinanzas@iapchiapas.org.mx", "Finanzas", $attachment, $fileName);
					$sendmail->PrepareAttachment("Solicitud de Referencia Bancaria",$html, "", "", "enlinea@iapchiapas.org.mx", "Administrador", $attachment, $fileName);
				}else{
					echo 'fail[#]';
				}
			
			break;
			
			case 'cancelar':

			
				// echo '<pre>'; print_r($_POST);
				$solicitud->setSolicitudId($_POST['solicitudId']);
				if ($solicitud->cancelarSolicitud()){
					echo 'ok[#]';
					echo '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
						La solicitud se cancelo correctamente
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
