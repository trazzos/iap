<?php

class Speciality extends Main
{
	private $specialityId;
	private $clave;
	private $name;
		
	public function setSpecialityId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->specialityId = $value;
	}
	
	public function setClave($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 1, "Clave");
		$this->clave = $value;
	}
	
	public function setName($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 1, "Nombre");
		$this->name = $value;
	}
	
	public function getSpecialityId()
	{
		return $this->specialityId;
	}
	
	public function getClave($value)	
	{		
		return $this->clave;
	}
	
	public function getName($value)	
	{		
		return $this->name;
	}
	
	public function Enumerate()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					speciality 
				ORDER BY 
					name ASC";
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					speciality 
				WHERE 
					specialityId = '".$this->specialityId."'";
		
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
		
		$row = $this->Util->EncodeRow($info);
		
		return $row;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					speciality 
					(
						clave, 
						name
					)
				VALUES 
				(
					'".utf8_decode($this->clave)."', 
					'".utf8_decode($this->name)."'
				)";	
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10025, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					speciality 
				SET 
					clave =  '".utf8_decode($this->clave)."', 
					name =  '".utf8_decode($this->name)."'
				WHERE 
					specialityId = ".$this->getSpecialityId();	
						
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10027, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					speciality
				WHERE 
					specialityId = ".$this->specialityId;	
						
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10026, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function GetNameById(){
			
		$sql = 'SELECT 
					clave 
				FROM 
					speciality 
				WHERE 
					specialityId = '.$this->specialityId;
			
		$this->Util()->DB()->setQuery($sql);
		
		return $this->Util()->DB()->GetSingle();
				
	}
	
}


?>