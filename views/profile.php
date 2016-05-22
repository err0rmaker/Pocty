<div class="container">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-2">
            <h1>Profil</h1>
        </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <h3 class="">Vaše průměrné skóre je: <?php echo $dataUser['score_avg'] ?> %</h3>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <h3 class="">Celkový počet testů: <?php echo $dataUser['test_count'] ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-md-offset-2" id="tests">
            <div class="row">
                <div class="col-md-offset-1">
                    <h2>Historie testů</h2>
                </div>
            </div>

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

            <div class="row">
                <div class="col-md-offset-1 marginTop">
                    <h2>Kalendář aktivity</h2>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3 marginTop">
            <div class="row">
                <div class="col-md-offset-4">
                <a class="btn transparent-rounded" id="onMinDomainReached-previous">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                </a>

                <a class="btn transparent-rounded" id="onMinDomainReached-next">
                    <span class="glyphicon glyphicon-arrow-right"></span>
                </a>
                </div>
            </div>

            <div class="row">
                <div class="transparent-rounded marginTop" style="background-color: #1b6d85" id="cal-heatmap-wrapper">
                    <div id="cal-heatmap" style="margin-left: auto"></div>
                </div>
            </div>
            </div>


        </div>
    </div>
</div>


<script type="text/javascript">


    var data = <?php echo json_encode($dataHeatMap);?>;

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

        range: 1,
        start: new Date(),

        domain: "month",
        subDomain: "x_day",
        cellSize: 30,
        subDomainTextFormat: "%d",
        itemSelector: "#cal-heatmap",

        nextSelector: "#onMinDomainReached-next",
        previousSelector: "#onMinDomainReached-previous",
        label: {
            position: "top",
        }


    });


</script>

