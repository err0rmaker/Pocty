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
                    <thead>
                    <tr>
                        <th>Příklad</th>
                        <th>Zprávný výsledek</th>
                        <th>Váš výsledek</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php

                    foreach ($data as $key => $testItem) {

                        $correct = $testItem['correct'];
                        $calcResult = $testItem['calcResult'];
                        $result = $testItem['result'];
                        $sign = $testItem['sign'];
                        $numberA = $testItem['numberA'];
                        $numberB = $testItem['numberB'];
                        ?>
                        <tr style="<?php echo ($correct === true) ? 'background-color: rgba(72, 213, 4, 0.5)' : 'background-color: rgba(213, 11, 6, 0.5)' ?>">
                            <td>
                                <?php echo $numberA . ' ' . $sign . ' ' . $numberB ?> =
                            </td>
                            <td>
                                <?php echo $calcResult ?>
                            </td>
                            <td>
                                <?php echo ($correct === true) ? '' : 'X' . $result ?>
                            </td>

                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>


            <a href=" userTests.php
                    ">Zpět</a>

        </div>
    </div>
</div>