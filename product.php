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
    <link rel="stylesheet" href="/public/css/contact.css">
    <style>
        .form-control {
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            border: none;
        }
    </style>
    
</head>
<body>
    <?php 
        include dirname(__FILE__)."/php/includes/header.php" ; 
    ?>
    <div class="container-fluid mx-auto mt-5" id="container-fluid-me" >
        <div class="row">
            <div class="col-md-3">
                <div>
                    <ul class="list-group">
                        <li class="list-group-item active bg-dark"><h3 class="text-white">Categories</h3></li>
                        <?php 
                            $result = mysqli_query($conn,"SELECT * FROM category");
                            $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
                            foreach($row as $row):
                        ?>
                        <li class="list-group-item"><a href="/product.php?orderby=<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <?php 

                    
                    if(isset($_GET['orderby'])){
                        $category_id = $_GET['orderby'];
                        $sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id WHERE category.id='$category_id'";
                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);
                        $sn=1;
                        $products = mysqli_fetch_all($res,MYSQLI_ASSOC);
                    }else{
                        $sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id";
                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);
                        $sn=1;
                        $products = mysqli_fetch_all($res,MYSQLI_ASSOC);
                    }
                ?>

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


            </div>
            <div class="col-md-2">
                <div class="list-group">
                    <div class="border-bottom-me pb-2" id="border-bottom-me">
                        <!-- <form action="product.php" method="GET"></form>
                            <input class="input float-left d-inline-block" type="text" name="search" id="input" placeholder="Search products" style="font-size: 1rem;">
                            <input type="submit" value="">
                        </form> -->
                            <!-- <span><i class="fas fa-search"></i></span> -->
                            <form class="" action="search.php" method="POST">
                                <div class="input-group">
                                    <input type="text" name="search_string" class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" name="btnsearch" class="btn btn-primary btn-md"><i class="fas fa-search"></i> </button>
                                    </span>
                                </div>
                            </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>


    
<script type='text/javascript'>
    let products = <?php echo json_encode($products); ?>;
    console.log(products);
</script>

<script src="/public/Js/header.js"></script>
<script src="/public/Js/shop.js"></script>

</body>
</html>