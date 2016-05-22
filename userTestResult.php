<?php

require_once __DIR__ . '/bootstrap.php';


$data = [];
$score = 0;
$finalScore = 0;
$currentMaxTestID = getMaxTestID($DB);

$testItemTable = 'soupak_priklady';
$testTable = 'soupak_testy';
if (array_key_exists('result', $_POST) && array_key_exists('testItems', $_SESSION)) {


    $result = $_POST['result'];
    $testItems = $_SESSION['testItems'];
    $correct = '';
    $scoreMax = count($testItems);


    foreach ($testItems as $key => $testItem) {


        list($numberA, $numberB, $sign) = $testItem;

        $calculatedResult = $Math->calculate($numberA, $numberB, $sign);

        $correct = true;
        if ($calculatedResult === (int)$result[$key]) {
            $score++;

        } else {
            $correct = false;
        }


        $tempData['correct'] = $correct;
        $tempData['calcResult'] = (int)$calculatedResult;
        $tempData['result'] = (int)$result[$key];
        $tempData['sign'] = $sign;
        $tempData['numberA'] = (int)$numberA;
        $tempData['numberB'] = (int)$numberB;
        $tempData['id_test'] = (int)$currentMaxTestID;

        insertTestItemIntoDB($DB, $testItemTable, $tempData);

        $data[] = $tempData;
    }


    $finalScore = ($score / $scoreMax) * 100;

    try {
        $DB->insert($testTable, ['id_uzivatel', 'skore'], [$auth->getLoggedInUserId(), $finalScore]);

        updateStats($DB, $finalScore, $auth->getLoggedInUserId());

    } catch (Exception $e) {
        echo $e->getMessage();
    }



    unset($_SESSION['testItems']);


}
/**
 * @param $DB Database
 * @param $finalScore
 * @param $uid
 */
function updateStats($DB, $finalScore, $uid)
{
    $data = $DB->getData($DB->select('soupak_uzivatele', ['score_total', 'test_count'], "WHERE id = {$uid}"));

    $data['score_total'] += (int)$finalScore;
    $data['test_count'] = (int)$data['test_count'] + 1;
    if ((int)$data['score_total'] !== 0 && (int)$data['test_count'] !== 0) {
    $data['score_avg'] = ($data['score_total'] / $data['test_count']);
    }

    $DB->update('soupak_uzivatele', array_keys($data), array_values($data), "WHERE id = {$uid}");

}

/**
 * @param $DB Database
 * @return string
 */
function getMaxTestID($DB)
{
    $data = $DB->getData($DB->select('soupak_testy', ['id'], 'ORDER BY id desc LIMIT 1'));
    return (int)$data['id'];
}

/**
 * @param $DB Database
 * @param $table
 * @param $data
 */
function insertTestItemIntoDB($DB, $table, $data)
{

    $DB->insert($table, array_keys($data), array_values($data));
}

require_once __DIR__ . '/views/userTestResult.php';

require_once __DIR__ . '/bootstrap.end.php';
