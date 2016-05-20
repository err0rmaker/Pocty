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

            <h4>Procento zprávných výsledků: <?php echo $finalScore ?> %</h4>
            <div class="table-responsive transparent-rounded">
            <table class='table'>
                <tr>
                    <th>Příklad</th>
                    <th>Zprávný výsledek</th>
                    <th>Váš výsledek</th>
                </tr>
                <?php

                    foreach ($finalTestItems as $key => $testItem) {

                        $correct = $testItem['correct'];
                        $calcResult = $testItem['calcResult'];
                        $result = $testItem['result'];
                        $sign = $testItem['sign'];
                        $numberA = $testItem['numberA'];
                        $numberB = $testItem['numberB'];

                        echo "<tr><td>{$numberA} {$sign} {$numberB}  = </td><td>{$calcResult}</td><td>{$correct}{$result}</td></tr>";
                    }

                ?>
            </table>
            </div>


            <a href="userTests.php">Zpět</a>

        </div>
    </div>
</div>