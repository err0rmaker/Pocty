<?php
require_once __DIR__ . '/bootstrap.php';
$count = 10;
if (array_key_exists('count', $_POST)) {
    $count = $_POST['count'];
}

$testItems = [];
if (!array_key_exists('testItems', $_SESSION)) {


    for ($i = 0; $i < $count; $i++) {
        $testItems[] = generateTestItem($Math);
    }
    $_SESSION['testItems'] = $testItems;
}
$testItems = $_SESSION['testItems'];


require_once __DIR__ . '/views/userTest.php';


function generateTestItem($Math)
{

    $signArr = [];

    if (array_key_exists('mode', $_POST)) {
        $mode = $_POST['mode'];
        unset($signArr);
        foreach ($mode as $sign => $value) {
            if ((int)$value === 1) {
                switch ($sign) {
                    case 'plus':
                        $signArr[] = '+';
                        break;
                    case 'minus':
                        $signArr[] = '-';
                        break;
                    case 'multiply':
                        $signArr[] = '*';
                        break;
                    case 'divide':
                        $signArr[] = '/';
                        break;
                }
            }
        }

    }
    if (!isset($signArr)) {
        $signArr = array('+', '+', '*', '/');
    }
    $sign = $Math->generateSign($signArr);
    $numbers = $Math->generateNumbers($sign);
    return array($numbers['numberA'], $numbers['numberB'], $sign);

}

require __DIR__ . '/bootstrap.end.php';
