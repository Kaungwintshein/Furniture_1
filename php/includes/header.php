<!-- navbar -->
<nav class="nav-container">
    <div class="logo">
        <a href="/" class='text-uppercase text-dark logo-link-desktop'>
            <img src="/images/heart.svg" alt="logo">
            Whitlist
        </a>
        <a href="/" class='text-uppercase text-dark logo-link-phone'>
            <img src="/images/logo.svg" alt="logo" class='logo-img'>
        </a>
        <div class='navbar-icon'>
            <span class='logo-icon'></span>
            <span class='logo-icon'></span>
            <span class='logo-icon'></span>
        </div>
    </div>
    <ul class="nav">
        <li>
            <a href="/" class="text-dark text-capitalize link">Home</a>
        </li>
        <li>
            <a href="/about-us.php" class="text-dark text-capitalize link">About</a>
        </li>
        <li>
        <a href="/shop.php" class="text-dark text-capitalize link ">Shop</a>
        </li>
        <li class='logo-link-desktop'>
            <a href="#" class="text-dark text-uppercase">
                <img src="/images/logo.svg" alt="logo" class='logo-img'>
            </a>
        </li>
        <li>
            <a href="/product.php" class="text-dark text-capitalize link ">Products</a>
        </li>
        <li>
            <a href="/contact.php" class="text-dark text-capitalize link">Contact</a>
        </li>
        <li>
            <a href="/php/config/logout.php" class="text-dark text-capitalize link">Logout</a>
        </li>
    </ul>
    <div class="search-card">
        <a href="#" class="text-dark search">
            <i class="fas fa-search"></i>
        </a>
        <a href="/cart.php" class="text-dark cart-box">
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

<!-- header content slider -->
<div class="container_box">
    <div class="Slider">
        <div class="Slide Current">
            <div class="Content">
                <div class="slide_container">
                    <h3 class='text-capitalize'>Lorem ipsum dolor sit amet.</h3>
                    <p class='text-muted'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quos iste
                        molestiae quod maxime
                        fugit!</p>
                    <div class='mt-3'>
                        <a href="#" class='btn btn-dark p-2 text-uppercase d-inline mr-4'>view more</a>
                        <span class='h5'>Only $79.00</span>
                    </div>

                </div>
                <img src="/images/slider-img-1.jpg" class="slider_img" alt="slider">
            </div>
        </div>
        <div class="Slide">
            <div class="Content">
                <div class="slide_container">
                    <h3 class='text-capitalize'>Lorem ipsum dolor sit amet.</h3>
                    <p class='text-muted'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quos iste
                        molestiae quod maxime
                        fugit!</p>
                    <div class='mt-3'>
                        <a href="#" class='btn btn-dark p-2 text-uppercase d-inline mr-4'>view more</a>
                        <span class='h5'>Only $79.00</span>
                    </div>
                </div>
                <img src="/images/slider-img-2.jpg" class="slider_img" alt="slider">
            </div>
        </div>
        <div class="Slide">
            <div class="Content">
                <div class="slide_container">
                    <h3 class='text-capitalize'>Lorem ipsum dolor sit amet.</h3>
                    <p class='text-muted'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quos iste
                        molestiae quod maxime
                        fugit!</p>
                    <div class='mt-3'>
                        <a href="#" class='btn btn-dark p-2 text-uppercase d-inline mr-4'>view more</a>
                        <span class='h5'>Only $79.00</span>
                    </div>
                </div>
                <img src="/images/slider-img-3.jpg" class="slider_img" alt="slider">
            </div>
        </div>
    </div>

    <div class="buttons">
        <button id="prev" class='current'></button>
        <button id="middle"></button>
        <button id="next"></button>
    </div>
</div>