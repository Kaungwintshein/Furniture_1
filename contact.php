<?php 
    include "php/config/auth.php";
    //echo "<h3>{$_SESSION['contact']}</h3>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us-Furniture store</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <?php include dirname(__FILE__).'/php/includes/head.php'; ?>
    <link rel="stylesheet" href="/public/css/contact.css">
    <link rel="stylesheet" href="/public/css/index.css">
    <script src="/public/Js/header.js"></script>
    <script src="/public/Js/main.js"></script>
</head>
<body>

  <!--********************************** Kaung Htet Paing *************************************** -->
  <?php include dirname(__FILE__)."/php/includes/header.php" ; ?>
    <div class="heading-container d-flex">
        <div class="heading-img-container">
            <div class="heading-bg-img"></div>
        </div>
        <div class="heading-text">
            <div class="container">
                <div class="heading-title-text">
                    Contact Us
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 pt-5 pb-5 border-bottom border-secondary">
        <div class="row">
            <div class="col-md-3 pt-4">
                <h3>Our Address:</h3>
                <p class="contact-city pt-4">San Francisco</p>
                <p class="contact-address pt-1">
                    Address: Spear St, San Francisco <br>
                    Email: maung@gmail.com <br>Phone: +1 234-5678-900
                </p>

                <p class="contact-city pt-4">San Francisco</p>
                <p class="contact-address pt-1">
                    Address: Spear St, San Francisco <br>
                    Email: maung@gmail.com <br>Phone: +1 234-5678-900
                </p>

                <p class="contact-city pt-4">San Francisco</p>
                <p class="contact-address pt-1 mb-5">
                    Address: Spear St, San Francisco <br>
                    Email: maung@gmail.com <br>Phone: +1 234-5678-900
                </p>
            </div>
            <div class="col-md-3 pt-4">
                <h3>Emails:</h3>
                <p class="contact-city pt-4">Toronto</p>
                <p class="contact-address pt-1">
                    Address: Spear St, San Francisco <br>
                    Email: maung@gmail.com <br>Phone: +1 234-5678-900
                </p>

                <p class="contact-city pt-4">Toronto</p>
                <p class="contact-address pt-1">
                    Address: Spear St, San Francisco <br>
                    Email: maung@gmail.com <br>Phone: +1 234-5678-900
                </p>

                <p class="contact-city pt-4">Toronto</p>
                <p class="contact-address pt-1 mb-5">
                    Address: Spear St, San Francisco <br>
                    Email: maung@gmail.com <br>Phone: +1 234-5678-900
                </p>
            </div>
            <div class="col-md-6">
                <h1>Ask Us Anything</h1>
                <form action="insert_contact.php" method="post">
                    <div class="container-fluid mt-5">
                        <div class="border-bottom-me pb-3">
                            <input type="hidden" name="user" value="<?php echo $_SESSION['username'] ?>">
                            <input class="input" type="text" name="username" id="" placeholder="Name*">
                        </div>
                        <div class="border-bottom-me pt-5">
                            <input class="input" type="text" name="email" id="" placeholder="Email*">
                        </div>
                        <div class="border-bottom-me pt-5">
                            <textarea class="input textarea" name="feedback" id="" placeholder="Your Comment" cols="40" rows="5" aria-invalid="false"></textarea>
                        </div>
                        <div class="col-sm-12 submit-btn-me mt-4 mb-5">
                            <input type="submit" name="submit" class="btn btn-dark p-2 btn-submit-me" value="SUBMIT">
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>  
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div>
                    <img class="img-fluid" src="/images/i-decor-img-1.jpg"  alt="">
                </div>
            </div>
            <div class="col-md-6 mt-5 pt-5">
                <p class="trending-text">Trending Interior</p>
                <p class="contact-address" style="font-style: italic;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti</p>
                <p class="contact-address pt-3">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti</p>
                <div class="col-sm-12 submit-btn-me mt-4 mb-5">
                    <input type="submit" class="btn btn-dark p-2 btn-me" value="Discover">
                </div>
            </div>
        </div>
    </div>

    <?php 
        include dirname(__FILE__).'/php/includes/footer.php'; 
        
    ?>
</body>

</html>