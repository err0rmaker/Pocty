<?php
function authenticate($name, $password)
{
    $conn = DBConnect();
    $name = $conn->real_escape_string($name);
    $password = $conn->real_escape_string($password);
    $sql = "SELECT password FROM uzivatele WHERE name LIKE '$name'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "stuff";
    if (password_verify($password, $row["password"])) {
        echo "<br>";
        echo "im in";

        return true;
    }
    return false;
}

function userExists($name)
{
    $conn = DBConnect();
    $name = $conn->real_escape_string($name);
    $sql = "SELECT name from uzivatele WHERE name LIKE '$name'";
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
    $sql = "INSERT into uzivatele (name,password) VALUES ('$name', '$password')";
    if ($conn->query($sql)) {

        return true;
    }
    $conn->close();
}
