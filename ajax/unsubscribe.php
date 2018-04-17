<?php
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	switch($_POST["type"])
	{
	
	
      case "saveBaja":
	  
			if($_POST['tipobaja']==''){
				echo 'fail[#]';
				echo '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  Campor requerido: Tipo de baja
				</div>';
				exit;
			}
			
			if($_POST['motivo']==''){
				echo 'fail[#]';
				echo '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  Campor requerido: Motivo
				</div>';
				exit;
			}
			
			$student->setMotivo($_POST['motivo']);
			$student->setTipoBaja($_POST['tipobaja']);
			if ($student->saveBaja()){
				echo 'ok[#]';
			}else{
				echo 'fail[#]';
			}
				
						
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/report-calificacion.tpl');
	 
	  break; 
		
	
	}

?>


