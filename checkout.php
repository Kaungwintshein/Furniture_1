<?php 
    include "./php/config/db.connect.php";
    $customer_id = $_GET['customerid'];
    $id = $_GET['id'];
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $order_quantity = $_POST['order_quantity'];
    $img = $_POST['img'];
    //echo $img;

    $sql = "SELECT * FROM orders WHERE customer_id='$customer_id' && product_id='$product_id'";
    $result = mysqli_query($conn,$sql);
    $exit = mysqli_fetch_all($result,MYSQLI_ASSOC);

    if($exit){
        foreach($exit as $exist){
            $new_product_id = $exist['product_id'];
            $original_quantity = $exist['quantity'];
            $original_price = $exist['price'];
        }
        $new_quantity = $original_quantity + $order_quantity;
        //echo $new_quantity;
        // $new_price = $original_price + $price;
        $sql = "UPDATE orders SET quantity='$new_quantity' WHERE product_id='$product_id'";
        $success = mysqli_query($conn,$sql);
        if($success){
            $query2 = mysqli_query($conn, "DELETE FROM order_product WHERE product_id='$new_product_id'");
            // if($query2){
            //     echo "success";
            // }else{
            //     echo mysqli_error($conn);
            // }
            header("location: /cart.php");
        }else{
            echo mysqli_error($conn);
        }
    }else{
        $sql = "INSERT INTO orders (customer_id,product_id,price,quantity,img,created_date) VALUES ('$customer_id','$product_id','$price','$order_quantity','$img',now())";
        $query = mysqli_query($conn,$sql);
        if($query){
            $query2 = mysqli_query($conn, "DELETE FROM order_product WHERE order_product_id='$id'");
            header("location: /cart.php");
        }else{
            echo mysqli_error($conn);
        }
    }
    
?>