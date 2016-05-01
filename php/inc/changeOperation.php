<?php
function changeOperation()
{
    $signArr = array(
        "+" => true,
        "-" => true,
        "*" => true,
        "/" => true,
    );
    if (empty($_POST["mode_plus"]) && empty($_POST["mode_minus"]) && empty($_POST["mode_multiply"]) && empty($_POST["mode_divide"])) {


        $tempSignArr = array("+", "-", "*", "/");


    }
    if (isset($_POST["mode_plus"])) {
        $signArr["+"] = true;
    } else {
        $signArr["+"] = false;

    }
    if (isset($_POST["mode_minus"])) {
        $signArr["-"] = true;
    } else {
        $signArr["-"] = false;

    }
    if (isset($_POST["mode_multiply"])) {
        $signArr["*"] = true;
    } else {
        $signArr["*"] = false;

    }
    if (isset($_POST["mode_divide"])) {
        $signArr["/"] = true;
    } else {
        $signArr["/"] = false;

    }


    foreach ($signArr as $key => $value) {
        //echo $value;
        if ($value == true) {
            //echo $key;
            $tempSignArr[] = $key;
        }


    }
    return $tempSignArr;
}