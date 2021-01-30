<?php 
    include("./php/config/auth.php");
    include("./php/includes/header.php");
    include("./php/config/db_connect.php");
?>


<?php 

//$sql = "SELECT * FROM product ";
$sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
$sn=1;
$products = mysqli_fetch_all($res,MYSQLI_ASSOC);

// /mysqli_free_result($res);

//mysqli_close($conn);



?>

<div class="container">
    <h3 class='title m-4'>Manage Product</h3>

    <?php 
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }

    if(isset($_SESSION['unauthorize']))
    {
        echo $_SESSION['unauthorize'];
        unset($_SESSION['unauthorize']);
    }

    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    
    ?>

    <a href='/admin/php/actions/add-product.php' class="btn-primary btn button m-4">Add Product</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Title</th>
                <th scope="col">Category id</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Image</th>
                <th  scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        
        <?php if($count > 0) : ?>
                <?php foreach($products as $product): ?>
                <tr>
                    <th scope="row"> <?php echo $sn++ ?></th>
                    <td>              
                    <?php echo $product['item_name'] ?>
                    </td>
                    <td>              
                    <?php echo $product['category_name'] ?>
                    </td>
                    <td>              
                    $ <?php echo $product['price'] ?>
                    </td>
                    <td>              
                    <?php echo $product['stock'] ?>
                    </td>
                    <td>
                        <?php 
                                if($product['img'] != "")
                                {
                                    //Display the Image
                                    ?>
                                    <img class='img d-block mb-4' src="../images/product/<?php echo $product['img']; ?>">
                                    <?php
                                }
                                else
                                {
                                    //Display Message
                                    echo "<div class='text-danger'>Image Not Added.</div>";
                                }
                            ?>
                    </td>

                    <td  colspan="2" >
                    <a href='/admin/update-product.php?id=<?php echo $product['id']; ?>' class="btn-success btn button">Update product</a>

                    <a href='/admin/php/actions/delete-product.php?id=<?php echo $product['id']; ?>&product_img=<?php echo $product['img']; ?>' class="btn-danger btn button ">Delete product</a>

                    </td>
                </tr>
                <?php endforeach; ?>

            <?php else: ?>
                <tr>
                    <td colspan="6">
                        <div class="text-danger">No Product Added.</div>
                    </td>
                </tr>
        <?php endif; ?>

           
        </tbody>
    </table>
</div>



<?php include("./php/includes/footer.php") ?>