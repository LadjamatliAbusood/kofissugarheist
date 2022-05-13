<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["fname"]);
header("Location:home.php");
?>