<?php
require_once __DIR__ . '/bootstrap.php';

?>
    <div class="container text-center ">
        <div class="row">
            <div class="col-xs-offset-4 col-xs-4 ">
                <h3>Test</h3>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3" id="tests">

                <?php

                if (array_key_exists('count', $_POST)) {
                    $count = $_POST['count'];
                    $testItems = [];
                    if (!array_key_exists('testItems', $_SESSION)) {


                        for ($i = 0; $i < $count; $i++) {
                            $testItems[] = generateTestItem();
                        }
                        $_SESSION['testItems'] = $testItems;
                    }
                    $testItems = $_SESSION['testItems'];
                    echo '<pre>';
                    //var_dump($testItems[0]);
                    echo '<pre>';
                    echo "<form method='post' action='userTest.php'>";
                    for ($i = 0, $iMax = count($testItems); $i < $iMax; $i++) {
                        $numberA = $testItems[$i][0];
                        $numberB = $testItems[$i][1];
                        $sign = $testItems[$i][2];


                        echo "<div class='form-group'>";
                        echo "<label for=testItem>{$numberA} {$sign} {$numberB}</label>";
                        echo "<input  class='form-control' type='number' name='result[]' id = 'testItem'>";
                        //echo "<input type='hidden' name='previous[]' value='{$numberA}|{$numberB}|{$sign}'>
                        echo '</div>';

                    }
                    ?>
                    <label for='submitTest'>Zkontrolovat</label>
                    <input class='btn btn-default' type='submit' id='submitTest'>
                    </form>
                    <?php

                }
                if (array_key_exists('testItems', $_SESSION)) {
                if (array_key_exists('result', $_POST)) {


                $result = $_POST['result'];
                $score = 0;
                $previous = $_SESSION['testItems'];
                //echo '<pre>';
                //print_r($previous);
                //echo '</pre>';
                unset($_SESSION['testItems']);
                $scoreMax = count($previous);
                //var_dump($previous);
                ?>
                <table class='table'>
                    <tr>
                        <th>Příklad</th>
                        <th>Zprávný výsledek</th>
                        <th>Váš výsledek</th>
                    <tr>
                        <?php


                        foreach ($previous as $key => $tempTestItem) {
                            list($numberA, $numberB, $sign) = $tempTestItem;

                            $calculatedResult = calculate($numberA, $numberB, $sign);
                            if ($calculatedResult === $result[$key]) {
                                $score++;
                            }
                            $tempResult = $result[$key];
                            if (empty($result[$key])) {
                                $tempResult = 'X';
                            }
                            echo "<tr><td>{$numberA} {$sign} {$numberB}  = </td><td>{$calculatedResult}</td><td>{$tempResult}</td></tr>";

                        }


                        echo '</table>';
                        echo '<h4>Procento zprávných výsledků: ' . ($score / $scoreMax) * 100 . ' %</h4>';
                    }
                        echo '<a href="userTests.php">Zpět</a>';
                }
                ?>


            </div>
        </div>
    </div>


<?php
function generateTestItem()
{
    $tempSignArr = [];

    if (array_key_exists('mode', $_POST)) {
        $mode = $_POST['mode'];
        unset($tempSignArr);
        foreach ($mode as $sign => $value) {
            if ((int)$value === 1) {
                switch ($sign) {
                    case 'plus':
                        $tempSignArr[] = '+';
                        break;
                    case 'minus':
                        $tempSignArr[] = '-';
                        break;
                    case 'multiply':
                        $tempSignArr[] = '*';
                        break;
                    case 'divide':
                        $tempSignArr[] = '/';
                        break;
                }
            }
        }

    }
    if (!isset($tempSignArr)) {
        $tempSignArr = array('+', '+', '*', '/');
    }

    $sign = generateSign($tempSignArr);
    $numbers = generateNumbers($sign);
    return array($numbers['numberA'], $numbers['numberB'], $sign);


}

require __DIR__ . '/bootstrap.end.php';
?>