<?php 
    include "./php/config/db.connect.php";
    $customer_id = $_GET['customerid'];
    $id = $_GET['id'];
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $order_quantity = $_POST['order_quantity'];
    $img = $_POST['img'];
    //echo $product_name. " " .$price. " " .$customer_name . " " . $order_quantity. " " . $img;
    //order_id,  VALUES ('$id'
    $sql = "INSERT INTO orders (customer_id,product_id,price,quantity,img,created_date) VALUES ('$customer_id','$product_id','$price','$order_quantity','$img',now())";
    $query = mysqli_query($conn,$sql);
    if($query){
        $query2 = mysqli_query($conn, "DELETE FROM order_product WHERE order_product_id='$id'");
        header("location: /cart.php");
    }else{
        echo mysqli_error($conn);
    }
    // CREATE TABLE orders (orders_id INT NOT NULL AUTO_INCREMENT, order_id INT, customer_id INT, product_id INT, qunatity VARCHAR(255), created_date DATE TIME);
?>