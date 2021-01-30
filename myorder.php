<?php 
    include("php/config/auth.php"); 
    include("php/config/db.connect.php");
    
    $customer_id = $_SESSION['userid'];

    //$result = mysqli_query($conn,"SELECT auth.id,product.item_name, product.*, auth.*, orders.*,order_product.* FROM order_product LEFT JOIN auth ON orders.customer_id=auth.id LEFT JOIN product ON orders.product_id=product.id WHERE auth.id='$customer_id'");

    $result = mysqli_query($conn,"SELECT product.*,orders.*,auth.* FROM orders LEFT JOIN auth ON orders.customer_id=auth.id LEFT JOIN product ON orders.product_id=product.id WHERE auth.id='$customer_id'");


    $count = mysqli_num_rows($result);
    $sn = 1;
    // /mysqli_free_result($result);
    //mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>REECO - My Order</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <?php include "php/includes/head.php" ?>

    <link rel="stylesheet" href="/public/css/index.css">
</head>
<body>
    <?php include "php/includes/navbar.php" ?>

    <div class="container">
    <h3 class='title m-4'>My Orders</h3>
    <table class="table  table-striped table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Account Name</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        
        <?php if($count > 0) : 
            $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
            
            <?php foreach($orders as $row): ?>
                <tr>
                    <th scope="row"> <?php echo $sn++ ?></th>
                    <td>              
                        <?php echo $row['username'] ?>
                    </td>
                    <td>              
                        <?php echo $row['buyer_name'] ?>
                    </td>
                    <td>              
                        <?php if($row['item_name']){
                            echo $row['item_name'];
                        }else{
                            echo "error";
                        } 
                        ?>
                    </td>
                    <td>              
                        $ <?php echo $row['price'] ?>
                    </td>
                    <td>              
                        <?php echo $row['quantity'] ?>
                    </td>
                    <td>
                        <?php 
                                if($row['img'] != "")
                                {
                                    //Display the Image
                                    ?>
                                    <img  class='img d-block mb-4' src="../images/product/<?php echo $row['img']; ?>">
                                    <?php
                                }
                                else
                                {
                                    //Display Message
                                    echo "<div class='text-danger'>Image Not Added.</div>";
                                }
                            ?>
                    </td>
                    <td>              
                        <?php echo $row['phonenumber'] ?>
                    </td>
                    <td>              
                        <?php echo $row['address'] ?>
                    </td>
                    <td>              
                        <?php echo "$ " . $row['quantity'] * $row['price'] ?>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
                <tr>
                    <td colspan="8">
                        <div class="text-danger">No Orders.</div>
                    </td>
                </tr>
        <?php endif; ?>

        
        </tbody>
    </table>
</div>

    <?php include("./php/includes/footer.php") ?>
</body>
</html>