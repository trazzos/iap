<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	switch($_POST["type"])
	{
		case 'solicitarReferencia':


			$solicitud->setTipo(5);
			if ($solicitud->SaveSolicitud()){
				echo 'ok[#]';
				echo '<br><div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  La Solicitud de tus datos de referencia se ha realizado con exito en breve nos pondremos en contacto contigo
					</div>';
				echo '[#]';
				$sendmail = new SendMail;
				$student->setUserId($_SESSION["User"]["userId"]);
				$info = $student->GetInfo();
				$html .= 'Solicitud de Referencia Bancaria<br><br><br>';
				$html .= '<b>Alumno:</b> '.$info['names'].' '.$info['lastNamePaterno'].' '.$info['lastNameMaterno'].'<br>';
				$html .= '<b>Numero de Control:</b> '.$info['controlNumber'];
				// echo $html;
				$sendmail->PrepareAttachment("Solicitud de Referencia Bancaria", $html, "","", EMAIL_USERNAME, "Finanzas", $attachment, $fileName);
				$sendmail->PrepareAttachment("Solicitud de Referencia Bancaria",$html, "", "", EMAIL_USERNAME, "Administrador", $attachment, $fileName);
			}else{
				echo 'fail[#]';
			}

		break;

		case 'abrirReins':
			echo 'ok[#]';
			// echo '<pre>'; print_r($_POST);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->assign("subjectId", $_POST['subjectId']);
			$smarty->assign("courseId", $_POST['courseId']);
			$smarty->assign("semesterId", $_POST['semesterId']);
			$smarty->display(DOC_ROOT.'/templates/new/confirma-reinscripcion.tpl');
		break;

	}

?>
