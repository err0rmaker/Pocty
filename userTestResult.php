<?php

require_once __DIR__ . '/bootstrap.php';


$finalTestItems = [];


$score = 0;
$finalScore = 0;

if (array_key_exists('result', $_POST) && array_key_exists('testItems', $_SESSION)) {


    $result = $_POST['result'];
    $testItems = $_SESSION['testItems'];


    $correct = false;
    $scoreMax = count($testItems);


    foreach ($testItems as $key => $testItem) {


        list($numberA, $numberB, $sign) = $testItem;

        $calculatedResult = $Math->calculate($numberA, $numberB, $sign);

        if ($calculatedResult === (int)$result[$key]) {
            $score++;

        } else {
            $correct = 'X';
        }
        $finalScore = ($score / $scoreMax) * 100;

        $tempFinalTestItem['correct'] = $correct;
        $tempFinalTestItem['calcResult'] = $calculatedResult;
        $tempFinalTestItem['result'] = $result[$key];
        $tempFinalTestItem['sign'] = $sign;
        $tempFinalTestItem['numberA'] = $numberA;
        $tempFinalTestItem['numberB'] = $numberB;
        $finalTestItems[] = $tempFinalTestItem;


    }

    $DB->insert('soupak_uzivatele', ['id_uzivatel', 'id_priklad', 'skore'], [10, 10, $finalScore]);
    
    unset($_SESSION['testItems']);


}
require_once __DIR__ . '/views/userTestResult.php';

require_once __DIR__ . '/bootstrap.end.php';
