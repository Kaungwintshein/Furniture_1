<?php 
  include "./php/config/db.connect.php";
  session_start();
  // form cart.php form
  $customer_id = $_GET['customerid'];
  $id = $_GET['id'];
  $product_id = $_POST['product_id'];
  $price = $_POST['price'];
  $order_quantity = $_POST['order_quantity'];
  $img = $_POST['img'];

  // $id = $_GET['id'];
  // $customer_id = $_GET['customerid'];
  // $product_id = $_GET['product_id'];
  // $order_quantity = $_GET['order_quantity'];
  // $img = $_GET['img'];
  // $price = $_GET['price'];
  

// $customer_id,$id,$product_id,$price,$order_quantity,$img

  // $id = $_SESSION['userid'];
  $sql = "select auth.id as customer_id, auth.username as customer_name,product.item_name as product_name,product.*, order_product.* FROM order_product INNER JOIN auth ON order_product.customer_id=auth.id INNER JOIN product ON order_product.product_id=product.id WHERE auth.id='$customer_id'";
  $res = mysqli_query($conn, $sql);
  $preorders = mysqli_fetch_all($res,MYSQLI_ASSOC);
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
    <link rel="stylesheet" href="/public/css/payment.css">
</head>
<body>
<!-- <form style="max-width: 900px;" class="mx-auto">
  <div class="form-row" >
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form> -->

  <form action="final_checkout.php?id=<?php echo $id ?>&customerid=<?php echo $customer_id ?>" method="post">
      <div class="card">
          <div class="card-top border-bottom text-center"> <a href="/cart.php"> Back to shop</a> <span id="logo">reeco.com</span> </div>
          <div class="card-body">
              <div class="row upper"> <span> Shopping bag</span> <span> Order details</span> <span id="payment">Payment</span> </div>
              <div class="row">
                  <div class="col-md-7">
                      <div class="left border">
                          <div class="row"><span class="header">Cash On Delivery </span>
                              <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                          </div>
                              <span>Name:</span> 
                              <input name="buyer_name" placeholder="Linda Williams" required> 
                              <span>Phone Number:</span> 
                              <input name="ph_number" placeholder="+(95) 9 878 728 388" required>
                              <div class="row">
                                <span>Address:</span> 
                                <textarea name="address" id="" rows="5" class="col-md-12" placeholder="Your Address" required></textarea>
                              </div>
                              <!-- $customer_id,$id,$product_id,$price,$order_quantity,$img -->
                              <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>">
                              <input type="hidden" name="id" value="<?php echo $id ?>">
                              <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                              <input type="hidden" name="price" value="<?php echo $price ?>">
                              <input type="hidden" name="order_quantity" value="<?php echo $order_quantity ?>">
                              <input type="hidden" name="img" value="<?php echo $img ?>">
                          
                      </div>
                  </div>
                  <div class="col-md-5">
                      <div class="right border">
                          <div class="header">Order Summary</div>
                          <!-- <p>2 items</p> -->
                          <div class="row item">
                              <div class="col-4 align-self-center"><img class="img-fluid" src="/images/product/<?php echo $img ?>"></div>
                              <div class="col-8">
                                  <div class="row"><b>$ <?php echo $price; ?></b></div>
                                  <div class="row text-muted"><?php //echo $product_name ?></div>
                                  <div class="row"><?php echo $order_quantity; ?></div>
                              </div>
                          </div>
                          <hr>
                          <div class="row lower">
                              <div class="col text-left">Subtotal</div>
                              <div class="col text-right">$ <?php echo $price * $order_quantity; ?></div>
                          </div>
                          <div class="row lower">
                              <div class="col text-left">Delivery</div>
                              <div class="col text-right">Free</div>
                          </div>
                          <div class="row lower">
                              <div class="col text-left"><b>Total to pay</b></div>
                              <div class="col text-right"><b>$ <?php echo $price * $order_quantity; ?></b></div>
                          </div>
                          <div class="row lower">
                          </div> <button type="submit" class="btn" name="orderSubmit">Place order</button>
                          <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                      </div>
                  </div>
              </div>
          </div>
          <div>
        </div>
      </div>
  </form>
  <?php //endforeach; ?>
</body>
</html>