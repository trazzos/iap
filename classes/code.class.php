<?php

class Code extends Main
{
	private $codeId;
	private $clave;
	private $name;
		
	public function setCodeId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->codeId = $value;
	}
		
	public function setClave($value)
		{
			$this->Util()->ValidateString($value, 10, 1, "Clave");
			$this->clave = $value;
		}
		
	public function setName($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 1, "Nombre");
		$this->name = $value;
	}
	
		
	public function getCodeId()
	{
		return $this->codeId;
	}
	
	public function getClave()
	{
		return $this->clave;
	}
		
	public function getName($value)	
	{		
		return $this->name;
	}
	
	public function Enumerate()
	{
		global $position;
		
		$sql = "SELECT 
					* 
				FROM 
					cancel_code				
				ORDER BY 
					clave ASC";
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
						
		return $result;
	}
			
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					cancel_code 
				WHERE 
					codeId = '".$this->codeId."'";
	
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
					cancel_code 
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
		$codeId = $this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10061, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					cancel_code SET clave =  '".utf8_decode($this->clave)."', 
					name =  '".utf8_decode($this->name)."'
				WHERE 
					codeId = ".$this->codeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10063, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					cancel_code
				WHERE 
					codeId = ".$this->codeId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10062, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function GetClaveById(){
			
		$sql = 'SELECT 
					clave
				FROM 
					cancel_code 
				WHERE 
					codeId = '.$this->codeId;
		
		$this->Util()->DB()->setQuery($sql);
		
		return $this->Util()->DB()->GetSingle();
		
	}
	
	public function GetNameById(){
			
		$sql = 'SELECT 
					clave
				FROM 
					cancel_code 
				WHERE 
					codeId = '.$this->codeId;
		
		$this->Util()->DB()->setQuery($sql);
		
		return $this->Util()->DB()->GetSingle();
		
	}
	
			
}


?>