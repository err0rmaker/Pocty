<?php
function filterOperations()
{
    $signArr = [
        '+' => true,
        '-' => true,
        '*' => true,
        '/' => true,
    ];
    $tempSignArr = [];
    if (!array_key_exists('mode_plus', $_POST) && !array_key_exists('mode_minus', $_POST) && !array_key_exists('mode_multiply', $_POST) && !array_key_exists('mode_divide', $_POST)) {
        $tempSignArr = ['+', '-', '*', '/'];
    }
    if (array_key_exists('mode_plus', $_POST)) {
        $signArr['+'] = true;
    } else {
        $signArr['+'] = false;

    }
    if (array_key_exists('mode_minus', $_POST)) {
        $signArr['-'] = true;
    } else {
        $signArr['-'] = false;

    }
    if (array_key_exists('mode_multiply', $_POST)) {
        $signArr['*'] = true;
    } else {
        $signArr['*'] = false;

    }
    if (array_key_exists('mode_divide', $_POST)) {
        $signArr['/'] = true;
    } else {
        $signArr['/'] = false;

    }


    foreach ($signArr as $key => $value) {
        if ($value === true) {
            $tempSignArr[] = $key;
        }
    }
    
    return $tempSignArr;
}