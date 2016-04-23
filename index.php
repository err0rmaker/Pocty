<!doctype html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome-4.6.1/css/font-awesome.min.css">


</head>
<body>

<div class="container">
    <div class="topNav">
        <div class="row">

            <div class="col-xs-offset-10 col-xs-2">
                <a>LOGIN</a>
            </div>

        </div>
    </div>
</div>
<div class="container text-xs-center ">
    <div class="col-lg-offset-4 col-md-offset-4 col-xs-offset-0 col-md-4">
        <div class="numbers ">
            <div class="row">


                <div class="col-lg-4 col-md-4 col-sm-4  col-xs-4 ">
                    <h1 id="numberA">6</h1>
                </div>
                <div class="col-lg-4 col-md-4  col-sm-4 col-xs-4">
                    <h1 id="sign">+</h1>
                </div>
                <div class="col-lg- col-md-4  col-sm-4 col-xs-4">
                    <h1 id="numberB">8</h1>
                </div>
            </div>
            
        </div>


            <div class="row">


                <form method="POST" action="#" id="resultForm" role="form">
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12  col-xs-12">
                            <div class="text-center">
                                <label for="calcResult" class="form-control-label">Sem zadejte váš výsledek</label>
                            </div>
                            <input type="number" name="calcResult" class="form-control" id="calcResult"
                                   autocomplete="off">

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center">
                                    <input type="submit" value="Zkontrolovat" id="submitResult" class="btn">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>



    </div>
    <div class="container">
        <div class="row">
            <div class="footer">

            </div>
        </div>
    </div>


</div>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/pocitani.js"></script>

</body>
</html>