<?php
require __DIR__ . '/../../configuration.php';
require __DIR__ . '/passwordLib/passwordLib.php';


function authenticate($conn, $name, $password)
{


    $name = $conn->real_escape_string($name);
    $password = $conn->real_escape_string($password);
    $sql = "SELECT password FROM soupak_uzivatele WHERE name LIKE '$name'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $conn->close();
        return true;
    }
    return false;



}

function userExists($conn, $name)
{
    $name = $conn->real_escape_string($name);
    $sql = "SELECT name from soupak_uzivatele WHERE name LIKE '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['name'] == $name) {
            return true;
        }
    }


    $conn->close();
    return false;
}

function createUserAccount($conn, $name, $password)
{


    //obrana proti sql injekci
    $name = $conn->real_escape_string($name);
    $password = $conn->real_escape_string($password);


    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT into soupak_uzivatele (name,password) VALUES ('$name', '$password')";
    if ($conn->query($sql)) {

        return true;
    }
    $conn->close();
}
