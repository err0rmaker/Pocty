<div class="container">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-2">
            <h1>Profil</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2" id="tests">

            <div class="table-responsive transparent-rounded">

            <table class='table'>
                <tr>
                    <th>ID testu</th>
                    <th>Vaše úspěšnost</th>
                    <th>Datum</th>
                </tr>
                <?php
                if ($dataReady) {

                    foreach ($data as $row) {
                        list($id, $user_id, $score, $date) = array_values($row);

                        echo "<tr><td>{$id}</td><td>{$score} %</td><td>{$date}</td></tr>";
                    }
                }

                ?>
            </table>
            </div>
            <?php echo $message ?>

            <div class="transparent-rounded marginTop" id="cal-heatmap-wrapper">
            <div id="cal-heatmap"></div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">


    var data = <?php echo json_encode($dates);?>;

    var parser = function (data) {
        var stats = {};
        for (var d in data) {
            stats[data[d].date] = data[d].value;
        }
        return stats;
    };

    var cal = new CalHeatMap();
    cal.init({
        data: data,
        afterLoadData: parser,

        range: 3,
        start: new Date(),
        domain: "month",
        subDomain: "x_day",
        cellSize: 20,
        subDomainTextFormat: "%d",
        itemSelector: "#cal-heatmap"


    });


</script>

