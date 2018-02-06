<?php
class Docente extends Empresa{

	private $id_serie;
	private $id_empresa;
	private $id_rfc;
	private $respuesta;
	private $comentario;
	private $nombre;
	private $descripcion;
	private $Id;

	
	public function setIdSerie($value){
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 1, 'Serie ID');
		$this->id_serie = $value;
	}
	
	
	public function setId($value){
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 1, '');
		$this->Id = $value;
	}

	
	public function setRespuesta($value){
		
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 1, 'Respuesta');
		$this->respuesta = $value;
	}
	
	
	public function setNombre($value){
		
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 1, 'Nombre');
		$this->nombre = $value;
	}
	
	public function setDescripcion($value){
		
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 1, 'Descripcion');
		$this->descripcion = $value;
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
					 <strong> Para poder enviar su evaluación es necesario asignar calificación en cada una de las preguntas, favor de revisar
					 y completar su evaluación.
					 </strong>
					 <br>
					 <br>
					 Pregunta numero '.($key+1).' sin respuesta
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
	
	public function onSaveDocumento()
	{
		
		if ($this->Id){
			 $sql = "
				UPDATE
					catalogodocumento 
				SET 
					nombre = '".$this->nombre."',
					descripcion = '".$this->descripcion."'
				WHERE 
					catalogodocumentoId = ".$this->Id;
					
		
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->ExecuteQuery();
		}else{
			
			$sql = "INSERT INTO 
			catalogodocumento 
			(						
				nombre, 
				descripcion
			)
		 VALUES 
			(						
				'".$this->nombre."',
				'".$this->descripcion."'
			)";
								
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->InsertData();
		}
		
					
		return true;
	}	
	
	public function infoDocumento()
	{
		$sql = 'SELECT * 
				from
					catalogodocumento 
				where
					catalogodocumentoId = '.$this->Id.'';
		$this->Util()->DB()->setQuery($sql);
		$lst = $this->Util()->DB()->GetRow();
		
		return $lst;
	}
	
	public function onDeleteDocumento()
	{
		echo $sql = "
				UPDATE
					catalogodocumento 
				SET 
					estatus = 'eliminado'
				WHERE 
					catalogodocumentoId = ".$this->Id;
					
		
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->ExecuteQuery();
		
		return true;
	}
	
	
	
}//Docente


?>