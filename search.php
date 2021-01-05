<?php 
    include("php/config/db.connect.php");
    include "php/config/auth.php";
    if(isset($_POST['btnsearch'])){
        $search_string = $_POST['search_string'];
        $sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id WHERE product.item_name LIKE '%$search_string%'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        $sn=1;
        $products = mysqli_fetch_all($res,MYSQLI_ASSOC);
    }else{
        echo '<h3>No Product Found.</h3>';
        $sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        $sn=1;
        $products = mysqli_fetch_all($res,MYSQLI_ASSOC);
    }


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
    <link rel="stylesheet" href="/public/css/contact.css">
</head>
<body>
    
    <!-- cart -->
    <div class="container cart">
        <div class="row" id="row">

        </div>
    </div>

    <!-- modal box -->
    <form action='addtocart.php' method="post"> 
        <div id="modal">

        </div>
    </form>

    <button class="btn btn-success"><a href="/product.php">Back</a></button>


    <script type='text/javascript'>
        let products = <?php echo json_encode($products); ?>;
        console.log(products);
    </script>

    <script src="/public/Js/header.js"></script>
    <script src="/public/Js/shop.js"></script>

</body>
</html>


<!-- 
    stock - 80
    orders stock - 80 = product qty 80
    out of stock
-->