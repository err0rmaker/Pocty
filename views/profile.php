<div class="container">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-2">
            <h1>Profil</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3" id="tests">


            <table class='table'>
                <tr>
                    <th>ID testu</th>
                    <th>Vaše úspěšnost</th>
                    <th>Datum</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {

                    list($id, $user_id, $score, $date) = array_values($row);

                    echo "<tr><td>{$id}</td><td>{$score}</td><td>{$date}</td></tr>";
                }

                ?>
            </table>


            <a href="userTests.php">Zpět</a>

        </div>
    </div>
</div>

