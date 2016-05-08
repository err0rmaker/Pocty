<?php
session_start();
require "../configuration.php";

if (!isset($_SESSION["name"])) {
    header("Location: login.php");
}
require "../header.php";


?>
    <body id="bootstrap-overrides">
<?php require "inc/userTopNav.php" ?>


<?php
require "../footer.php";
?>