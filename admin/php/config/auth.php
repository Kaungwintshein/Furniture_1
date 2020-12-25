<?php
session_start();
//echo $_SESSION['role'] . ' ' . $_SESSION['username'];
if($_SESSION['role'] != 'admin'){
    header("location: /index.php");
    exit();
}
if(!isset($_SESSION['auth']) ){
    header("location: /login.php");
    exit();
}
?>