<?php

class DB
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
        $this->sqlHost = SQL_HOST;
        $this->sqlDatabase = SQL_DATABASE;
        $this->sqlUser = SQL_USER;
        $this->sqlPassword = SQL_PASSWORD;
    }

    public function DatabaseConnect(){
        $this->conn_id = mysqli_connect($this->sqlHost, $this->sqlUser, $this->sqlPassword, $this->sqlDatabase);
        //mysqli_select_db($this->conn_id) or die("<br/>".mysqli_error()."<br/>");
    }

    public function ExecuteQuery()
    {
        if(!$this->conn_id)
            $this->DatabaseConnect();

        if(DEBUG_MODE) {
            var_dump($this->query);
        }

        mysqli_query($this->conn_id, "SET NAMES 'utf8'");
        $this->sqlResult = mysqli_query($this->conn_id, $this->query)  or die (trigger_error(mysqli_error($this->conn_id)));		;
    }

    function GetResult()
    {
        $retArray = array();

        $this->ExecuteQuery();

        while($rs=mysqli_fetch_assoc($this->sqlResult))
        {
            $retArray[] = $rs;
        }

        $this->CleanQuery();

        return $retArray;
    }

    function GetTotalRows()
    {
        $this->ExecuteQuery();

        return mysqli_num_rows($this->sqlResult);
    }

    function GetRow()
    {
        $this->ExecuteQuery();
        $rs=mysqli_fetch_assoc($this->sqlResult);
        $this->CleanQuery();

        return $rs;
    }

    function GetSingle() {
        $this->ExecuteQuery();

        $rs = @mysqli_fetch_array($this->sqlResult);

        if(!$rs) {
            return 0;
        }

        $rs = $rs[0];

        $this->CleanQuery();

        return $rs;
    }

    function InsertData()
    {
        $this->ExecuteQuery();
        $last_id=mysqli_insert_id($this->conn_id);

        $this->CleanQuery();

        return $last_id;
    }

    function UpdateData()
    {
        $this->ExecuteQuery();

        $return = mysqli_affected_rows($this->conn_id);

        $this->CleanQuery();

        return $return;
    }

    function DeleteData()
    {
        return $this->UpdateData();
    }

    function CleanQuery()
    {
        @mysqli_free_result($this->sqlResult);
        @mysqli_close($this->conn_id);
        unset($this->conn_id);
        //$this->query = "";
    }

    function EnumSelect( $table , $field )
    {
        $this->query = "SHOW COLUMNS FROM `$table` LIKE '$field' ";
        $this->ExecuteQuery();

        $row = mysqli_fetch_array( $this->sqlResult , MYSQLI_NUM );
        $regex = "/'(.*?)'/";

        preg_match_all( $regex , $row[1], $enum_array );
        $enum_fields = $enum_array[1];

        return( $enum_fields );
    }
}

?>