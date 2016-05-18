<?php

require_once __DIR__ .'/bootstrap.php';

$message = '';
if (!$auth->isGuest()) {
    header('Location: userTests.php');
    exit;
}

try {
    if (array_key_exists('name', $_POST) && array_key_exists('password', $_POST) && $auth->userExists($_POST['name'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        if ($auth->authenticate($name, $password)) {
            $_SESSION['name'] = $name;

            header('Location: userTests.php');
            exit;

        } else {
            $message = 'Špatné přihlašovací údaje';
        }
    }
} catch (Exception $e) {
    $message = $e->getMesage();
}

include __DIR__ . '/views/login.php';
require_once __DIR__ . '/bootstrap.end.php';