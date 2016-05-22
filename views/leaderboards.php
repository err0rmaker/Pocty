<div class="container">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-2">
            <h1>Žebříček</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
            <div class="col-md-offset-3"><h3>Top 10 počtářů</h3></div>

        <div class="col-md-5 col-md-offset-3" id="tests">


            <table class='table transparent-rounded'>
                <tr>
                    <th>Pořadí</th>
                    <th>Průměrné skóre</th>
                    <th>Testů celkem</th>
                </tr>
                <?php
                foreach ($data as $value) {
                    echo "<tr><td>{$value['name']}</td><td>{$value['score_avg']}</td><td>{$value['test_count']}</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>

