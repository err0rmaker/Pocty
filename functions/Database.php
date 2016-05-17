<?php

class Database
{
    /**
     * @var mysqli
     */
    private $conn;

    private $tableUser = 'soupak_uzivatele';
    private $tableTest = 'soupak_testy';

    /**
     * Database constructor.
     * @param $DBConn DBConnect
     */
    public function __construct($DBConn)
    {
        $this->conn = $DBConn->getConnection();
    }


}
