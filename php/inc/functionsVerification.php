<?php
require "../configuration.php";
require "inc/passwordLib/passwordLib.php";

function authenticate($name, $password)
{

    $conn = DBConnect();
    $name = $conn->real_escape_string($name);
    $password = $conn->real_escape_string($password);
    $sql = "SELECT password FROM soupak_uzivatele WHERE name LIKE '$name'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {

        return true;
    } else {
        return false;
    }
}

function userExists($name)
{
    $conn = DBConnect();
    $name = $conn->real_escape_string($name);
    $sql = "SELECT name from soupak_uzivatele WHERE name LIKE '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["name"] == $name) {
            return true;
        }
    }


    $conn->close();
    return false;
}

function createUserAccount($name, $password)
{


    $conn = DBConnect();
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
