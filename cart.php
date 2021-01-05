<?php
    include "./php/config/db.connect.php";
    include "./php/config/auth.php";


    $id = $_SESSION['userid'];
    $sql = "select auth.id as customer_id, auth.username as customer_name,product.item_name as product_name,product.*, order_product.* FROM order_product INNER JOIN auth ON order_product.customer_id=auth.id INNER JOIN product ON order_product.product_id=product.id WHERE auth.id='$id'";
    $res = mysqli_query($conn, $sql);
    $preorders = mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/cart.css">
    <!-- <script src="/public/Js/cart.js" type="text/javascript"></script> -->
</head>

<body>

    <div class="shopping-cart">
        <div class="cart-title">
            <h1>CART</h1>
        </div>
        <div class="cart-title-bar">
            <span class="cart-quantity cart-header cart-column">IMG</span>
            <span class="cart-item cart-header cart-column">ITEM</span>
            <span class="cart-price cart-header cart-column">PRICE</span>
            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            <span class="cart-quantity cart-header cart-column">Check Out</span>
            <span class="cart-quantity cart-header cart-column">DELETE</span>
        </div>
        <div class="cart-items">
            <?php 
                foreach($preorders as $preorder):
            ?>
            <form action="/checkout.php?id=<?php echo $preorder['order_product_id'] ?>&customerid=<?php echo $preorder['customer_id']; ?>" method="post">
                <div class="cart-row">

                    <div class="cart-item cart-column">
                        <img class="cart-item-image" src="./images/product/<?php echo $preorder['img'] ?>" width="100" height="100">
                        <span class="cart-item-title"><?php echo $preorder['item_name'] ?></span>
                    </div>
                    <div class="cart-price cart-column">$ <?php echo $preorder['price'] ?></div>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" name='order_quantity' type="number" value="<?php echo $preorder['order_quantity'] ?>">
                    </div>

                    <div class="cart-column">
                        <input type="hidden" name="product_id" value="<?php echo $preorder['product_id']; ?>">
                        <input type="hidden" name="price" value="<?php echo $preorder['price']; ?>">
                        <input type="hidden" name="img" value="<?php echo $preorder['img']; ?>">
                        <button type='submit' name='checkout' class="btn" type="button">Order</button>
                    </div>
                    <div class="cart-column">
                        <button type='submit' name='delete' id="btn-danger" class="btn btn-danger" type="button"> <a href="/cartDel.php?id=<?php echo $preorder['order_product_id'] ?>">REMOVE</a></button>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
        </div>  
        <div class="cart-total">
            <strong class="cart-total-title">Total</strong>
            <span class="cart-total-price">$0</span>
            <button class="btn btn-primary btn-purchase" type="button"><a href="/shop.php">Continue Shopping</a></button>
        </div>
        
    </div>


<script>
function updateCartTotal() {
    let cartRows = document.querySelectorAll(".cart-row");
    let total = 0;
    Array.from(cartRows).forEach((cartRow) => {
      let priceElement = cartRow.querySelector(".cart-price");
      let quantityElement = cartRow.querySelector(".cart-quantity-input");
      let price = parseFloat(priceElement.innerHTML.replace("$", ""));
      let quantity = quantityElement.value;
      total += price * quantity;
      cartRow
        .querySelector(".cart-quantity-input")
        .addEventListener("change", qualityChange);
    });
  
    total = Math.round(total * 100) / 100;
    document.querySelector(".cart-total-price").innerHTML = "$ " + total;
  }
  function qualityChange(e) {
    let input = e.target;
    if (isNaN(input.value) || input.value <= -1) {
      input.value = 0;
    }
    updateCartTotal();
  }
  
  window.addEventListener("change", () => {
    updateCartTotal();
  });
  window.addEventListener("load", () => {
    updateCartTotal();
  });
  console.log("It's Worked!");
</script>

    
</body>

</html>