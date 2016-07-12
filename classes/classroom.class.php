<?php

class Classroom extends Main
{
	private $classroomId;
	private $clave;
	private $name;
	private $description;
		
	public function setClassroomId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->classroomId = $value;
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
	
	public function setDescription($value)
	{
		$this->Util()->ValidateString($value, $max_chars=300, $minChars = 0, "Descripcion");
		$this->description = $value;
	}
	
	public function getClassroomId()
	{
		return $this->classroomId;
	}
	
	public function getClave()
	{
		return $this->clave;
	}
		
	public function getName($value)	
	{		
		return $this->name;
	}
	
	public function getDescription($value)	
	{		
		return $this->description;
	}

	public function Enumerate()
	{
		global $position;
		
		$sql = "SELECT 
					* 
				FROM 
					classroom				 
				ORDER BY 
					name ASC";
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		foreach($result as $key => $row)
		{
			$result[$key]["wrappedDescription"] = $this->Util()->ShortString($result[$key]["description"], 50);
		}
		
		return $result;
	}
	
			
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					classroom 
				WHERE 
					classroomId = '".$this->classroomId."'";
	
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
					classroom 
					(	
						clave,					
						name, 
						description
					)
				 VALUES 
					(						
						'".utf8_decode($this->clave)."',
						'".utf8_decode($this->name)."', 
						'".utf8_decode($this->description)."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
				
		$this->Util()->setError(10050, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					classroom SET clave =  '".utf8_decode($this->clave)."', 
					name =  '".utf8_decode($this->name)."', 
					description = '".utf8_decode($this->description)."'
				WHERE 
					classroomId = ".$this->classroomId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10052, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					classroom
				WHERE 
					classroomId = ".$this->classroomId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
				
		$this->Util()->setError(10051, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function GetClaveById(){
			
		$sql = 'SELECT 
					clave
				FROM 
					classroom 
				WHERE 
					classroomId = '.$this->classroomId;
		
		$this->Util()->DB()->setQuery($sql);
		
		return $this->Util()->DB()->GetSingle();
		
	}
	
	public function GetNameById(){
			
		$sql = 'SELECT 
					clave
				FROM 
					classroom 
				WHERE 
					classroomId = '.$this->classroomId;
		
		$this->Util()->DB()->setQuery($sql);
		
		return $this->Util()->DB()->GetSingle();
		
	}
	
		
}


?>