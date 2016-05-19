<?php

require_once __DIR__ . '/bootstrap.php';
$message = '';
try {
    $id = $auth->getLoggedInUserId();

    $result = $DB->select('soupak_testy', ['*'], "WHERE id_uzivatel = {$id}");
    if ($result->num_rows === 0) {
        $message = 'Nemáte žádné testy';
    }


} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/views/profile.php';
require_once __DIR__ . '/bootstrap.end.php';

