<?php

class Database
{
    /**
     * @var mysqli
     */
    private $conn;

    //private $tableUser = 'soupak_uzivatele';
    //private $tableTest = 'soupak_testy';

    /**
     * Database constructor.
     * @param $DBConn DBConnect
     */
    public function __construct($DBConn)
    {
        $this->conn = $DBConn->getConnection();
    }

    public function select($target)
    {

        $sql = 'SELECT';
    }

    public function insert($table, $targetValues, $inputValues)
    {
        $sql = "\" INSERT INTO {$table}";
        $sql .= '(';
        $maxInputValues = count($inputValues) - 1;
        $maxTargetValues = count($targetValues) - 1;
        foreach ($targetValues as $key => $value) {
            $sql .= "'$value'";
            ($key === $maxTargetValues) ? $sql .= '' : $sql .= ',';
        }
        $sql .= ') VALUES (';
        foreach ($inputValues as $key => $value) {

            $sql .= "'$value'";
            ($key === $maxInputValues) ? $sql .= '' : $sql .= ',';
        }
        $sql .= ")\"";

        $this->conn->mysqli_query($sql);
    }





}
