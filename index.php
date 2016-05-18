<?php
require_once __DIR__ . '/bootstrap.php';
if (!array_key_exists('numbers', $_SESSION)) {
    $tempSignArr = array('+', '-', '*', '/');
    $sign = $Math->generateSign($tempSignArr);
    $_SESSION['sign'] = $sign;
    $_SESSION['numbers'] = $Math->generateNumbers($sign);
}
require_once __DIR__ . '/views/index.php';

?>

