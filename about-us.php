<?php 
    include "php/config/auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REECO - About Us</title>
  <!-- head css links -->
    <link rel="stylesheet" href="/public/css/style.css">
    <?php include dirname(__FILE__).'/php/includes/head.php'; ?>
    
  <!-- library -->
  <link rel="stylesheet" href="/public/dist/css/grid.css">
  <link rel="stylesheet" href="/public/css/index.css">
    <link rel="stylesheet" href="public/css/about-us.css">
</head>

<body>



    <!--********************************** Kaung Htet Paing *************************************** -->
    <?php include dirname(__FILE__)."/php/includes/header.php" ; ?>

    <section class="title">
        <p class="text">About us</p>
    </section>

    <section class="Rower">
        <div class="choose_place">
            <div>
                <p>FIND YOUR FAVORITE</p>
                <h3>Top Pick For You</h3>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus blanditiis praesentium voluptatum deleniti
                    atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate
                    provident,similique sunt in culpa qui officia deserunt</p>
            </div>
            <div class="room">
                <p>&nbsp;</p>
                <h3>Patio & Outdoor</h3>
                <p>Lorem ipsum dolor sit amet a con sectet adipisicing elit se do eiuso tempor incidid unt ut labore et
                    dolore summ omnia eros mios saro tute er.</p>
                <i>-view more</i>


            </div>
            <div class="room">
                <p>&nbsp;</p>
                <h3>Patio & Outdoor</h3>
                <p>Lorem ipsum dolor sit amet a con sectet adipisicing elit se do eiuso tempor incidid unt ut labore et
                    dolore summ omnia eros mios saro tute er.</p>
                <i>-view more</i>

            </div>

        </div>
    </section>

    <section class="project_gallery">
        <div class="Rower">

            <img src="images/project-gallery-img-04.jpg" alt="gallery-img" class="gallery_img">

        </div>
    </section>

    <section class="Rower">
        <div class="rating_section">
            <div class="room_rating">
                <li>
                    <h3>Funiture<i>68%</i></h3><span class="bar"><span class="funiture"></span></span>
                </li>
                <li>
                    <h3>Crafts<i>91%</i></h3><span class="bar"><span class="crafts"></span></span>
                </li>
                <li>
                    <h3>Handmade<i>82%</i></h3><span class="bar"><span class="handmade"></span></span>
                </li>
                <li>
                    <h3>Organic Food<i>55%</i></h3><span class="bar"><span class="organicfood"></span></span>
                </li>
            </div>

            <div class="find_favor">
                <p>Find Your Favorite</p>
                <h3>A Truly Honest Experiences Made For You</h3>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus</p>
                <button>view more</button>
            </div>
        </div>
    </section>

    <div class="Rower">
        <section class="advertisement">
            <div class="advertise">
                <img src="images/Home-shop-1-600x400.jpg" alt="advertise-product">
                <div class="advertise_text">
                    <h3>Traditional Colour</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore, quas! Eos mollitia,
                        necessitatibus dignissimos aspernatur nisi perspiciatis reprehenderit excepturi, sequi vitae,
                        quidem illum eius.</p>
                    <i>-view more</i>
                </div>
            </div>
            <div class="advertise">
                <img src="images/about_us2-600x400.jpg" alt="advertise-product">
                <div class="advertise_text">
                    <h3>Make It Beautiful</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore, quas! Eos mollitia,
                        necessitatibus dignissimos aspernatur nisi perspiciatis reprehenderit excepturi, sequi vitae,
                        quidem illum eius.</p>
                    <i>-view more</i>
                </div>
            </div>
            <div class="advertise">
                <img src="images/Home-shop-11-600x400.jpg" alt="advertise-product">
                <div class="advertise_text">
                    <h3>Great Packaging</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore, quas! Eos mollitia,
                        necessitatibus dignissimos aspernatur nisi perspiciatis reprehenderit excepturi, sequi vitae,
                        quidem illum eius.</p>
                    <i>-view more</i>
                </div>
            </div>
        </section>
    </div>


    <section class="slider_container">
        <div class="head_title">
            <p>WHAT THEY SAY</p>
            <h3>Testimonials</h3>
        </div>

        <div class="Container">
            <div class="carouel">
                <div class="slider">
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem officia quasi, modi
                        eaque hic nulla consequuntur facilis, in suscipit amet magni, earum illum odit eius illo eum
                        natus asperiores mollitia.
                        <p>-JEFFREY ROY-</p>
                    </div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem officia quasi, modi
                        eaque hic nulla consequuntur facilis, in suscipit amet magni, earum illum odit eius illo eum
                        natus asperiores mollitia.
                        <p>-JEFFREY ROY-</p>
                    </div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem officia quasi, modi
                        eaque hic nulla consequuntur facilis, in suscipit amet magni, earum illum odit eius illo eum
                        natus asperiores mollitia.
                        <p>-JEFFREY ROY-</p>
                    </div>

                </div>


            </div>
            <div class="control">
                <span class="arrow left">
                    <i class="fas fa-arrow-circle-left "></i>
                </span>
                <span class="arrow right">
                    <i class="fas fa-arrow-circle-right icon"></i>
                </span>
            </div>


        </div>

    </section>

    
  <!--********************************** Kaung Wint Shein *************************************** -->
  <?php 


// ----------------Footer-------------
include dirname(__FILE__).'/php/includes/footer.php' ;
// ----------------Scripts-------------
// include dirname(__FILE__).'/php/includes/script.php';
?>
<script src="/public/Js/header.js"></script>
<script src="/public/Js/about_slider.js"></script>

</body>

</html>