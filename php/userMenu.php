<?php
session_start();
require __DIR__ . '../configuration.php';

if (!array_key_exists('name', $_SESSION)) {
    header('Location: login.php');
}
require __DIR__ . '../header.php';


//
require __DIR__ . '/inc/userTopNav.php';
require __DIR__ . '../footer.php';
