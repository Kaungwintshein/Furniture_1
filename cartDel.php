<?php
    include "php/config/db.connect.php";
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM order_product WHERE order_product_id='$id'");
    if($query){
        header("location: /cart.php");
    }else{
        echo(mysqli_errno($conn));
    }
   
?>