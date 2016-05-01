<?php
session_start();

require "php/inc/header.php";
require "php/generate.php";
require "php/inc/functionsMath.php";
if (!isset($_SESSION["numbers"])) {
    $tempSignArr = array("+", "-", "*", "/");
    $sign = generateSign($tempSignArr);
    $_SESSION["sign"] = $sign;
    $_SESSION["numbers"] = generateNumbers($sign);
}
SetLocale(LC_ALL, "Czech");
$date = StrFTime("Y-m-d", Time());
echo $date;
?>
    <body>
<div class="container">
    <div class="topNav">
        <div class="row">

            <div class="col-xs-offset-9 col-xs-2 topNavElement">
                <a href="php/login.php">
                    <button class="btn btn-default">LOGIN</button>
                </a>
            </div>

        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-6 col-md-offset-3 col-xs-12 col-xs-offset-0 operationMode">

        <form action="#" id="form_operationMode">

            <div class="checkbox">
                <label class="form-control-label  col-xs-3"><input type="checkbox" name="mode_plus" id="mode_plus"
                                                                   value="+"><b> +</b></label>
            </div>


            <div class="checkbox">
                <label class="form-control-label  col-xs-3"><input type="checkbox" name="mode_minus" id="mode_minus"
                                                                   value="-"><b> -</b></label>

            </div>


            <div class="checkbox">
                <label class="form-control-label  col-xs-3"><input type="checkbox" name="mode_multiply"
                                                                   id="mode_multiply" value="*"><b> *</b></label>

            </div>


            <div class="checkbox">
                <label class="form-control-label  col-xs-3"><input type="checkbox" name="mode_divide"
                                                                   id="mode_divide"
                                                                   value="/"><b> ÷</b></label>

            </div>


        </form>
    </div>

</div>

<div class="container text-xs-center ">
    <div class="col-lg-offset-4 col-md-offset-4 col-xs-offset-0 col-md-4">
        <div class="numbers ">
            <div class="row">


                <div class="col-xs-2 col-xs-offset-1">
                    <h1 id="numberA"><?php echo $_SESSION["numbers"]["numberA"] ?></h1>
                </div>
                <div class="col-xs-2">
                    <h1 id="sign"><?php echo $_SESSION["sign"] ?></h1>
                </div>
                <div class="col-xs-2">
                    <h1 id="numberB"><?php echo $_SESSION["numbers"]["numberB"] ?></h1>
                </div>
                <div class="col-xs-2">
                    <h1 id="equalsSign">=</h1>
                </div>
                <div class="col-xs-2">
                    <h1 id="numberResult">?</h1>
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


</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <p>

                <a href="login.php">
                    <h2>Pro testy, statistiky a soutěže se přihlašte</h2>
                </a>
            </p>
        </div>
    </div>
</div>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/pocitani.js"></script>


<?php
require "php/inc/footer.php";
?>