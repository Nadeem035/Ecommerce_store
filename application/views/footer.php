<!-- Start of Footer -->
        <footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
            <div class="footer-newsletter bg-primary">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="icon-box icon-box-side text-white">
                                <div class="icon-box-icon d-inline-flex">
                                    <i class="w-icon-envelop3"></i>
                                </div>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                        Our Newsletter</h4>
                                    <p class="text-white">Get all the latest information on Events, Sales and Offers.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                            <span id="newsletter-form-error"></span>
                            <form method="post" class="newsletter-form input-wrapper input-wrapper-inline input-wrapper-rounded">
                                <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                                    placeholder="Your E-mail Address"  required="required" />
                                <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                        class="w-icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-about">
                                <a href="<?=BASEURL?>" class="logo-footer">
                                    <img src="<?=IMG?>logo_footer.png" alt="logo-footer" width="144"
                                        height="45" />
                                </a>
                                <div class="widget-body">
                                    <p class="widget-about-title">Got Question? Call us 24/7</p>
                                    <a href="tel:<?=$setting['phone']?>" class="widget-about-call"><?=$setting['phone']?></a>
                                    <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                        & coupons ster now toon.
                                    </p>

                                    <div class="social-icons social-icons-colored">
                                        <a href="<?=$setting['facebook_link']?>" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="<?=$setting['google_link']?>" class="social-icon social-google w-icon-google"></a>
                                        <a href="<?=$setting['instagram_link']?>" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Links</h3>
                                <ul class="widget-body">
                                    <li><a href="<?=BASEURL?>">Home</a></li>
                                    <li><a href="<?=BASEURL?>about-us">About Us</a></li>
                                    <li><a href="<?=BASEURL?>contact-us">Contact Us</a></li>
                                    <li><a href="<?=BASEURL?>help">Help</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    <?php if ($_SESSION['user']): ?>
                                        <li><a href="<?=BASEURL?>my-account">My Account</a></li>
                                    <?php else: ?>
                                        <li><a href="<?=BASEURL?>login">Sign In</a></li>
                                    <?php endif ?>
                                    <li><a href="<?=BASEURL?>cart">View Cart</a></li>
                                    <li><a href="<?=BASEURL?>privacy-policy">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <ul class="widget-body">
                                    <li><a href="<?=BASEURL?>faq">FAQ</a></li>
                                    <li><a href="<?=BASEURL?>return-policy">Returns Policy</a></li>
                                    <li><a href="<?=BASEURL?>terms-and-conditions">Term and Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p class="copyright">Copyright © <?=DATE('Y')?> Store. All Rights Reserved.</p>
                    </div>

                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="<?=BASEURL?>" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="<?=BASEURL?>shop" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <?php if (isset($_SESSION['customer'])): ?>
            <a href="<?=BASEURL?>my-account" class="sticky-link">
                <i class="w-icon-account"></i>
                <p>Account</p>
            </a>
            <a href="<?=BASEURL?>logout" class="sticky-link">
                <i class="w-icon-logout"></i>
                <p>Logout</p>
            </a>
        <?php else: ?>
            <a href="<?=BASEURL?>login" class="sticky-link">
                <i class="w-icon-user"></i>
                <p>Sign In</p>
            </a>
        <?php endif ?>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Mian Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="<?=BASEURL?>">Home</a></li>
                        <li><a href="<?=BASEURL?>shop">Shop</a></li>
                        <li><a href="<?=BASEURL?>blog">Blog</a></li>
                        <li><a href="<?=BASEURL?>about-us">About Us</a></li>
                        <li><a href="<?=BASEURL?>contact-us">Contact Us</a></li>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        <?php foreach ($super_cat as $key => $super): ?>
                            <li>
                                <a href="<?=BASEURL.'main/'.$super['slug']?>"><?=$super['title']?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->
    <!-- Start of Quick View -->
    <div class="product product-single product-popup" id="quick-view-block"></div>
    <!-- End of Quick view -->
    <div class="theatre-cover-loader"><img src="<?=IMG?>loader.svg"></div>

    <!-- Plugin JS File -->
    <script src="<?=VENDOR?>jquery/jquery.min.js"></script>
    <script src="<?=VENDOR?>jquery.plugin/jquery.plugin.min.js"></script>
    <script src="<?=VENDOR?>imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?=VENDOR?>zoom/jquery.zoom.js"></script>
    <script src="<?=VENDOR?>jquery.countdown/jquery.countdown.min.js"></script>
    <script src="<?=VENDOR?>isotope/isotope.pkgd.min.js"></script>
    <script src="<?=VENDOR?>magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?=VENDOR?>skrollr/skrollr.min.js"></script>
    <script src="<?=VENDOR?>zoom/jquery.zoom.js"></script>
    <script src="<?=VENDOR?>photoswipe/photoswipe.js"></script>
    <script src="<?=VENDOR?>photoswipe/photoswipe-ui-default.js"></script>
    
    <!-- Swiper JS -->
    <script src="<?=VENDOR?>swiper/swiper-bundle.min.js"></script>

    <!-- Main JS -->
    <script src="<?=JS?>main.min.js"></script>



    <script>
        $(function(){
            get_total_price();
            function get_total_price() {
                var price = 0;
                var count = 0;
                $(".cart-dropdown .products .single-cart-box").each(function(index, p) {
                    count = count + 1;
                    var new_price = $(p).children("input[name='final_price']").val();
                    price = parseInt(new_price)+ + +parseInt(price);
                });

                $(".sidebar-sub-tottal-price-custom").text('$'+price);

                $(".check-out-page-total").text('$'+price);
                $(".check-out-page-total").val(price);
                $(".total-pro.cart-header").text(count);
                
                // $(".check-out-page-count span").text(count);
                // $(".check-out-page-count-input").val(count);
                $('.cart-count').html(count);
                if (count == 0) {
                    $(".check-out-page-form").fadeOut(100);
                }
            }

            $('.contact-us-form').on('submit',  function(event) {
                event.preventDefault();
                $this = $(this);
                $(".theatre-cover-loader").fadeIn(100);
                $.post('<?=BASEURL.'submit-contact-form'?>', {data: $this.serialize()}, function(resp) {
                    $(".theatre-cover-loader").fadeOut(100);
                    resp = $.parseJSON(resp);
                    if (resp.status == true) {
                        $this[0].reset();
                    }
                    $('#contact-form-alert').html(resp.html);
                    setTimeout(function() {
                        $('#contact-form-alert').html(' ');
                    }, 3000);
                });
            });

            $('.newsletter-form').on('submit',  function(event) {
                event.preventDefault();
                $this = $(this);
                $(".theatre-cover-loader").fadeIn(100);
                $.post('<?=BASEURL.'submit-newsletter-form'?>', {data: $this.serialize()}, function(resp) {
                    $(".theatre-cover-loader").fadeOut(100);
                    resp = $.parseJSON(resp);
                    if (resp.status == true) {
                        $this[0].reset();
                    }
                    $('#newsletter-form-error').html(resp.html);
                    setTimeout(function() {
                        $('#newsletter-form-error').html(' ');
                    }, 3000);
                });
            });

            $('#sign-in-form').on('submit', function(event) {
                event.preventDefault();
                $this = $(this);
                $(".theatre-cover-loader").fadeIn(100);
                $.post('<?=BASEURL.'process-login'?>', {data: $this.serialize()}, function(resp) {
                    $(".theatre-cover-loader").fadeOut(100);
                    resp = $.parseJSON(resp);
                    $('#signin-form-alert').html(resp.html);
                    if (resp.status == true) {
                        location.reload();
                    }
                    setTimeout(function() {
                        $('#signin-form-alert').html(' ');
                    }, 3000);
                });
            });

            $('#sign-up-form').on('submit', function(event) {
                event.preventDefault();
                $this = $(this);
                $(".theatre-cover-loader").fadeIn(100);
                $.post('<?=BASEURL.'process-signup'?>', {data: $this.serialize()}, function(resp) {
                    $(".theatre-cover-loader").fadeOut(100);
                    resp = $.parseJSON(resp);
                    $('#signin-form-alert').html(resp.html);
                    if (resp.status == true) {
                        location.reload();
                    }
                    setTimeout(function() {
                        $('#signin-form-alert').html(' ');
                    }, 3000);
                });
            });

            $('.account-change-password-form').on('submit', function(event) {
                event.preventDefault();
                $this = $(this);
                $(".theatre-cover-loader").fadeIn(100);
                $.post('<?=BASEURL.'change-account-password'?>', {data: $this.serialize()}, function(resp) {
                    resp = $.parseJSON(resp);
                    $(".theatre-cover-loader").fadeOut(100);
                    $('#account-change-password-alert').html(resp.html);
                    if (resp.status == true) {
                        window.location.replace("<?=BASEURL.'logout'?>");
                    }
                    setTimeout(function() {
                        $('#account-change-password-alert').html(' ');
                    }, 3000);
                });
            });

            $('.account-details-form').on('submit', function(event) {
                event.preventDefault();
                $this = $(this);
                $(".theatre-cover-loader").fadeIn(100);
                $.post('<?=BASEURL.'change-account-setting'?>', {data: $this.serialize()}, function(resp) {
                    resp = $.parseJSON(resp);
                    $(".theatre-cover-loader").fadeOut(100);
                    $('#account-change-setting-alert').html(resp.html);
                    setTimeout(function() {
                        $('#account-change-setting-alert').html(' ');
                    }, 3000);
                });
            });

            $(document).on('click', '.add-to-cart', function(event) {
                event.preventDefault();
                $(".theatre-cover-loader").fadeIn(100);
                var product_id = $(this).attr('data-product-id');
                var qty = $('.product-selected-qty').val();
                

                var color, size = ''; 
                <?php if ($q['colors']): ?>    
                    color = $("input[name='color']:checked").val();
                <?php endif ?>
                <?php if ($q['sizes']): ?>    
                    size = $("input[name='size']:checked").val();
                <?php endif ?>
                
                // if (color == undefined || size == undefined) {
                //     alert("Please Select Color & Size.");
                //     $(".theatre-cover-loader").fadeOut(100);
                //     return;
                // }
                
                $.post('<?=BASEURL."add-to-cart"?>', {'color': color, 'size': size, 'product_id': product_id, 'qty': qty}, function(resp) {
                    $(".theatre-cover-loader").fadeOut(100);
                    resp = $.parseJSON(resp);
                    if (resp.status == true) {
                        $(".cart-dropdown .products").append(resp.data);
                        AMZSTORE.Minipopup.open({
                            productClass: "product-cart",
                            name: resp.post.name,
                            nameLink: "<?=BASEURL?>"+resp.post.slug,
                            imageSrc: "<?=UPLOADS?>"+resp.post.main_img,
                            imageLink: "<?=BASEURL?>"+resp.post.slug,
                            message: "<p>has been added to cart:</p>",
                            actionTemplate: '<a href="<?=BASEURL?>cart" class="btn btn-rounded btn-sm">View Cart</a><a href="<?=BASEURL?>checkout" class="btn btn-dark btn-rounded btn-sm">Checkout</a>',
                        });
                    }
                    else{
                        alert(resp.msg);
                    }
                    get_total_price();
                });
            });

            $(document).on('click', 'body .item-remove',function(){
                $(".theatre-cover-loader").fadeIn(100);
                var item = $(this).attr('data-item-remove');
                if (item > 0) {
                    $(".theatre-cover-loader").fadeOut(100);
                    $.post('<?=BASEURL?>ajax-item-remove', {item: item}, function(resp) {
                        resp = JSON.parse(resp);
                        if (resp.status == true) {
                            $(".cart-sidebar-item-"+item).remove();
                            get_total_price();
                        }
                    });
                }
            });

            $(document).on('click', 'body .decreaseCartQty',function(){
                $(".theatre-cover-loader").fadeIn(100);
                $this = $(this);
                var item = $(this).attr('data-target');
                var qty = $("#item-qty-"+item).val();
                var price = $("#price-"+item).val();
                if (qty > 0) {
                    var number = parseInt(qty)-1;
                }
                else{
                    number = 1;
                }
                $.post('<?=BASEURL?>ajax-edit-qty', {qty: number,price: price, item: item}, function(resp) {
                    $(".theatre-cover-loader").fadeOut(100);
                    resp = JSON.parse(resp);
                    if (resp.status == true) {
                        var gross_price = number*price;
                        $("#final-price-"+item).val(gross_price);
                        $("#item-qty-"+item).val(number);
                        $this.parent('div').parent('td').parent('tr').children('.product-subtotal').children('.amount').text('$'+gross_price);
                        get_total_price();
                    }
                    else{
                        alert('something wrong, please retry or refresh the webpage.');
                    }
                });
            });

            $(document).on('click', 'body .increaseCartQty',function(){
                $this = $(this);
                $(".theatre-cover-loader").fadeIn(100);
                var item = $(this).attr('data-target');
                var qty = $("#item-qty-"+item).val();
                var price = $("#price-"+item).val();
                if (qty > 0) {
                    var number = parseInt(qty)+ + +1;
                }
                else{
                    number = 1;
                }
                $.post('<?=BASEURL?>ajax-edit-qty', {qty: number,price: price, item: item}, function(resp) {
                    $(".theatre-cover-loader").fadeOut(100);
                    resp = JSON.parse(resp);
                    if (resp.status == true) {
                        var gross_price = number*price;
                        $("#final-price-"+item).val(gross_price);
                        $("#item-qty-"+item).val(number);
                        $this.parent('div').parent('td').parent('tr').children('.product-subtotal').children('.amount').text('$'+gross_price);
                        get_total_price();
                    }
                    else{
                        alert('Not Enough Stock');
                    }
                });
            });

            $(".size-checked-item, .color-checked-item").on('click', function(event) {
                event.preventDefault();
                $this = $(this);
                $(this).parent('li').children('input').val($this.attr('data-id'));
            });

            $("#product-filter-items").on('submit', function(event) {
                event.preventDefault();
            });

            $('.btn-quickview-view').on('click', function(event) {
                $(".theatre-cover-loader").fadeIn(100);
                event.preventDefault();
                $this = $(this);
                $id = $(this).attr('data-product-id');
                $.post('<?=BASEURL.'quick-view'?>', {'product_id': $id}, function(resp) {
                    resp = $.parseJSON(resp);
                    $(".theatre-cover-loader").fadeOut(100);
                    if (resp.status == true) {
                        $('.mfp-content .product-single div').html(resp.data);
                    }
                });
            });
        })
    </script>




</body>
</html>
