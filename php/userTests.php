<?php
session_start();
require "../header.php";
require "inc/functionsMath.php";
require "../configuration.php";
if (!isset($_SESSION["numbers"])) {
    $tempSignArr = array("+", "-", "*", "/");
    $sign = generateSign($tempSignArr);
    $_SESSION["sign"] = $sign;
    $_SESSION["numbers"] = generateNumbers($sign);


}

?>

<?php require "inc/topNav.php" ?>


    </div>
    <div class="container text-center ">
        <div class="row">
            <div class="col-xs-offset-4 col-xs-4 ">
                <p>
                <h2>Testy</h2></p>
            </div>
        </div>
    </div>


<?php
require "../footer.php";
?>