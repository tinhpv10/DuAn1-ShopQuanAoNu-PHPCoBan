<?php

class Database
{
    private $dbhost = "onehost-webhn072403.000nethost.com";
    private $dbname = "lsmuhehthosting_polyonline";
    private $dbuser = "lsmuhehthosting_polyonline";
    private $dbpass = "d-td~a@}.{x2F>D";
    private $dbconnection;

    public function connect()
    {
        $this->dbconnection = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        $this->dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $this->dbconnection;
    }
}
