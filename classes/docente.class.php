<?php
class Docente extends Empresa{

	private $id_serie;
	private $id_empresa;
	private $id_rfc;
	private $respuesta;
	private $comentario;

	
	public function setIdSerie($value){
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 1, 'Serie ID');
		$this->id_serie = $value;
	}
	

	
	public function setRespuesta($value){
		
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 1, 'Respuesta');
		$this->respuesta = $value;
	}
	
	public function setComentario($value){
		
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, '');
		$this->comentario = $value;
	}
	
	
	function SaveEncuesta($courseModuleId,$personalId){
	
		$sql = 'SELECT * 
				from
					pregunta 
				where
					encuestaId = 1 and tiporespuesta = "opcional"';
		$this->Util()->DB()->setQuery($sql);
		$lst = $this->Util()->DB()->GetResult();
		
		
		
		foreach($lst as $key=>$aux){
				if($_POST['check_'.$aux['preguntaId']] ==""){
					echo 'fail[#]';
					echo '<div class="alert alert-warning alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					 <strong> Para poder enviar su evaluación es necesario asignar calificación en cada una de las preguntas, favor de revisar y completar su evaluación
					 </strong><br>La pregunta numero '.($key+1).' se encuentra sin respuesta
					</div>';
					exit;
				}
		}
		
		// if($_POST['comentario']){
			// echo 'fail[#]';
			// echo '<div class="alert alert-warning alert-dismissable">
					  // <button type="button" class="close" data-dismiss="alert">&times;</button>
					  // <strong>La pregunta numero '.($key+1).' se encuentra sin respuesta</strong>
					// </div>';
			// exit;
		// }
		
		
		
		
		foreach($_POST as $key=>$aux){
			
			$r = explode("_",$key);
			if($r[0]=="check"){

				$this->setRespuesta($aux);
				 $sql = 'INSERT INTO resultado (
						preguntaId, 
						respuesta, 
						encuestaId, 
						courseModuleId, 
						profesorId, 
						usuarioId
					)
					VALUES(
						"'.$r[1].'",
						"'.$this->respuesta.'",
						1,
						"'.$courseModuleId.'",
						"'.$personalId.'",
						'.$_SESSION["User"]["userId"].'
					)';

					$this->Util()->DB()->setQuery($sql);
					$this->id = $this->Util()->DB()->InsertData();
			}
		}
		
		
		$sql = "INSERT INTO
							eval_alumno_docente
							( 	
								courseModuleId,
								docenteId,
								comentario,
								alumnoId
							)
						VALUES (
								'".$courseModuleId. "', 
								'".$personalId. "',
								'".$this->comentario. "',
                                '".$_SESSION["User"]["userId"]."'
							)";
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();

		return true;

		
	}
	
}//Docente


?>