<?php
session_start();

$_SESSION["login_id"]="";
$_SESSION["role"]="";

session_destroy();

header("location:login.php");
?>