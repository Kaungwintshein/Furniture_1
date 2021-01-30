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
    <link rel="stylesheet" href="public/css/style.css">
    <?php include dirname(_FILE_).'/php/includes/head.php'; ?>
    <!-- library -->
    <link rel="stylesheet" href="public/dist/css/grid.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/contact.css">
</head>
<body>
    
        <?php 
            // include dirname(_FILE_)."/php/includes/header.php" ; 
            //include('php/includes/header.php');
        ?>

        <!-- navbar -->
<nav class="nav-container">
    <div class="logo">
        <a href="/" class='text-uppercase text-dark logo-link-desktop'>
            <img src="images/heart.svg" alt="logo">
            Whitlist
        </a>
        <a href="/" class='text-uppercase text-dark logo-link-phone'>
            <img src="images/logo.svg" alt="logo" class='logo-img'>
        </a>
        <div class='navbar-icon'>
            <span class='logo-icon'></span>
            <span class='logo-icon'></span>
            <span class='logo-icon'></span>
        </div>
    </div>
    <ul class="nav">
        <li>
            <a href="index.php" class="text-dark text-capitalize link">Home</a>
        </li>
        <li>
            <a href="about-us.php" class="text-dark text-capitalize link">About</a>
        </li>
        <li>
        <a href="shop.php" class="text-dark text-capitalize link ">Shop</a>
        </li>
        <li class='logo-link-desktop'>
            <a href="#" class="text-dark text-uppercase">
                <img src="images/logo.svg" alt="logo" class='logo-img'>
            </a>
        </li>
        <li>
            <a href="product.php" class="text-dark text-capitalize link ">Products</a>
        </li>
        <li>
            <a href="contact.php" class="text-dark text-capitalize link">Contact</a>
        </li>
        <li>
            <a href="php/config/logout.php" class="text-dark text-capitalize link">Logout</a>
        </li>
    </ul>
    <div class="search-card">
        <a href="#" class="text-dark search">
            <i class="fas fa-search"></i>
        </a>
        <a href="cart.php" class="text-dark cart-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-shopping-bag">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            <span class="rounded-circle bg-dark text-white">0</span>
        </a>
    </div>
</nav>

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
                        <li class="list-group-item"><a href="product.php?orderby=<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                

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

    

    <!-- <button class="btn btn-success"><a href="product.php">Back</a></button> -->


    <script type='text/javascript'>
        let products = <?php echo json_encode($products); ?>;
        console.log(products);
    </script>
<hr>
    <?php include('php/includes/footer.php'); ?>
    <script src="public/Js/header.js"></script>
    <script src="public/Js/shop.js"></script>

</body>
</html>


<!-- 
    stock - 80
    orders stock - 80 = product qty 80
    out of stock
-->