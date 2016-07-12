<?php

class Schedule extends Main
{
	private $scheduleId;
	private $name;
	private $description;
	
	public function setScheduleId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->scheduleId = $value;
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
	
	public function getScheduleId()
	{
		return $this->scheduleId;
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
		$this->Util()->DB()->setQuery("SELECT * FROM schedule ORDER BY name ASC");
		$result = $this->Util()->DB()->GetResult();
		
		foreach($result as $key => $row)
		{
			$result[$key]["wrappedDescription"] = $this->Util()->ShortString($result[$key]["description"], 50);
		}
		
		return $result;
	}
	
	public function Info()
	{
		$this->Util()->DB()->setQuery("SELECT * FROM schedule WHERE scheduleId = '".$this->scheduleId."'");
		$info = $this->Util()->DB()->GetRow();
		
		$row = $this->Util->EncodeRow($info);
		
		return $row;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sqlQuery = "INSERT INTO schedule (name, description)
					 VALUES ('".utf8_decode($this->getName())."', '".utf8_decode($this->getDescription())."')";		
		$this->Util()->DB()->setQuery($sqlQuery);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10034, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sqlQuery = "UPDATE schedule SET name =  '".utf8_decode($this->getName())."', description = '".utf8_decode($this->getDescription())."'
					 WHERE scheduleId = ".$this->getScheduleId();		
		$this->Util()->DB()->setQuery($sqlQuery);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10036, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sqlQuery = "DELETE FROM schedule
					 WHERE scheduleId = ".$this->getScheduleId();		
		$this->Util()->DB()->setQuery($sqlQuery);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10035, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
}


?>