<?php 
  include "php/config/auth.php";
  // /echo $_SESSION['user'];
    //include "php/config/create-db.php";
    //$db = new CreateDb("reeco","product","category","orders","auth","order_product","localhost","root","123456"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Furniture store</title>

  <!-- head css links -->
    <link rel="stylesheet" href="/public/css/style.css">
    <?php include dirname(__FILE__).'/php/includes/head.php'; ?>
    
  <!-- library -->
  <link rel="stylesheet" href="/public/dist/css/grid.css">
  <link rel="stylesheet" href="/public/css/index.css">

</head>

<body>

  <!--********************************** Kaung Htet Paing *************************************** -->
  <?php include dirname(__FILE__)."/php/includes/header.php" ; ?>
  <!-- **********************************Sai Saing Hein*************************************** -->

<div class="container-fluid" id="container-fluid-me">
  <div class="d-flex img_hover_content">
    <div class="img_showcase_container">
        <div class="container-fluid img_hover_text">
          <h1>Elle Decoration</h1>
          <p>Art, Handmade</p>
        </div>
        <img class="img-fluid" src="/images/portfolio-img-01.jpg" alt="">
      
    </div>
    
    <div class="img_showcase_container">
        <div class="container-fluid img_hover_text">
          <h1>Elle Decoration</h1>
          <p>Art, Handmade</p>
        </div>
        <img class="img-fluid" src="/images/portfolio-img-02.jpg" alt="">
      
    </div>

    <div class="img_showcase_container">
        <div class="container-fluid img_hover_text">
          <h1>Elle Decoration</h1>
          <p>Art, Handmade</p>
        </div>
        <img class="img-fluid" src="/images/portfolio-img-03.jpg" alt="">
      
    </div>

    <div class="img_showcase_container">
        <div class="container-fluid img_hover_text">
          <h1>Elle Decoration</h1>
          <p>Art, Handmade</p>
        </div>
        <img class="img-fluid" src="/images/portfolio-img-04.jpg" alt="">
      
    </div>
  </div>
</div>

<div class="container-fluid" id="container-fluid-me">
  <div class="d-flex img_hover_content">
    <div class="img_showcase_container">
        <div class="container-fluid img_hover_text">
          <h1>Elle Decoration</h1>
          <p>Art, Handmade</p>
        </div>
        <img class="img-fluid" src="/images/portfolio-img-05.jpg" alt="">
      
    </div>
    
    <div class="img_showcase_container">
        <div class="container-fluid img_hover_text">
          <h1>Elle Decoration</h1>
          <p>Art, Handmade</p>
        </div>
        <img class="img-fluid" src="/images/portfolio-img-06.jpg" alt="">
      
    </div>

    <div class="img_showcase_container">
        <div class="container-fluid img_hover_text">
          <h1>Elle Decoration</h1>
          <p>Art, Handmade</p>
        </div>
        <img class="img-fluid" src="/images/portfolio-img-07.jpg" alt="">
      
    </div>

    <div class="img_showcase_container">
        <div class="container-fluid img_hover_text">
          <h1>Elle Decoration</h1>
          <p>Art, Handmade</p>
        </div>
        <img class="img-fluid" src="/images/portfolio-img-08.jpg" alt="">
      
    </div>
  </div>
</div>
  <!--**********************************sithuyannaing*************************************** -->
  <section class="container_6 clear_fix">
    <div class="row" id="rower">
      <div class="col span_1_of_3">
        <div class="work_step">
          <div>1.</div>
          <strong>Home Delivery</strong>
          <p>nec condimentum ligula. Proin acer blandit eros. Sed enim felis varius.</p>
        </div>
      </div>
      <div class="col span_1_of_3 ">
        <div class="work_step">
          <div>2.</div>
          <strong>Money Back</strong>
          <p>Maecenas nec condimentum ligula. Proin acer blandit eros. Sed enim felis varius.</p>
        </div>
      </div>
      <div class="col span_1_of_3  ">
        <div class="work_step">
          <div>3.</div>
          <strong>On-line Purchase</strong>
          <p>Maecenas nec condimentum ligula. Proin acer blandit eros. Sed enim felis varius.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="container_7">
    <div>
      <img src="images/m-home-img-1.jpg" alt="home-item1" class="con7_img1">
    </div>

    <div class="con7">
      <p>
        SHOWROOM OPENED<br>
        <i>Our first shop</i><br>
        At vero eos et accusamus et iusto odi odgnissimos ducimus qui blanditiis praesentium volup tatum deleniti
        atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique
        sunt in culpa qui officia deserunt mollitia animi.
      </p>
      <div>
        <button>Find Funiture</button>
      </div>
    </div>


    <div class="con7">
      <p>FEATURED IN KITCHEN DESIGN<br>
        <i>Everything Goes Online</i><br>
        At vero eos et accusamus et iusto odi odgnissimos ducimus qui blanditiis praesentium volup tatum deleniti
        atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique
        sunt in culpa qui officia deserunt mollitia animi
      </p>
      <div class="con7_data">
        <div>
          <p><i>99+</i><br>Combined with a handful model.</p>
        </div>
        <div>
          <p><i>1,230</i><br>Combined with a handful model.</p>
        </div>
        <div>
          <p><i>546</i><br>Combined with a handful model.</p>
        </div>
        <div>
          <p><i>412+</i><br>Combined with a handful model.</p>
        </div>
      </div>
    </div>
    <div>
      <img src="images/m-home-img-2.jpg" alt="home-item2" class="con7_img2">
    </div>
  </section>

  <section class="container_8 clear_fix">
    <div id="rower">
      <p>FIND YOUR FAVORITE</p>
      <h2>Hot New Arrivals</h2>
      <p style="margin-bottom: 4%;">Lorem ipsum dolor sit amet consectetur adipiscing elit</p>
    </div>

    <div class="row" id="rower">
      <div class="col span_1_of_4">
        <img src="images/product-1-img-1.jpg" alt="product1">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
      <div class="col span_1_of_4">
        <img src="images/product-2-img-1.jpg" alt="product2">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
      <div class="col span_1_of_4">
        <img src="images/product-3-img-1.jpg" alt="product3">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
      <div class="col span_1_of_4">
        <img src="images/product-4-img-1.jpg" alt="product4">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
    </div>
    <div class="row" id="rower">
      <div class="col span_1_of_4">
        <img src="images/product-5-img-1.jpg" alt="product5">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>

      </div>
      <div class="col span_1_of_4">
        <img src="images/product-6-img-1.jpg" alt="product6">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
      <div class="col span_1_of_4">
        <img src="images/product-7-img-1.jpg" alt="product7">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no <br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
      <div class="col span_1_of_4">
        <img src="images/product-8-img-1.jpg" alt="product8">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
    </div>
    <div class="row" id="rower">
      <div class="col span_1_of_4">
        <img src="images/product-9-img-1.jpg" alt="product9">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
      <div class="col span_1_of_4">
        <img src="images/product-10-img-1.jpg" alt="product10">
        <div class="product_pr  ice">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
      <div class="col span_1_of_4">
        <img src="images/product-2-img-1.jpg" alt="product11">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
      <div class="col span_1_of_4">
        <img src="images/product-1-img-1.jpg" alt="product12">
        <div class="product_price">
          <p><span>Rack Small</span><br>
            Etiam mauris nulla, sodales no<br>
            <i>$310.00</i>
          </p>
          
        </div>
      </div>
    </div>
  </section>

  <section class="container_9">
    <div class="row" id="rower">
      <div class="col span_1_of_5">
        <i class="fas fa-gift" style="font-size: 2em;"></i>
        <div class="con9">
          <i>Quality</i>
          <p>At vero eos et accusamus et iusto odio dignissi mos ducimus qui blanditiis praesentium</p>
        </div>
      </div>
      <div class="col span_1_of_5">
        <i class="far fa-heart" style="font-size: 2em;"></i>
        <div class="con9">
          <i>Office</i>
          <p>At vero eos et accusamus et iusto odio dignissi mos ducimus qui blanditiis praesentium</p>
        </div>
      </div>
      <div class="col span_1_of_5">
        <i class="fas fa-home" style="font-size: 2em;"></i>
        <div class="con9">
          <i>Paint & Outdoor</i>
          <p>At vero eos et accusamus et iusto odio dignissi mos ducimus qui blanditiis praesentium</p>
        </div>
      </div>
      <div class="col span_1_of_5">
        <i class="fas fa-feather" style="font-size: 2em;"></i>
        <div class="con9">
          <i>Fragrance</i>
          <p>At vero eos et accusamus et iusto odio dignissi mos ducimus qui blanditiis praesentium</p>
        </div>
      </div>
      <div class="col span_1_of_5">
        <i class="fas fa-award" style="font-size: 2em;"></i>
        <div class="con9">
          <i>Colors</i>
          <p>At vero eos et accusamus et iusto odio dignissi mos ducimus qui blanditiis praesentium</p>
        </div>
      </div>
    </div>

  </section>




  <!-- review slider -->
  <div class="slider_bg">
    <section class="slider section_slider">
      <div class="reviews">
        <h2><span>/</span>reviews</h2>
      </div>
      <div class="slide-container"> </div>
      <!-- buttons -->
      <!-- prev btn -->
      <button class="slider_button prev-btn">
        <i class="fas fa-chevron-left"></i>
      </button>
      <!-- next button -->
      <button class="slider_button next-btn">
        <i class="fas fa-chevron-right"></i>
      </button>
    </section>
  </div>

  <div class="scroll-nav">
    <i class="fas fa-chevron-up"></i>
  </div>


  </div>
  </div>
  </div>



  <!--********************************** Kaung Wint Shein *************************************** -->
  <?php 


    // ----------------Footer-------------
    include dirname(__FILE__).'/php/includes/footer.php' ;
    // ----------------Scripts-------------
    // include dirname(__FILE__).'/php/includes/script.php';
  ?>
  <script src="/public/Js/header.js"></script>
  <script src="/public/Js/main.js"></script>
</body>

</html>