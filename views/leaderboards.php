<div class="container">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-2">
            <h1>Žebříček</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3" id="tests">


            <table class='table'>
                <tr>
                    <th>Pořadí</th>
                    <th>Průměrné skóre</th>
                    <th>Četnost testů</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {


                    //echo "<tr><td>{$id}</td><td>{$score} %</td><td>{$date}</td></tr>";
                }

                ?>
            </table>
        </div>
    </div>
</div>

