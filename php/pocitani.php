<?php

$signArr = array(
    "+",
    "-",
    "*",
    "/",
);

$json = array(
    'succesful' => false,
    'result' => false,
    'numberA' => 0,
    'numberB' => 0,
    'sign' => "+",
    'signPokus' => "+"
);
if (isset($_POST["result"], $_POST["numberA"], $_POST["numberB"], $_POST["sign"])) {
    $result = $_POST["result"];
    $numberA = $_POST["numberA"];
    $numberB = $_POST["numberB"];
    $sign = $_POST["sign"];


    switch ($sign) {
        case "+":
            if (((int)$numberA + (int)$numberB == (int)$result))
                $json["result"] = true;


            break;

        case "-":
            if (((int)$numberA - (int)$numberB == (int)$result))
                $json["result"] = true;

            break;
        case "*":
            if (((double)$numberA * (int)$numberB == (int)$result))
                $json["result"] = true;


            break;
        case "/":
            if (((double)$numberA / (double)$numberB == (double)$result))
                $json["result"] = true;


            break;
    }
    $json["sign"] = $signArr[mt_rand(0, 3)];

    switch ($json["sign"]) {
        case "+":
            $json['numberA'] = mt_rand(1, 100);
            $json['numberB'] = mt_rand(1, 100);

            break;

        case "-":
            $json['numberA'] = mt_rand(1, 100);
            $json['numberB'] = mt_rand(1, 100);
            break;
        case "*":
            $json['numberA'] = mt_rand(1, 10);
            $json['numberB'] = mt_rand(1, 10);


            break;
        case "/":
            do {
                $tempA = mt_rand(2, 81);
                $tempB = mt_rand(2, 9);
            } while (($tempA % $tempB != 0) || $tempA < $tempB);
            $json['numberA'] = $tempA;
            $json['numberB'] = $tempB;
            break;
    }
    $json["succesful"] = true;
}

echo json_encode($json);


