<?php

require_once __DIR__ . '/bootstrap.php';
$message = '';
$conn = $conn->getConnection();
$result = $conn->query("SELECT name,score_avg,test_count FROM soupak_uzivatele ORDER BY score_avg DESC LIMIT 10");
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

try {


} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/views/leaderboards.php';
require_once __DIR__ . '/bootstrap.end.php';

