<?php
session_start();
include_once "inc/changeOperation.php";
include_once "inc/functionsMath.php";
$numberA = $_SESSION["numbers"]["numberA"];
$numberB = $_SESSION["numbers"]["numberB"];
$sign = $_SESSION["sign"];
$json = array(
    'succesful' => false,
    'result' => false,
    'numberA' => 0,
    'numberB' => 0,
    'sign' => "+",
    'int_result' => 0
);

$tempSignArr = changeOperation();


if (isset($_POST["result"])) {
    $result = $_POST["result"];
    switch ($sign) {
        case "+":
            if (((int)$numberA + (int)$numberB == (int)$result))
                $json["result"] = true;

            $json["int_result"] = (int)$numberA + (int)$numberB;
            


            break;

        case "-":
            if (((int)$numberA - (int)$numberB == (int)$result))
                $json["result"] = true;

            $json["int_result"] = (int)$numberA - (int)$numberB;

            break;
        case "*":
            if (((double)$numberA * (int)$numberB == (int)$result))
                $json["result"] = true;

            $json["int_result"] = (int)$numberA * (int)$numberB;


            break;
        case "/":
            if (((double)$numberA / (double)$numberB == (double)$result))
                $json["result"] = true;


            $json["int_result"] = (int)$numberA / (int)$numberB;

            break;
    }

    $json["sign"] = generateSign($tempSignArr);
    $numbers = generateNumbers($sign);
    $json["numberA"] = $numbers["numberA"];
    $json["numberB"] = $numbers["numberB"];

    $_SESSION["numbers"]["numberA"] = $json["numberA"];
    $_SESSION["numbers"]["numberB"] = $json["numberB"];
    $_SESSION["sign"] = $json["sign"];
    $json["succesful"] = true;
}


echo json_encode($json);


