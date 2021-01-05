<?php 
    include("./php/config/auth.php");
    include("./php/includes/header.php");
    include("./php/config/db_connect.php");

    $result = mysqli_query($conn,"SELECT * FROM send_order");
    $count = mysqli_num_rows($result);
    $sn = 1;
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>

<div class="container">
    <h3 class='title m-4'>Send Information</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Total</th>
                <th  scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
        
        <?php if($count > 0) : ?>
            <?php foreach($orders as $row): ?>
                <tr>
                    <th scope="row"> <?php echo $sn++ ?></th>
                    <td>              
                        <?php echo $row['customer_name'] ?>
                    </td>
                    <td>              
                        <?php if($row['product_name']){
                            echo $row['product_name'];
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
                    <td>              
                        <?php echo $row['created_date'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
                <tr>
                    <td colspan="8">
                        <div class="text-danger">No Information Now.</div>
                    </td>
                </tr>
        <?php endif; ?>

        
        </tbody>
    </table>
</div>

<?php include("./php/includes/footer.php") ?>