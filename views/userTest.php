<div class="container text-center ">
    <div class="row">
        <div class="col-xs-offset-4 col-xs-4 ">
            <h3>Test</h3>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" id="tests">

            <form method='post' action='userTestResult.php'>
                <?php
                if (isset($testItems)) {
                    foreach ($testItems as $key => $tempTestItem) {

                        list($numberA, $numberB, $sign) = $tempTestItem;

                        echo "<div class='form-group'>";
                        echo "<label for=testItem>{$numberA} {$sign} {$numberB}</label>";
                        echo "<input  class='form-control' type='number' name='result[]' id = 'testItem'>";
                        echo '</div>';

                    }

                }
                ?>
                <label for='submitTest'>Zkontrolovat</label>
                <input class='btn btn-default' type='submit' id='submitTest'>
            </form>

        </div>
    </div>
</div>