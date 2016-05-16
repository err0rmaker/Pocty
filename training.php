<?php
require_once __DIR__ . '/bootstrap.php';
if (!array_key_exists('numbers', $_SESSION)) {
    $tempSignArr = array('+', '-', '*', '/');
    $sign = generateSign($tempSignArr);
    $_SESSION['sign'] = $sign;
    $_SESSION['numbers'] = generateNumbers($sign);
}
require_once __DIR__ . '/views/training.php';
?>

