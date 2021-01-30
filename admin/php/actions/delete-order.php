<?php 

    include("../config/db_connect.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($conn,"SELECT auth.id,product.item_name,product.item_name, product.*, auth.*, orders.* FROM orders LEFT JOIN auth ON orders.customer_id=auth.id LEFT JOIN product ON orders.product_id=product.id WHERE orders.orders_id='$id'");
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach($orders as $row){
            $customer_name = $row['username'];
            $buyer_name = $row['buyer_name'];
            $product_name = $row['item_name'];
            $price = $row['price'];
            $order_quantity = $row['quantity'];
            $quantity = $row['quantity'];
            $img = $row['img'];
            $phonenumber = $row['phonenumber'];
            $address = $row['address'];
        };
        $sql_2 = "INSERT INTO send_order (customer_name,buyer_name,product_name,price,quantity,img,phonenumber,address,created_date) VALUES ('$customer_name','$buyer_name','$product_name','$price','$order_quantity','$img','$phonenumber','$address',now())";
        $inserted = mysqli_query($conn, $sql_2);

        if($inserted){
            $id = $_GET['id'];
            $category_img = $_GET['product_img'];
    
            $sql = "DELETE FROM orders WHERE orders_id='$id' ";
    
            $res = mysqli_query($conn, $sql);
    
            if($res==true)
            {
                //SEt Success MEssage and REdirect
                $_SESSION['delete'] = "<div class='text-success'>Product Deleted Successfully.</div>";
                //Redirect to Manage Category
                header('location: /admin/manage-order.php');
            }
            else
            {
                //SEt Fail MEssage and Redirecs
                $_SESSION['delete'] = "<div class='text-danger'>Failed to Delete Product.</div>";
                //Redirect to Manage Category
                header('location: /admin/manage-order.php');
            }
        }else{
            echo mysqli_error($conn);
        }
    }
    else{
        header('location:/admin/manage-order.php');
    }

?>