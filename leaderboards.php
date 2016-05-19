<?php

require_once __DIR__ . '/bootstrap.php';
$message = '';
try {


} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/views/leaderboards.php';
require_once __DIR__ . '/bootstrap.end.php';

