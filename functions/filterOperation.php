<?php
function filterOperations()
{
    $signArr = [
        '+' => true,
        '-' => true,
        '*' => true,
        '/' => true,
    ];
    if (!array_key_exists($_POST, 'mode_plus') && !array_key_exists($_POST, 'mode_minus') && !array_key_exists($_POST, 'mode_multiply') && !array_key_exists($_POST, 'mode_divide')) {
        $tempSignArr = ['+', '-', '*', '/'];
    }
    if (array_key_exists($_POST, 'mode_plus')) {
        $signArr['+'] = true;
    } else {
        $signArr['+'] = false;

    }
    if (array_key_exists($_POST, 'mode_minus')) {
        $signArr['-'] = true;
    } else {
        $signArr['-'] = false;

    }
    if (array_key_exists($_POST, 'mode_multiply')) {
        $signArr['*'] = true;
    } else {
        $signArr['*'] = false;

    }
    if (array_key_exists($_POST, 'mode_divide')) {
        $signArr['/'] = true;
    } else {
        $signArr['/'] = false;

    }
    $tempSignArr = [];

    foreach ($signArr as $key => $value) {
        if ($value == true) {
            $tempSignArr[] = $key;
        }
    }
    
    return $tempSignArr;
}