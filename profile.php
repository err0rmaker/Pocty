<?php

require_once __DIR__ . '/bootstrap.php';
$message = '';
$dataReady = true;
$data = [];
try {
    $id = $auth->getLoggedInUserId();


    $result = $DB->select('soupak_testy', ['*'], "WHERE id_uzivatel = {$id}");
    if ($result->num_rows === 0) {
        $message = 'Nemáte žádné testy';
        $dataReady = false;
    }
    while ($row = $result->fetch_assoc()) {
        $dates[] = ['date' => (string)strtotime($row['datum']), 'value' => (int)$row['skore']];
        $data[] = $row;

    }
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/views/profile.php';
require_once __DIR__ . '/bootstrap.end.php';

