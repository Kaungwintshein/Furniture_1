<?php
    session_start();
    include "./php/config/db.connect.php";
    $customer_id = $_SESSION['userid'];
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $order_quantity = $_POST['quantity'];

    $sql = "INSERT INTO order_product (customer_id, product_id, order_quantity, created_date) VALUES ('$customer_id','$product_id','$order_quantity' ,now())";
    $query = mysqli_query($conn,$sql);
    header("location: /cart.php");
?>