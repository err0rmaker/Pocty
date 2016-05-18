<?php

require_once __DIR__ . '/Math.class.php';
require_once __DIR__ . '/filterOperation.php';
session_start();
$Math = $_SESSION['math'];


$numberA = $_SESSION['numbers']['numberA'];
$numberB = $_SESSION['numbers']['numberB'];
$sign = $_SESSION['sign'];
$json = [
    'succesful' => false,
    'result' => false,
    'numberA' => 0,
    'numberB' => 0,
    'int_result' => 0
];


if (array_key_exists('result', $_POST)) {
    $result = (int)$_POST['result'];



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
        default :
            throw new Exception("nezname znamenko");

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


}

echo json_encode($json);


