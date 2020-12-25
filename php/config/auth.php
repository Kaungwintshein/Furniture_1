<?php
session_start();
//$_SESSION['role'] = 'user';
//echo $_SESSION['role'];
//echo $_SESSION['username'];
if(!isset($_SESSION['auth'])) {
    header("location: /login.php");
    exit();
}

// if(isset($_SESSION['user'])){
//     header("location: /login.php");
// }

// if(isset($_SESSION['admin']) && isset($_SESSION['auth'])){
//     header("location: /admin/index.php");
// }

// if(isset($_SESSION['user']) && isset($_SESSION['auth'])){
//     header("location: /index.php");
// }

?>