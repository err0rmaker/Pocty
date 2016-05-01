<?php
function generateSign($tempSignArr)
{
    return $tempSignArr[mt_rand(0, sizeof($tempSignArr) - 1)];
}

function generateNumbers($sign)
{
    switch ($sign) {
        case "+":
            $numbers['numberA'] = mt_rand(1, 100);
            $numbers['numberB'] = mt_rand(1, 100);

            break;

        case "-":
            $numbers['numberA'] = mt_rand(1, 100);
            $numbers['numberB'] = mt_rand(1, 100);
            break;
        case "*":
            $numbers['numberA'] = mt_rand(1, 10);
            $numbers['numberB'] = mt_rand(1, 10);


            break;
        case "/":
            do {
                $tempA = mt_rand(2, 81);
                $tempB = mt_rand(2, 9);
            } while (($tempA % $tempB != 0) || $tempA < $tempB);
            $numbers['numberA'] = $tempA;
            $numbers['numberB'] = $tempB;
            break;
    }
    return $numbers;
}