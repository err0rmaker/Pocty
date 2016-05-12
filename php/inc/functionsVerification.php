<?php
require __DIR__ . '/../../configuration.php';
require __DIR__ . '/passwordLib/passwordLib.php';


class Authentication extends DBConnect
{
    public function __construct()
    {
        parent::__construct();
        $this->conn = parent::getConnection();
    }


    public function authenticate($name, $password)
    {


        $name = $this->conn->real_escape_string($name);
        $password = $this->conn->real_escape_string($password);
    $sql = "SELECT password FROM soupak_uzivatele WHERE name LIKE '$name'";
        $result = $this->conn->query($sql);
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $this->conn->close();
        return true;
    }
        $this->conn->close();

    return false;

}

    public function userExists($name)
{
    $name = $this->conn->real_escape_string($name);
    $sql = "SELECT name from soupak_uzivatele WHERE name LIKE '$name'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['name'] == $name) {

            return true;
        }
    }


    return false;
}

    public function createUserAccount($name, $password)
{

    //obrana proti sql injekci
    $name = $this->conn->real_escape_string($name);
    $password = $this->conn->real_escape_string($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT into soupak_uzivatele (name,password) VALUES ('$name', '$password')";
    if ($this->conn->query($sql)) {
        $this->conn->close();
        return true;
    }
    return false;

}

    public function clean($input)
    {
        $input = strip_tags($input);
        $input = stripslashes($input);
        return $input;
    }

}
