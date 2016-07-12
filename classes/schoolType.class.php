<?php 

class SchoolType extends Main
{
	private $schtypId;
	private $clave;
	private $name;

	public function setSchtypId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->schtypId = $value;
	}

	public function getSchtypId()
	{
		return $this->schtypId;
	}

	public function setClave($value)
	{
		$this->Util()->ValidateString($value, 10000, 1, 'Clave');
		$this->clave = $value;
	}

	public function getClave()
	{
		return $this->clave;
	}

	public function setName($value)
	{
		$this->Util()->ValidateString($value, 10000, 1, 'Nombre');
		$this->name = $value;
	}

	public function getName()
	{
		return $this->name;
	}

	public function Enumerate()
	{
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM school_type');
		$total = $this->Util()->DB()->GetSingle();

		$pages = $this->Util->HandleMultipages($this->page, $total ,WEB_ROOT."/school-type");

		$sql_add = "LIMIT ".$pages["start"].", ".$pages["items_per_page"];
		$this->Util()->DB()->setQuery('SELECT * FROM school_type ORDER BY schtypId ASC '.$sql_add);
		$result = $this->Util()->DB()->GetResult();

		foreach($result as $key => $row)
		{
		}
		$data["items"] = $result;
		$data["pages"] = $pages;
		return $data;
	}
	
	public function EnumerateAll()
	{				
		$this->Util()->DB()->setQuery('SELECT * FROM school_type ORDER BY schtypId ASC ');
		$result = $this->Util()->DB()->GetResult();
	
		return $result;
	}

	public function Info()
	{
		$this->Util()->DB()->setQuery("SELECT * FROM school_type WHERE schtypId = '".$this->schtypId."'");
		$row = $this->Util()->DB()->GetRow();
		return $row;
	}

	public function Edit()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			UPDATE
				school_type
			SET				
				`clave` = '".utf8_decode($this->clave)."',
				`name` = '".utf8_decode($this->name)."'
			WHERE schtypId = '".$this->schtypId."'");
		$this->Util()->DB()->UpdateData();

		$this->Util()->setError(10067, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Save()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			INSERT INTO
				school_type
			(
				`schtypId`,
				`clave`,
				`name`
		)
		VALUES
		(
				'".$this->schtypId."',
				'".utf8_decode($this->clave)."',
				'".utf8_decode($this->name)."'
		);");
		$this->Util()->DB()->InsertData();
		$this->Util()->setError(10065, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Delete()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			DELETE FROM
				school_type
			WHERE
				schtypId = '".$this->schtypId."'");
		$this->Util()->DB()->DeleteData();
		$this->Util()->setError(10066, "complete");
		$this->Util()->PrintErrors();
		return true;
	}
	
	public function GetClaveById(){
			
		$sql = 'SELECT 
					clave
				FROM 
					school_type 
				WHERE 
					schtypId = '.$this->schtypId;
		
		$this->Util()->DB()->setQuery($sql);
		
		return $this->Util()->DB()->GetSingle();
		
	}
	
	public function GetNameById(){
			
		$sql = 'SELECT 
					clave
				FROM 
					school_type 
				WHERE 
					schtypId = '.$this->schtypId;
		
		$this->Util()->DB()->setQuery($sql);
		
		return $this->Util()->DB()->GetSingle();
		
	}

}

?>