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
</head>

<body>
    <!--********************************** Kaung Htet Paing *************************************** -->
    <?php include dirname(__FILE__)."/php/includes/header.php" ; ?>

    <?php 

$sql = "SELECT * FROM category INNER JOIN product ON category.id = product.category_id";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);
$sn=1;
$products = mysqli_fetch_all($res,MYSQLI_ASSOC);

mysqli_close($conn);


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
<!--********************************** Kaung Wint Shein *************************************** -->
<?php 


// ----------------Footer-------------
include dirname(__FILE__).'/php/includes/footer.php' ;
// ----------------Scripts-------------
// include dirname(__FILE__).'/php/includes/script.php';
?>

<script type='text/javascript'> 

let products = <?php echo json_encode($products); ?>;

    // $.ajax({
    //     method: "post",
    //     url: "addtocart.php",
    //     data: {
    //         "id": id
    //     }, 
    //     success: function(){

    //     }
    // })


</script>

    <script src="/public/Js/header.js"></script>
    <script src="/public/Js/shop.js"></script>
</body>

</html>