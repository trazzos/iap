<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case 'addSolicitud':
		$student->setUserId($_SESSION["User"]["userId"]);
		$activeCourses = $student->StudentCourses("activo", "si");
		
		$finishedCourses = $student->StudentCourses("finalizado");
		$smarty->assign("finishedCourses", $finishedCourses);	
		$smarty->assign("solicitudId", $_POST['solicitudId']);	
		
		echo 'ok[#]';
		$smarty->assign("activeCourses", $activeCourses);
		$smarty->display(DOC_ROOT.'/templates/new/view-curricula.tpl');
		exit;
			if($_POST['solicitudId']==''){
				echo 'fail[#]';
				echo '<center><font color="red">Por favor, seleccione el tipo de solicitud</font></center>';
				exit;
			}
		

			

					
			break;
			
			case 'addSaveSolicitud';

				// echo '<pre>'; print_r($_POST);
				$activa = 0;
				$inactiva = 0;
				foreach($_POST as $key=>$aux){
					$g = explode('_',$key);
					if($g[0]=='activa'){
						if($aux=='on'){
							$valoractiva = $g[1];
							$activa++;
						}
					}
					if($g[0]=='finalizada'){
						if($aux=='on'){
							$valorinactiva = $g[1];
							$inactiva++;
						}
					}
				}
				if(($activa+ $inactiva) <= 0){
						echo 'fail[#]';
						echo '<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Debe seleccionar al menos una curricula
						</div>';
					exit;
				}
				
				if(($activa+ $inactiva) > 1){
						echo 'fail[#]';
						echo '<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Solo puede seleccionar una curricula
						</div>';
					exit;
				}
				
				// echo $valoractiva.'___'; 
				// echo $valorinactiva; 
				// echo '<pre>'; print_r($_POST);
				// exit;
				if($valoractiva<>''){
					$cursoId = $valoractiva;
				}
				
				if($valorinactiva<>''){
					$cursoId = $valorinactiva;
				}
				
				// echo $cursoId;
				// exit;
				
				$solicitud->setTipo($_POST['solicitudId']);
				$solicitud->setCursoId($cursoId);
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
