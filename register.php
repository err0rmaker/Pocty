<?php

require_once __DIR__ . '/bootstrap.php';
$errorMsg = '';
$message = '';


if (array_key_exists('name', $_POST) && array_key_exists('password', $_POST) && array_key_exists('password2', $_POST)) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];


    if ($password !== $password2) {
        $errorMsg = 'Hesla se neshodují';
    } elseif (strlen($password) < 8) {
        $errorMsg = 'Heslo musí být alespoň 8 znaků dlouhé';


    } else {
        try {
            if ($auth->createUserAccount($name, $password)) {
                header('Location: login.php');
            }
        } catch (RuntimeException $e) {
            $message = $e->getMessage();
        }

    }
} else {
    $errorMsg = 'Vyplňte všechna pole';
}


?>
<?php
require __DIR__ . '/views/register.php';

?>