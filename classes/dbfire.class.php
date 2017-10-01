<?php

class Dbfire
{
	public $query = NULL;
	private $sqlResult = NULL;
	
	private $conn_id = false;

	private $sqlHost;
	private $sqlDatabase;
	private $sqlUser;
	private $sqlPassword;
	
	private $projectStatus = "test";
	
	public function setSqlHost($value)
	{
		$this->sqlHost = $value;
	}
	
	public function getSqlHost()
	{
		return $this->sqlHost;
	}

	public function setSqlDatabase($value)
	{
		$this->sqlDatabase = $value;
	}
	
	public function getSqlDatabase()
	{
		return $this->sqlDatabase;
	}

	public function setSqlUser($value)
	{
		$this->sqlUser = $value;
	}
	
	public function getSqlUser()
	{
		return $this->sqlUser;
	}

	public function setSqlPassword($value)
	{
		$this->sqlPassword = $value;
	}
	
	public function getSqlPassword()
	{
		return $this->sqlPassword;
	}

	public function setQuery($value)
	{
		$this->query = $value;
	}
	
	public function getQuery()
	{
		return $this->query;
	}

	public function setProjectStatus($value)
	{
		$this->projectStatus = $value;
	}
	
	public function getProjectStatus()
	{
		return $this->projectStatus;
	}


	
	function __construct()
	{
		$this->sqlHost = SQL_HOST_SS_TOREO;
		$this->sqlDatabase = SQL_DB_SS_TOREO;
		$this->sqlUser = SQL_USER_SS_TOREO;
		$this->sqlPassword = SQL_PASS_SS_TOREO;
	}

  public function DatabaseConnect() 
	{
   // $connInfo = array(
	// "Database" => SQL_DB_SS_TOREO,
	// "UID" => SQL_USER_SS_TOREO,
	// "PWD" => SQL_PASS_SS_TOREO
	// );
	// $this->conn_id = $link = sqlsrv_connect(SQL_HOST_SS_TOREO, $connInfo) or die("No se pudo conectar");
	

		$host = 'localhost:C:\wamp\www\fdb\SCHOOLFDB.FDB';
		$this->conn_id = ibase_connect($host,'SYSDBA', 'masterkey');
	

	}
	
	
	public function ExecuteQuery()
	{
  	if(!$this->conn_id)
   	  $this->DatabaseConnect();
			
	// echo $this->query;
		//TODO we might want to add some security in the queries here, but that can be done later, this is the place

		if($this->projectStatus == "test")
		{
				// echo "<br><br>".$this->query."<br><br>";
				// echo '<pre>'; print_r(debug_backtrace());
	    	$this->sqlResult= ibase_query($this->conn_id,$this->query) or die(print_r(sqlsrv_errors()));
			// exit;
		}	
		else
		{
			$this->sqlResult = ibase_query($this->conn_id,$this->query) or die(print_r(sqlsrv_errors()));
		}
		
	}
	

	function GetResult()
	{
  	$retArray = array();

	$this->ExecuteQuery();
		
	  while($rs=ibase_fetch_assoc($this->sqlResult)) 
		{
	    	$retArray[] = $rs;
		}	

		// echo '<pre>'; print_r($retArray);
		// exit;
    $this->CleanQuery();

    return $retArray;
	}
	
	
	function GetRow()
	{
	  $this->ExecuteQuery();
	  $rs=ibase_fetch_assoc($this->sqlResult);
      $this->CleanQuery();
	  
    return $rs;
  }
		
	
	function CleanQuery()
	{
	@mysql_free_result($this->sqlResult);
    //$this->query = "";
	}
	
	
}

?>