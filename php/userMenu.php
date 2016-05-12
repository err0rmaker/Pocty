<?php
session_start();
require __DIR__ . '../configuration.php';

if (!isset($_SESSION['name'])) {
    header('Location: login.php');
}
require __DIR__ . '../header.php';


?>
    <body id="bootstrap-overrides">
<?php require __DIR__ . 'inc/userTopNav.php' ?>


<?php
require __DIR__ . '../footer.php';
?>