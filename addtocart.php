<?php
    // session_start();
    // include "./php/config/db.connect.php";
    // $customer_id = $_SESSION['userid'];
    // $product_id = $_POST['product_id'];
    // $price = $_POST['price'];
    // $order_quantity = $_POST['quantity'];

    // $sql = "INSERT INTO order_product (customer_id, product_id, order_quantity, created_date) VALUES ('$customer_id','$product_id','$order_quantity' ,now())";
    // $query = mysqli_query($conn,$sql);
    // header("location: /cart.php");


    session_start();
    include "./php/config/db.connect.php";
    $customer_id = $_SESSION['userid'];
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $order_quantity = $_POST['quantity'];

    $sql_1 = "SELECT * FROM order_product WHERE product_id='$product_id' && customer_id='$customer_id'";
    $result = mysqli_query($conn,$sql_1);
    $exit = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    if($exit){
        foreach($exit as $exist){
            $order_product_id = $exist['order_product_id'];
            $original_order_quantity = $exist['order_quantity'];
        }
        $new_order_quantity = $original_order_quantity + $order_quantity;
        $sql = "UPDATE order_product SET order_quantity='$new_order_quantity' WHERE order_product_id = '$order_product_id'";
        mysqli_query($conn,$sql);
        header("location: /cart.php");
    }else{
        $sql = "INSERT INTO order_product (customer_id, product_id, order_quantity, created_date) VALUES ('$customer_id','$product_id','$order_quantity' ,now())";
        $query = mysqli_query($conn,$sql);
        header("location: /cart.php");
    }


?>