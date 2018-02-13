<?php

class Encuesta extends Main
{
	private $sucursalId;
	private $identificador;
	
	public function setSucursalId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->sucursalId = $value;
	}
	
	public function getSucursalId()
	{
		return $this->sucursalId;
	}	
	
	public function setIdentificador($value, $checkIfExists = 0)
	{
		$this->Util()->ValidateString($value, $max_chars=300, $minChars = 1, "Identificador");
		$this->identificador = $value;
	}

	public function getIdentificador()
	{
		return $this->identificador;
	}	

	function extraeCuestionario()
	{		
		$this->Util()->DB()->setQuery("
		SELECT * FROM categoria_pregunta where encuestaId = 1");
		$result = $this->Util()->DB()->GetResult();
		$incr = 0;
		foreach($result as $key=>$aux){
			
			$sql = "SELECT * FROM pregunta where categoriapreguntaId = ".$aux['categoriapreguntaId']."";
			$this->Util()->DB()->setQuery($sql);
			$resultPreguntas = $this->Util()->DB()->GetResult();
			foreach($resultPreguntas as $keyp=>$auxp){
				
				if($auxp["tiporespuesta"]=="opcional"){
					unset($opciones);
					$op = explode("_",$auxp["opcional"]);
					for($i=0;$i<=5;$i++){
						if($op[$i]<>""){
							$opciones[] = $op[$i];
						}
					}
					$resultPreguntas[$keyp]["opciones"] = $opciones;
					
				}
				$resultPreguntas[$keyp]["incr"] = $incr;
				$incr++;
			}
			
			$result[$key]['preguntas'] = $resultPreguntas;
		}

		
		// echo '<pre>'; print_r($result);
		// exit;
		return $result;
	}
	
	function promedioXRubro($cModuleId,$courseId)
	{
		$this->Util()->DB()->setQuery("
		SELECT * FROM categoria_pregunta where encuestaId = 1");
		$result = $this->Util()->DB()->GetResult();
		
		// falta pasar el coursemodule
		
		 $sql = "
				SELECT 
					*
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					courseModuleId = ".$cModuleId." group by usuarioId ";
			
		$this->Util()->DB()->setQuery($sql);
		$ta = $this->Util()->DB()->GetSingle();

		$totalAlumnos  = count($ta);
		
		// total de alumnos
		
		
		  $sql = "
				SELECT 
					count(*)
				FROM 
					user_subject
				where 
					courseId = ".$courseId."";
			
		$this->Util()->DB()->setQuery($sql);
		$totalGrupo = $this->Util()->DB()->GetSingle();
		
		// echo $totalGrupo;
		// exit;
		// exit;
		foreach($result as $key=>$aux){
			
			 $sql = "
				SELECT 
					sum(respuesta)
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.categoriapreguntaId = ".$aux['categoriapreguntaId']." and courseModuleId = ".$cModuleId."";
			
			$this->Util()->DB()->setQuery($sql);
			$sumR = $this->Util()->DB()->GetSingle();
			
			 $sql = "
				SELECT 
					count(respuesta)
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.categoriapreguntaId = ".$aux['categoriapreguntaId']." and courseModuleId = ".$cModuleId."";
			
			$this->Util()->DB()->setQuery($sql);
			$countR = $this->Util()->DB()->GetSingle();
			
			
			
			$result[$key]['sumR'] = $sumR;
			@$result[$key]['promedio'] = round($sumR/$countR) ;
		}
			
		$data['result']	= $result;
		$data['totalAlumnos']	= $totalAlumnos;
		$data['totalGrupo']	= $totalGrupo;
			
		return $data;
	}
	
}