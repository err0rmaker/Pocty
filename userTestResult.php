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

    try {
        $DB->insert('soupak_testy', ['id_uzivatel', 'skore'], [$auth->getLoggedInUserId(), $finalScore]);


        //update procent testu a poctu testu
        $result = $DB->select('soupak_uzivatele', ['score_avg', 'score_total', 'test_count'], "WHERE id = {$auth->getLoggedInUserId()}");
        
        $row = $result->fetch_assoc();
        $score_total = $row['score_total'];
        $score_total += $finalScore;
        $test_count = $row['test_count'];
        $test_count++;
        $score_avg = $row['score_avg'];

        $score_avg = ($score_total / $test_count);
        $DB->update('soupak_uzivatele', ['score_avg', 'score_total', 'test_count'], [$score_avg, $score_total, $test_count], "WHERE id = {$auth->getLoggedInUserId()}");
    } catch (Exception $e) {
        echo $e->getMessage();
    }



    unset($_SESSION['testItems']);


}

require_once __DIR__ . '/views/userTestResult.php';

require_once __DIR__ . '/bootstrap.end.php';
