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

    /**
     * @param $table string
     * @param $targetValues [] string
     * target columns in a database
     * input data
     * @param $condition (s) [] string after WHERE
     * @throws Exception query error
     * @return mysqli_result
     */
    public function select($table, $targetValues, $condition)
    {

        $maxTargetValues = count($targetValues) - 1;

        $sql = 'SELECT ';


        foreach ($targetValues as $key => $value) {
            $sql .= "$value";
            ($key === $maxTargetValues) ? $sql .= '' : $sql .= ',';
        }
        $sql .= ' FROM ' . "$table ";
        $sql .= "$condition";


        if (!$result = $this->conn->query($sql)) {
            echo $sql;
            throw new Exception('Při vykonávání dotazu se vyskytla chyba');


        }
        return $result;


    }

    /**
     * @param $table string
     * @param $targetValues [] target columns in a database
     * @param $inputValues [] input data
     * @throws Exception query error
     * @return mysqli_result
     */
    public function insert($table, $targetValues, $inputValues)
    {
        $sql = "INSERT INTO $table ";
        $sql .= '(';
        $maxInputValues = count($inputValues) - 1;
        $maxTargetValues = count($targetValues) - 1;
        foreach ($targetValues as $key => $value) {
            $sql .= "$value";
            ($key === $maxTargetValues) ? $sql .= '' : $sql .= ',';
        }
        $sql .= ') VALUES (';
        foreach ($inputValues as $key => $value) {

            $sql .= '\'' . "$value" . '\'';
            ($key === $maxInputValues) ? $sql .= '' : $sql .= ',';
        }
        $sql .= ')';

        $result = $this->conn->query($sql);

        if (!$result) {
            echo 'chyba';
            throw new Exception('Při vykonávání dotazu se vyskytla chyba');
        }

        return $result;

    }

    public function update($table, $targetValues, $inputValues, $condition)
    {
        $maxInputValues = count($inputValues) - 1;
        $maxTargetValues = count($targetValues) - 1;

        if ($maxInputValues !== $maxTargetValues) {
            throw new Exception['input and target values must be the same size'];
        }
        $sql = "UPDATE $table SET";

        foreach ($inputValues as $key => $value) {
            $sql .= $value . ' = ';
            $sql .= '\'' . "$targetValues[$key]" . '\'';
            ($key === $maxInputValues) ? $sql .= '' : $sql .= ',';
        }

    }

    /**
     * @param $result mysqli_result
     * @return array string data from
     */
    public function getData($result)
    {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }





}
