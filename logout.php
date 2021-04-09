<?php
session_start();

$_SESSION['role']="";
$_SESSION['login_id']="";

session_destroy();

header("location: loginpanel/login.php");
?>