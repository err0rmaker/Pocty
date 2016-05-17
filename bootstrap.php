<?php

session_start();
define('BASE_URL', $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . '/');
require_once __DIR__ . '/functions/DBConnect.php';
require_once __DIR__ . '/functions/functionsMath.php';
//echo $_SERVER['SERVER_NAME'];
require_once __DIR__ . '/configuration.php';

$conn = new DBConnect(DB_SERVER, DB_USERNAME, DB_PASS, DB_NAME);

require_once __DIR__ . '/lib/passwordLib/passwordLib.php';
require_once __DIR__ . '/functions/Auth.php';
$auth = new Authentication($conn);

//$_SERVER['SCRIPT_FILENAME'] !== 'login.php' && $auth->isGuest() && header('location: login.php');
//if($_SERVER['SCRIPT_FILENAME']){}

switch ($_SERVER['SCRIPT_FILENAME']) {
    case 'index.php':
        header('location: training.php');
        break;

}
include __DIR__ . '/layout/head.php';


