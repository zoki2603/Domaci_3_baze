<?php

class DB
{
    private static $instance = null;
    private $conn;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbName = "shop";


    private function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbName);
    }


    public static function getInstance()
    {

        if (self::$instance == null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
