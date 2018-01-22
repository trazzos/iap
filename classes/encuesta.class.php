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
}