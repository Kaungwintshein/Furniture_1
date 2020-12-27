<?php 
    include("./php/config/auth.php");
    include("./php/includes/header.php");
    include("./php/config/db_connect.php");

    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }


$result = mysqli_query($conn,"SELECT auth.id,product.item_name,product.item_name, product.*, auth.*, orders.* FROM orders LEFT JOIN auth ON orders.customer_id=auth.id LEFT JOIN product ON orders.product_id=product.id");
$count = mysqli_num_rows($result);
$sn = 1;
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

?>

<div class="container">
    <h3 class='title m-4'>Manage Orders</h3>

    <table class="table  table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Total</th>
                <th  scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        
        <?php if($count > 0) : ?>
            <?php foreach($orders as $row): ?>
                <tr>
                    <th scope="row"> <?php echo $sn++ ?></th>
                    <td>              
                        <?php echo $row['username'] ?>
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
                        <?php echo "$ " . $row['quantity'] * $row['price'] ?>
                    </td>

                    <td  colspan="2" >
                    <a href='/admin/php/actions/delete-order.php?id=<?php echo $row['orders_id']; ?>&product_img=<?php echo $row['img']; ?>' class="btn-danger btn button ">Order Is Send</a>

                    </td>
                    
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
                <tr>
                    <td colspan="8">
                        <div class="text-danger">No Confirmed YET.</div>
                    </td>
                </tr>
        <?php endif; ?>

           
        </tbody>
    </table>
</div>

<?php include("./php/includes/footer.php") ?>