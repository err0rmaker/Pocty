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
        $sql = "SELECT id,password FROM {$this->table} WHERE name = '$name'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['name'] = $name;
            $_SESSION['user_id'] = $row['id'];
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

        $name = $this->conn->real_escape_string(strtolower($this->clean($name)));
        $password = $this->conn->real_escape_string($this->clean($password));
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT into {$this->table} (name, password) VALUES ('$name', '$password')";
        echo $sql;
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

    public function getLoggedInUserName()
    {
        return $_SESSION['name'];

    }

    public function getLoggedInUserId()
    {
        return $_SESSION['user_id'];

    }


}
