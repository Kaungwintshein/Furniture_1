<?php
    include("php/config/db.connect.php");
    include "php/config/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <?php include dirname(__FILE__).'/php/includes/head.php'; ?>


  <!-- library -->
  <link rel="stylesheet" href="/public/dist/css/grid.css">
  <link rel="stylesheet" href="/public/css/index.css">
    <style>
        .container-fluid{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <?php 
        include dirname(__FILE__)."/php/includes/header.php" ; 
    
        // if()
        $sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        $sn=1;
        $products = mysqli_fetch_all($res,MYSQLI_ASSOC);
    ?>

    
    


    <!-- cart -->
    <div class="container-fluid cart">
        <div class="row">
            <div class="col-md-2 m-3">
                <div class="list-group">
                    <select class="form-control form-control-md">
                        <?php 
                            $result = mysqli_query($conn,"SELECT * FROM category");
                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                        <option><?php echo $row['category_name'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <!-- <div class="col-md-1"></div> -->
            <div class="col-md-8" id="items">
                <div class="row" id="row">
            </div>
        </div>
    </div>

    <!-- modal box -->
    <form action='addtocart.php' method="post"> 
        <div id="modal">

        </div>
    </form>

<?php

    $total=0;
    //$_SESSION['cart'] as $id=>$qty)
    $result=mysqli_query($connection,"select * from product where product_id=$id");
    $sn=1;
    $products = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    // $row=mysqli_fetch_assoc($result);

    // $sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id";
    // $res = mysqli_query($conn, $sql);

    // $count = mysqli_num_rows($res);
    // $sn=1;
    // $products = mysqli_fetch_all($res,MYSQLI_ASSOC);
?>


    <script type='text/javascript'> 

        let products = <?php echo json_encode($products); ?>;
    </script>




    <?php
        include dirname(__FILE__).'/php/includes/footer.php' ;
    ?>
    <script src="/public/Js/header.js"></script>
    <script src="/public/Js/product.js"></script>
</body>
</html>