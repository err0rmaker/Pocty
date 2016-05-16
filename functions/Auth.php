<?php

class Authentication
{
    /**
     * @var mysqli
     */
    private $conn;

    private $table = 'soupak_uzivatele';

    /**
     * Authentication constructor.
     * @param $DBConn DBConnect
     */
    public function __construct($DBConn)
    {
        $this->conn = $DBConn->getConnection();
    }

    public function authenticate($name, $password)
    {
        $name = $this->conn->real_escape_string($this->clean($name));
        $password = $this->conn->real_escape_string($this->clean($password));
        $sql = "SELECT password FROM {$this->table} WHERE name LIKE '$name'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        echo $name;
        if (password_verify($password, $row['password'])) {
            return true;
        }

        return false;
    }

    private function clean($input)
    {
        $input = strip_tags($input);
        $input = stripslashes($input);
        return $input;
    }

    public function createUserAccount($name, $password)
    {
        if ($this->userExists($name)) {
            throw new RuntimeException('Uzivatel jiz existuje');
        }

        //obrana proti sql injekci
        $name = $this->conn->real_escape_string(strtolower($this->clean($name)));
        $password = $this->conn->real_escape_string($this->clean($password));
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT into {$this->table} (name, password) VALUES ('$name', '$password')";
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }

    public function userExists($name)
    {
        $name = $this->conn->real_escape_string(strtolower($this->clean($name)));
        $sql = "SELECT name from {$this->table} WHERE name = '$name'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 1) {
            throw new Exception('Nalezeno více uživatelů se stejným jménem');
        }
        return $result->num_rows === 1;
    }

    public function isGuest()
    {
        return !array_key_exists('name', $_SESSION);
    }

}
