<?php
session_start();
require_once __DIR__ . '/filterOperation.php';
require_once __DIR__ . '/Math.class.php';

$numberA = $_SESSION['numbers']['numberA'];
$numberB = $_SESSION['numbers']['numberB'];
$sign = $_SESSION['sign'];
$json = array(
    'succesful' => false,
    'result' => false,
    'numberA' => 0,
    'numberB' => 0,
    'int_result' => 0
);


if (array_key_exists('result', $_POST)) {
    $result = $_POST['result'];
    try {
        $Math->validate($result);


    switch ($sign) {
        case '+':
            if ((int)$numberA + (int)$numberB === (int)$result) {
                $json['result'] = true;
            }

            $json['int_result'] = (int)$numberA + (int)$numberB;

            break;

        case '-':
            if ((int)$numberA - (int)$numberB === (int)$result) {
                $json['result'] = true;
            }

            $json['int_result'] = (int)$numberA - (int)$numberB;

            break;
        case '*':
            if ((int)$numberA * (int)$numberB === (int)$result) {
                $json['result'] = true;
            }
            $json['int_result'] = (int)$numberA * (int)$numberB;


            break;
        case '/':
            if ((double)$numberA / (double)$numberB === (double)$result) {
                $json['result'] = true;

            }

            $json['int_result'] = (double)$numberA / (double)$numberB;

            break;
    }
    $tempSignArr = filterOperations();
        $sign = $Math->generateSign($tempSignArr);
        $numbers = $Math->generateNumbers($sign);

    $_SESSION['numbers']['numberA'] = $numbers['numberA'];
    $_SESSION['numbers']['numberB'] = $numbers['numberB'];
    $_SESSION['sign'] = $sign;

    $json['numberA'] = $numbers['numberA'];
    $json['numberB'] = $numbers['numberB'];
    $json['sign'] = $sign;
    $json['succesful'] = true;

    } catch (InvalidArgumentException $e) {
        $json['succesful'] = false;
    }
}


echo json_encode($json);


