<?php

require_once __DIR__ . '/bootstrap.php';


$finalTestItems = [];


$score = 0;
$finalScore = 0;

if (array_key_exists('result', $_POST) && array_key_exists('testItems', $_SESSION)) {


    $result = $_POST['result'];
    $testItems = $_SESSION['testItems'];


    $correct = '';
    $scoreMax = count($testItems);


    foreach ($testItems as $key => $testItem) {


        list($numberA, $numberB, $sign) = $testItem;

        $calculatedResult = $Math->calculate($numberA, $numberB, $sign);

        $correct = '';
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

    $DB->insert('soupak_testy', ['id_uzivatel', 'skore'], [$_SESSION['user_id'], $finalScore]);


    //update procent testu a poctu testu
    $result = $DB->select('soupak_uzivatele', ['score_avg', 'score_total', 'test_count'], "WHERE id = {$_SESSION['user_id']}");
    $row = $result->fetch_assoc();
    $score_total = $row['score_total'];
    $score_total += $finalScore;
    $test_count = $row['test_count'];
    $test_count++;
    $score_avg = $row['score_avg'];

    $score_avg = ($score_total / $test_count);

    //$conn2 = $conn->getConnection();
    //$conn2->query("UPDATE soupak_uzivatele  SET score_avg = '$score_avg', score_total = '$score_total',test_count = '$test_count' WHERE id = {$_SESSION['user_id']}");



    unset($_SESSION['testItems']);


}

require_once __DIR__ . '/views/userTestResult.php';

require_once __DIR__ . '/bootstrap.end.php';
