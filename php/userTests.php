<?php
session_start();
require "../header.php";
require "inc/functionsMath.php";
require "../configuration.php";
if (empty($_SESSION["name"])) {
    header("Location: login.php");
}

?>
<?php require "inc/userTopNav.php" ?>
    <div class="container text-center ">
        <div class="row">
            <div class="col-xs-offset-4 col-xs-4 ">
                <p>
                <h3>Testy</h3></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-xs-12 col-xs-offset-0 operationMode">

            <form action="userTest.php" method="post" id="form_operationMode">

                <div class="checkbox">
                    <input type="hidden" name="mode[plus]" value="0">
                    <label class="form-control-label  col-xs-3"><input type="checkbox" name="mode[plus]" value="1"><b>
                            +</b></label>

                </div>
                <div class="checkbox">
                    <input type="hidden" name="mode[minus]" value="0">
                    <label class="form-control-label  col-xs-3"><input type="checkbox" name="mode[minus]" value="1"><b>
                            -</b></label>

                </div>
                <div class="checkbox">
                    <input type="hidden" name="mode[multiply]" value="0">
                    <label class="form-control-label  col-xs-3"><input type="checkbox" name=mode[multiply]"
                                                                       value="1"><b> *</b></label>

                </div>
                <div class="checkbox">
                    <input type="hidden" name="mode[divide]" value="0">
                    <label class="form-control-label  col-xs-3"><input type="checkbox" name="mode[divide]" value="1"><b>
                            ÷</b></label>


                </div>
                <div class="col-md-6 col-md-offset-3" id="testCount">
                    <div class="form-group">
                        <label for="count">Počet příkladů</label>
                        <input class="form-control" type="number" id="count" name="count">
                    </div>
                    <label for="submit">Vygenerovat</label>
                    <input class="btn btn-default" type="submit" id="submit">
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>


<?php
require "../footer.php";
?>