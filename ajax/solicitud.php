<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

// echo '<pre>'; print_r($_POST);
			// exit;

$specialities = $util->EncodeResult($speciality->Enumerate());
$semesters = $util->EncodeResult($semester->Enumerate());

$smarty->assign("DOC_ROOT", DOC_ROOT);

switch($_POST["type"])
{

	case 'buscarSolicitud': 
			
			
			
			$solicitud->setNombre($_POST['alumnoId']);
			$solicitud->setTipoSolicitudId($_POST['tipo']);
			$solicitud->setStatus($_POST['estatus']);
			$registros = $solicitud->enumarateSolicitudesAdmin();
			$smarty->assign("registros", $registros);
			$smarty->display(DOC_ROOT.'/templates/lists/new/solicitud.tpl');
	break;
	
	case 'enviarArchivo';
			
				// echo '<pre>'; print_r($_POST);
				// echo '<pre>'; print_r($_FILES);
				// exit;
				$solicitud->setSolicitudId($_POST['solicitudId']);
				if ($solicitud->enviarArchivoConstancia()){
					echo 'ok[#]';
					echo '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  El Documento se adjunto correctamente
					</div>';
					echo '[#]';
					$registros = $solicitud->enumarateSolicitudesAdmin(); 
					$registrosStudent = $student->EnumerateTotal();
					$lstSolicitudes = $solicitud->arraySolicitudes();
					$smarty->assign("lstSolicitudes", $lstSolicitudes);	
					$smarty->assign("registrosStudent", $registrosStudent);	
					$smarty->assign("registros", $registros);	
					$smarty->display(DOC_ROOT.'/templates/lists/new/solicitud.tpl');
				}else{
					echo 'fail[#]';
				}
			
	break;
		
	
	case 'realizarBaja';
	
		// echo '<pre>'; print_r($_POST);
		if ($solicitud->realizarBaja($_POST['Id'])){
			echo 'ok[#]';
		}else{
			echo 'fail[#]';
		}
			
	break;
	
	
	case 'validarPago';
	
		// echo '<pre>'; print_r($_POST);
		if ($solicitud->validarPago($_POST['Id'])){
			echo 'ok[#]';
		}else{
			echo 'fail[#]';
		}
			
	break;
	
	
	
	case 'validarPagoAdjunto';
	
		// echo '<pre>'; print_r($_POST);
		// echo '<pre>'; print_r($_FILES);
		// exit;
		if ($solicitud->validarPagoAdjunto($_POST['Id'])){
			echo 'ok[#]';
		}else{
			echo 'fail[#]';
		}
			
	break;
		
}
?>