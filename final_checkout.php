<?php
    include "./php/config/db.connect.php";

    // form checkout_1.php form
    $customer_id = $_GET['customerid'];
    $id = $_GET['id'];
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $order_quantity = $_POST['order_quantity'];
    $img = $_POST['img'];

    $buyer_name = $_POST['buyer_name'];
    $address = $_POST['address'];
    $ph_number = $_POST['ph_number'];
    //echo $username,$address,$ph_number;

   

    $sql = "SELECT * FROM `orders` WHERE customer_id='$customer_id' && product_id='$product_id'";
    $result = mysqli_query($conn,$sql);
    $exit = mysqli_fetch_all($result,MYSQLI_ASSOC);

        // if($exit){
        //     foreach($exit as $exist){
        //         $new_product_id = $exist['product_id'];
        //         $original_quantity = $exist['quantity'];
        //         $original_price = $exist['price'];
        //     }
        //     $new_quantity = $original_quantity + $order_quantity;
        //     $sql = "UPDATE orders SET quantity='$new_quantity' WHERE product_id='$product_id'";
        //     $success = mysqli_query($conn,$sql);
        //     if($success){
        //         $query2 = mysqli_query($conn, "DELETE FROM order_product WHERE product_id='$new_product_id'");
        //         header("location: /cart.php");
        //     }else{
        //         echo mysqli_error($conn);
        //     }
        // }else{
            // $sql = "INSERT INTO orders (customer_id,buyer_name,product_id,price,quantity,img,phonenumber,address,created_date) VALUES ('$customer_id','$buyer_name','$product_id','$price','$order_quantity','$img','$ph_number','$address',now())";
            // $query = mysqli_query($conn,$sql);

            
        
                $result_1 = mysqli_query($conn,"SELECT * FROM product WHERE id='$product_id'");
                $row = mysqli_fetch_all($result_1,MYSQLI_ASSOC);
                foreach($row as $row){
                    $db_stock = $row['stock'];
                }

                if($db_stock == 0 || $db_stock < 0 || $db_stock < $order_quantity){
                    echo "<script>window.alert('Out Of Stock!The Stock have only {$db_stock} left')</script>";
                    echo "<script>window.location.href='/cart.php'</script>";
                }else{
                    $sql = "INSERT INTO orders (customer_id,buyer_name,product_id,price,quantity,img,phonenumber,address,created_date) VALUES ('$customer_id','$buyer_name','$product_id','$price','$order_quantity','$img','$ph_number','$address',now())";
                    $query = mysqli_query($conn,$sql);

                    $decrease_stock = $db_stock - $order_quantity;
                    $query2 = mysqli_query($conn, "DELETE FROM order_product WHERE order_product_id='$id'");
                    $query_3 = mysqli_query($conn, "UPDATE product SET stock='$decrease_stock' WHERE id = '$product_id'");
                    if($query_3 && $query2){
                        $_SESSION['order_success'] = "Successfully Ordered";
                        echo $_SESSION['order_success'];
                        $message = "Order Successfully";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        echo "<script type='text/javascript'>
                        window.location = '/cart.php';
                        </script>";

                        //window.location = '".dirname(__FILE__).'/cart.php'."';
                    }else{
                        echo mysqli_error($conn);
                    }
                }
        // }
?>