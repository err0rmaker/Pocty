<?php

session_start();

require_once __DIR__ . '/functions/DBConnect.php';

require_once __DIR__ . '/configuration.php';

$conn = new DBConnect(DB_SERVER, DB_USERNAME, DB_PASS, DB_NAME);

require_once __DIR__ . '/lib/passwordLib/passwordLib.php';
require_once __DIR__ . '/functions/Auth.php';
$auth = new Authentication($conn);

$_SERVER['SCRIPT_FILENAME'] !== 'login.php' && $auth->isGuest() && header('location: login.php');

include __DIR__ . '/layout/head.php';


