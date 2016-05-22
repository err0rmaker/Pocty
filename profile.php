<?php

require_once __DIR__ . '/bootstrap.php';

$id = $auth->getLoggedInUserId();

$message = '';
$dataReady = true;
$data = [];
$dataUser = [];
try {

    $data = $DB->getData($DB->select('soupak_uzivatele', ['score_avg', 'test_count'], "WHERE id = {$id}"));
    $dataUser['score_avg'] = $data['score_avg'];
    $dataUser['test_count'] = $data['test_count'];


    if (!$data = $DB->getData($DB->select('soupak_testy', ['*'], "WHERE id_uzivatel = {$id}"))) {
        $message = 'Nemáte žádný test';
    }
    foreach ($data as $value) {
        $dataHeatMap[] = ['date' => (string)strtotime($value['datum']), 'value' => (int)$value['skore']];
    }
} catch (Exception $e) {
    echo $e->getMessage();
}


require_once __DIR__ . '/views/profile.php';
require_once __DIR__ . '/bootstrap.end.php';

