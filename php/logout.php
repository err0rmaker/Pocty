<?php
session_start();
require "../configuration.php";

unset($_SESSION["name"]);
header("Location: ../index.php");
session_destroy();
