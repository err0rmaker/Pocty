<?php
session_start();
require "../configuration.php";

if (!isset($_SESSION["name"])) {
    header("Location: login.php");
}
require "inc/header.php";


?>
    <body id="bootstrap-overrides">
<?php require "inc/topNav.php" ?>

    <h1>MENU</h1>

<?php
require "inc/footer.php";
?>