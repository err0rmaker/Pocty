<?php

require_once __DIR__ .'/bootstrap.php';


if (!$auth->isGuest()) {
    header('Location: userTests.php');
    exit;
}


if (array_key_exists('name', $_POST) && array_key_exists('password', $_POST) && $auth->userExists($name)) {
        if ($auth->authenticate($name, $password)) {
            $_SESSION['name'] = $name;
            header('Location: userTests.php');

        } else {
            $message = 'Špatné přihlašovací údaje';
        }
} else {
    $message = 'Vyplňte všechna pole';
}


include __DIR__ . '/views/login.php';