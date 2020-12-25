<?php 

//session_start();
    $dbhost = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "reeco";

    $conn = mysqli_connect($dbhost, $username, $password,$dbname);
    if(!$conn){
    echo "connection error".mysqli_connect_error();
}
?>