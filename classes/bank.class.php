<?php
class Bank extends Module
{

	private $nombre;
	private $Id;

	
	public function setId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->Id = $value;
	}

	
	
	public function setNombre($value)
	{
		$this->Util()->ValidateString($value);
		$this->nombre = $value;
	}
	
	public function getCuentas($value)
	{
		$sqlQuery = 'SELECT 
					* 
				FROM 
					bank_account AS c 
				LEFT JOIN bank AS b ON b.bankId = c.bankId ';

		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}


}	
?>