<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title><?=$title?></title>

    <meta name="keywords" content="<?=$meta_key?>" />
    <meta name="description" content="<?=$meta_desc?>" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?=IMG?>icons/favicon.png">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '<?=JS?>webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="<?=VENDOR?>fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="<?=VENDOR?>fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="<?=VENDOR?>fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="<?=FONTS?>wolmart87d5.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="<?=VENDOR?>fontawesome-free/css/all.min.css">

    <!-- Plugins CSS -->

    <link rel="stylesheet" type="text/css" href="<?=VENDOR?>animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?=VENDOR?>magnific-popup/magnific-popup.min.css">

    <link rel="stylesheet" type="text/css" href="<?=VENDOR?>photoswipe/photoswipe.min.css">
    <link rel="stylesheet" type="text/css" href="<?=VENDOR?>photoswipe/default-skin/default-skin.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="<?=VENDOR?>swiper/swiper-bundle.min.css">
    <!-- Plugin CSS -->
    <!-- Default CSS -->
    <?php if ($page == 'index'): ?>
        <link rel="stylesheet" type="text/css" href="<?=CSS?>demo1.min.css">
    <?php else: ?>
        <link rel="stylesheet" type="text/css" href="<?=CSS?>style.min.css">
    <?php endif ?>
    <link rel="stylesheet" type="text/css" href="<?=CSS?>custom.css">
</head>

<body class="home">
    <div class="page-wrapper">
        <!-- Start of Header -->
        <header class="header <?=($page == 'index') ? '' : 'header-border'?>">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to AMZ Store</p>
                    </div>
                    <div class="header-right">
                        <a href="<?=BASEURL?>contact-us" class="d-lg-show">Contact Us</a>
                        <?php if (isset($_SESSION['customer'])): ?>
                            <a href="<?=BASEURL?>my-account" class="d-lg-show">My Account</a>
                            <a href="<?=BASEURL?>logout" class="d-lg-show">Logout</a>
                        <?php else: ?>
                            <a href="<?=BASEURL?>login" class="d-lg-show"><i class="w-icon-account"></i>Sign In / Register</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                        </a>
                        <a href="<?=BASEURL?>" class="logo ml-lg-0">
                            <img src="<?=IMG?>logo.png" alt="logo" width="144" height="45" />
                        </a>
                        <form method="get" action="#"
                            class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
                                    <option value="4">Fashion</option>
                                    <option value="5">Furniture</option>
                                    <option value="6">Shoes</option>
                                    <option value="7">Sports</option>
                                    <option value="8">Games</option>
                                    <option value="9">Computers</option>
                                    <option value="10">Electronics</option>
                                    <option value="11">Kitchen</option>
                                    <option value="12">Clothing</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search in..." required />
                            <button class="btn btn-search" type="submit"><i class="w-icon-search"></i></button>
                        </form>
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="mailto:<?=$setting['email']?>" class="text-capitalize">Mail</a> or:</h4>
                                <a href="tel:<?=$setting['phone']?>" class="phone-number font-weight-bolder ls-50"><?=$setting['phone']?></a>
                            </div>
                        </div>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="#" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count">0</span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>

                                <div class="products">
                                    <?php if (isset($_SESSION['cart'])): ?>
                                        <?php foreach ($_SESSION['cart'] as $key => $cart): ?>
                                            <div class="product product-cart single-cart-box cart-sidebar-item-<?=$cart['item_number']?>"  data-target-item="<?=$cart['item_number']?>">
                                                <input type="hidden" id="final-price-<?=$cart['item_number']?>" name="final_price" value="<?=$cart['gross_price']?>">
                                                <input type="hidden" id="price-<?=$cart['item_number']?>" name="price" value="<?=$cart['price']?>">
                                                <div class="product-detail">
                                                    <a href="<?=BASEURL."product/".$cart['slug']?>" class="product-name"><?=$cart["name"]?></a>
                                                    <div class="price-box">
                                                        <span class="product-quantity"><?=$cart['qty']?></span>
                                                        <span class="product-price">$<?=$cart["price"]?></span>
                                                    </div>
                                                </div>
                                                <figure class="product-media">
                                                    <a href="<?=BASEURL."product/".$cart['slug']?>">
                                                        <img src="<?=UPLOADS.$cart["main_img"]?>" alt="product" height="84"
                                                            width="94" />
                                                    </a>
                                                </figure>
                                                <button id="item-remove-<?=$cart['item_number']?>" data-item-remove="<?=$cart['item_number']?>" title="Remove This Item" class="btn btn-link btn-close item-remove" aria-label="button">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </div>

                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price sidebar-sub-tottal-price-custom">0</span>
                                </div>

                                <div class="cart-action">
                                    <a href="<?=BASEURL?>cart" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="<?=BASEURL?>checkout" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>

                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->
            <div class="header-bottom sticky-content fix-top sticky-header <?=($page == 'index') ? 'has-dropdown' : ''?> ">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown has-border show" data-visible="true">
                                <a href="#" class="category-toggle <?=($page == 'index') ? 'text-dark' : ''?>" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="dropdown-box" style="visibility: hidden; opacity: 0;">
                                    <ul class="menu vertical-menu category-menu">
                                        <?php foreach ($super_cat as $key => $s_cat): ?>
                                            <li>
                                                <a href="<?=BASEURL.'main/'.$s_cat['slug']?>"><?=$s_cat['title']?></a>
                                                <?php 
                                                    $cat = $this->model->cats($s_cat['super_category_id'], "active");
                                                ?>
                                                <?php if ($cat): ?>
                                                    <ul class="menu vertical-menu category-menu" style="min-width: 24rem">
                                                        <?php foreach ($cat as $k_cat => $c): ?>
                                                            <li>
                                                                <a href="<?=BASEURL.'explore/'.$c['slug']?>"><?=$c['title']?></a>
                                                                <?php 
                                                                    $sub_cat = $this->model->sub_cats($c['category_id'], "active");
                                                                ?>
                                                                <?php if ($sub_cat): ?>
                                                                    <ul class="menu vertical-menu category-menu" style="min-width: 24rem">
                                                                        <?php foreach ($sub_cat as $k_sub => $sub): ?>
                                                                            <li><a href="<?=BASEURL.'listing/'.$sub['slug']?>"><?=$sub['title']?></a></li>
                                                                        <?php endforeach ?>
                                                                    </ul>
                                                                <?php endif ?>
                                                            </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                <?php endif ?>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <style>
                                    .category-dropdown:hover .dropdown-box{
                                        visibility: visible !important;
                                        opacity: 1 !important;
                                    }
                                </style>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="<?=($active == 'home' ? 'active' : '')?>">
                                        <a href="<?=BASEURL?>">Home</a>
                                    </li>
                                    <li class="<?=($active == 'shop' ? 'active' : '')?>">
                                        <a href="<?=BASEURL.'shop'?>">Shop</a>
                                    </li>
                                    <li class="<?=($active == 'blog' ? 'active' : '')?>">
                                        <a href="<?=BASEURL.'blog'?>">Blog</a>
                                    </li>
                                    <li class="<?=($active == 'about_us' ? 'active' : '')?>">
                                        <a href="<?=BASEURL.'about-us'?>">About Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->
