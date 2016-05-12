<?php


class DOConnect
{
    public $conn;

    public function __construct()
    {
        require __DIR__ . '/../../configuration.php';


        $this->conn = new mysqli($serverName, $userName, $password, $DBName);


        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }


    }


    public function getConnection()
    {
        return $this->conn;
    }

}