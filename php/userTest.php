<?php
session_start();
require __DIR__ . '/../configuration.php';
require __DIR__ . '/../header.php';
require __DIR__ . '/inc/functionsMath.php';

if (empty($_SESSION['name'])) {
    header('Location: login.php');
}

?>
<?php require __DIR__ . '/inc/userTopNav.php' ?>
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

                if (isset($_POST['count'])) {
                    $count = $_POST['count'];
                    $testItemsI = array();
                    for ($i = 0; $i < $count; $i++) {
                        $testItemsI[$i] = generateTestItem();

                    }

                    echo "<form method='post' action='userTest.php'>";
                    for ($i = 0, $iMax = count($testItemsI); $i < $iMax; $i++) {
                        $numberA = $testItemsI[$i][0];
                        $numberB = $testItemsI[$i][1];
                        $sign = $testItemsI[$i][2];
                        echo "<div class='form-group'>";
                        echo "<label for=testItem>{$numberA} {$sign} {$numberB}</label>";
                        echo "<input  class='form-control' type='number' name='result[]' id = 'testItem'>";
                        echo "<input type='hidden' name='previous[]' value='{$numberA}|{$numberB}|{$sign}'>";


                        echo '</div>';
                    }
                    echo "<label for='submitTest'>Zkontrolovat</label>";
                    echo "<input class='btn btn-default' type='submit' id='submitTest'>";
                    echo '</form>';
                }


                if (array_key_exists('result', $_POST) and array_key_exists('previous', $_POST)) {
                    $result = $_POST['result'];
                    $score = 0;
                    $previous = $_POST['previous'];
                    $scoreMax = count($previous);
                    echo "<table class='table'>";
                    echo '<tr><th>Příklad</th><th>Zprávný výsledek</th><th>Váš výsledek</th><tr>';
                    for ($i = 0, $iMax = count($previous); $i < $iMax; $i++) {
                        $prevArr = explode('|', $previous[$i]);
                        $numberA = $prevArr[0];
                        $numberB = $prevArr[1];
                        $sign = $prevArr[2];
                        $calculatedResult = calculate($numberA, $numberB, $sign);
                        if ($calculatedResult == $result[$i]) {

                            $score++;
                        }
                        echo "<tr><td>{$numberA} {$sign} {$numberB}  = </td><td>{$calculatedResult}</td><td>{$result[$i]}</td></tr>";


                    }
                    echo '</table>';
                    echo '<h4>Procento zprávných výsledků: ' . ($score / $scoreMax) * 100 . ' %</h4>';
                }
                ?>


            </div>
        </div>
    </div>


<?php
function generateTestItem()
{
    $tempSignArr = [];

    if (isset($_POST['mode'])) {
        $mode = $_POST['mode'];
        unset($tempSignArr);
        foreach ($mode as $sign => $value) {
            if ($value == 1) {
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
    //return $numbers['numberA']." ".$sign." ".$numbers['numberB']." = "."?";
    return array($numbers['numberA'], $numbers['numberB'], $sign);


}

require __DIR__ . '/../footer.php';
?>