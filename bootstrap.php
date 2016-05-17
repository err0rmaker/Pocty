<?php

session_start();
define('BASE_URL', $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . '/');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME']));
require_once __DIR__ . '/functions/DBConnect.php';
require_once __DIR__ . '/functions/Database.php';
require_once __DIR__ . '/functions/functionsMath.php';
require_once __DIR__ . '/configuration.php';

$conn = new DBConnect(DB_SERVER, DB_USERNAME, DB_PASS, DB_NAME);

require_once __DIR__ . '/lib/passwordLib/passwordLib.php';
require_once __DIR__ . '/functions/Auth.php';
$auth = new Authentication($conn);
$DB = new Database($conn);

echo $auth->isGuest();

if (!preg_match('#\b(index.php|login.php|register.php)\b#', SCRIPT_FILENAME) && $auth->isGuest()) {
    header('Location: login.php');
    exit;
}


include __DIR__ . '/layout/head.php';


