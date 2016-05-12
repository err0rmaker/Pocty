<?php

/**
 * Class DOConnect
 *
 */
class DBConnect
{
    protected $conn;

    public function __construct($server_name, $username, $password, $DBName)
    {
        $this->conn = new mysqli($server_name, $username, $password, $DBName);
        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

}