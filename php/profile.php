<?php
session_start();
require "../configuration.php";

if (!isset($_SESSION["name"])) {
    header("Location: login.php");
}
require "../header.php";


?>
<?php require "inc/topNav.php" ?>

    <h1>profil</h1>


<?php
require "../footer.php";
?>