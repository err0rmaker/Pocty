<?php

require_once __DIR__ . '/bootstrap.php';
$message = '';
$result = $DB->select('soupak_uzivatele', ['name', 'score_avg', 'test_count'], 'ORDER BY score_avg DESC LIMIT 10');

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

try {


} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/views/leaderboards.php';
require_once __DIR__ . '/bootstrap.end.php';

