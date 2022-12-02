 <!-- Start of Main-->
        <main class="main">
            <?php if ($slider): ?>
                <section class="intro-section">
                    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
                        data-swiper-options="{
                        'slidesPerView': 1,
                        'autoplay': {
                            'delay': 8000,
                            'disableOnInteraction': false
                        }
                    }">
                        <div class="swiper-wrapper">
                            <?php foreach ($slider as $key => $s): ?> 
                                <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                                    style="background-image: url(<?=UPLOADS.$s['image']?>);">
                                </div>
                            <?php endforeach ?> 
                        </div>
                        <div class="swiper-pagination"></div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                    <!-- End of .swiper-container -->
                </section>
                <!-- End of .intro-section -->
            <?php endif ?>

            <div class="container">
                <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6" data-swiper-options="{
                    'slidesPerView': 1,
                    'loop': false,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                        <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                            <span class="icon-box-icon icon-shipping">
                                <i class="w-icon-truck"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                                <p class="text-default">For all orders over $99</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                            <span class="icon-box-icon icon-payment">
                                <i class="w-icon-bag"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                                <p class="text-default">We ensure secure payment</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
                            <span class="icon-box-icon icon-money">
                                <i class="w-icon-money"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                                <p class="text-default">Any back within 30 days</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
                            <span class="icon-box-icon icon-chat">
                                <i class="w-icon-chat"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                                <p class="text-default">Call or email us 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Iocn Box Wrapper -->

                <div class="row category-banner-wrapper appear-animate pt-6 pb-8">
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed br-xs">
                            <figure>
                                <a href="<?=$ads['0']['link']?>">
                                    <img src="<?=UPLOADS.$ads['0']['image']?>" alt="Category Banner" class="category-banner-img"
                                    width="610" height="160" style="background-color: #ecedec;" />
                                </a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed br-xs">
                            <figure>
                                <a href="<?=$ads['1']['link']?>">
                                    <img src="<?=UPLOADS.$ads['1']['image']?>" alt="Category Banner" class="category-banner-img"
                                    width="610" height="160" style="background-color: #636363;" />
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
                <!-- End of Category Banner Wrapper -->
            </div>

            <?php if ($super_cat): ?>
                <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
                    <div class="container pb-2">
                        <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories</h2>
                        <div class="swiper">
                            <div class="swiper-container swiper-theme pg-show" data-swiper-options="{
                                'spaceBetween': 20,
                                'slidesPerView': 2,
                                'breakpoints': {
                                    '576': {
                                        'slidesPerView': 3
                                    },
                                    '768': {
                                        'slidesPerView': 5
                                    },
                                    '992': {
                                        'slidesPerView': 6
                                    }
                                }
                            }">
                                <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2">
                                    <?php foreach ($super_cat as $key => $s_cat): ?>
                                        <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                            <a href="<?=BASEURL.'main/'.$s_cat['slug']?>" class="category-media">
                                                <img src="<?=UPLOADS.$s_cat['image']?>" alt="<?=$s_cat['title']?>" class="top-category-images">
                                            </a>
                                            <div class="category-content">
                                                <h4 class="category-name"><?=$s_cat['title']?></h4>
                                                <a href="<?=BASEURL.'main/'.$s_cat['slug']?>" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif ?>
            <!-- End of .category-section top-category -->

            <div class="container">
                <?php if ($new_products || $top_products || $feature_products): ?>
                    <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Products</h2>
                    <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item mr-2 mb-2">
                                <a class="nav-link active br-sm font-size-md ls-normal" href="#tab1-1">New arrivals</a>
                            </li>
                            <li class="nav-item mr-2 mb-2">
                                <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>
                            </li>
                            <li class="nav-item mr-0 mb-2">
                                <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-3">Featured</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End of Tab -->
                    <div class="tab-content product-wrapper appear-animate">
                        <div class="tab-pane active pt-4" id="tab1-1">
                            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols">
                                <?php if ($new_products): ?>
                                    <?php foreach ($new_products as $key => $new): ?>
                                        <div class="product-wrap">
                                            <div class="product text-center">
                                                <figure class="product-media">
                                                    <a href="<?=BASEURL.'product/'.$new['slug']?>">
                                                        <img src="<?=UPLOADS.$new['image']?>" alt="<?=$new['title']?>"
                                                            width="300" height="338" />
                                                    </a>
                                                    <div class="product-action-vertical">
                                                        <a href="<?=BASEURL.'product/'.$new['slug']?>" class="btn-product-icon btn-cart w-icon-cart"
                                                            title="Add to cart"></a>
                                                        <?php if (1 == 2): ?>            
                                                            <a href="javascript://" data-product-id="<?=$new['product_id']?>" class="btn-product-icon btn-quickview-view w-icon-search" title="Quickview"></a>
                                                        <?php endif ?>
                                                    </div>
                                                    <?php if ($new['discount_percentage'] > 0): ?>
                                                        <div class="product-label-group">
                                                            <label class="product-label label-discount"><?=$new['discount_percentage']?>% Off</label>
                                                        </div>
                                                    <?php endif ?>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name"><a href="<?=BASEURL.'product/'.$new['slug']?>"><?=$new['title']?></a></h4>
                                                    <div class="product-price">
                                                        <?php if ($new['discount'] > 0): ?>
                                                            <ins class="new-price">$<?=$new['price'] - $new['discount']?></ins>
                                                            <del class="old-price">$<?=$new['price']?></del>
                                                        <?php else: ?>
                                                            <ins class="new-price">$<?=$new['price']?></ins>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <!-- End of Tab Pane -->
                        <div class="tab-pane pt-4" id="tab1-2">
                            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols">
                                <?php if ($top_products): ?>
                                    <?php foreach ($top_products as $key => $top): ?>
                                        <div class="product-wrap">
                                            <div class="product text-center">
                                                <figure class="product-media">
                                                    <a href="<?=BASEURL.'product/'.$top['slug']?>">
                                                        <img src="<?=UPLOADS.$top['image']?>" alt="<?=$top['title']?>"
                                                            width="300" height="338" />
                                                    </a>
                                                    <div class="product-action-vertical">
                                                        <a href="<?=BASEURL.'product/'.$new['slug']?>" class="btn-product-icon btn-cart w-icon-cart"
                                                            title="Add to cart"></a>
                                                        <a href="javascript://" data-product-id="<?=$top['product_id']?>" class="btn-product-icon btn-quickview w-icon-search"
                                                            title="Quickview"></a>
                                                    </div>
                                                    <?php if ($top['discount_percentage'] > 0): ?>
                                                        <div class="product-label-group">
                                                            <label class="product-label label-discount"><?=$top['discount_percentage']?>% Off</label>
                                                        </div>
                                                    <?php endif ?>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name"><a href="<?=BASEURL.'product/'.$top['slug']?>"><?=$top['title']?></a></h4>
                                                    <div class="product-price">
                                                        <?php if ($top['discount'] > 0): ?>
                                                            <ins class="new-price">$<?=$top['price'] - $top['discount']?></ins>
                                                            <del class="old-price">$<?=$top['price']?></del>
                                                        <?php else: ?>
                                                            <ins class="new-price">$<?=$top['price']?></ins>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <!-- End of Tab Pane -->
                        <div class="tab-pane pt-4" id="tab1-3">
                            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols">
                                <?php if ($feature_products): ?>
                                    <?php foreach ($feature_products as $key => $feature): ?>
                                        <div class="product-wrap">
                                            <div class="product text-center">
                                                <figure class="product-media">
                                                    <a href="<?=BASEURL.'product/'.$feature['slug']?>">
                                                        <img src="<?=UPLOADS.$feature['image']?>" alt="<?=$feature['title']?>"
                                                            width="300" height="338" />
                                                    </a>
                                                    <div class="product-action-vertical">
                                                        <a href="<?=BASEURL.'product/'.$new['slug']?>"class="btn-product-icon btn-cart w-icon-cart"
                                                            title="Add to cart"></a>
                                                        <a href="javascript://" data-product-id="<?=$feature['product_id']?>" class="btn-product-icon btn-quickview w-icon-search"
                                                            title="Quickview"></a>
                                                    </div>
                                                    <?php if ($feature['discount_percentage'] > 0): ?>
                                                        <div class="product-label-group">
                                                            <label class="product-label label-discount"><?=$feature['discount_percentage']?>% Off</label>
                                                        </div>
                                                    <?php endif ?>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name"><a href="<?=BASEURL.'product/'.$feature['slug']?>"><?=$feature['title']?></a></h4>
                                                    <div class="product-price">
                                                        <?php if ($feature['discount'] > 0): ?>
                                                            <ins class="new-price">$<?=$feature['price'] - $feature['discount']?></ins>
                                                            <del class="old-price">$<?=$feature['price']?></del>
                                                        <?php else: ?>
                                                            <ins class="new-price">$<?=$feature['price']?></ins>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <!-- End of Tab Pane -->
                    </div>
                <?php endif ?>
                <!-- End of Tab Content -->

                <div class="row category-cosmetic-lifestyle appear-animate mb-5">
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed category-banner-1 br-xs">
                            <figure>
                                <a href="<?=$ads['3']['link']?>">                                
                                    <img src="<?=UPLOADS.$ads['2']['image']?>" class="category-banner-img" alt="Category Banner"
                                    width="610" height="200" style="background-color: #3B4B48;" />
                                </a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed category-banner-2 br-xs">
                            <figure>
                                <a href="<?=$ads['4']['link']?>">
                                    <img src="<?=UPLOADS.$ads['3']['image']?>" alt="Category Banner" class="category-banner-img"
                                    width="610" height="200" style="background-color: #E5E5E5;" />
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
                <!-- End of Category Cosmetic Lifestyle -->


                <?php if ($sub_category_home): ?>
                    <?php foreach ($sub_category_home as $key => $sub): ?>

                        <?php if ($key == 2): ?>
                            <a href="<?=$ads['4']['link']?>">
                                <div class="banner banner-fashion appear-animate br-sm mb-9 category-banner-img" style="background-image: url(<?=UPLOADS.$ads['4']['image']?>); background-color: #383839;"></div>
                            </a>
                            <!-- End of Banner Fashion -->
                        <?php elseif ($key == 4): ?>
                            <a href="<?=$ads['5']['link']?>">
                                <div class="banner banner-fashion appear-animate br-sm mb-9 category-banner-img" style="background-image: url(<?=UPLOADS.$ads['5']['image']?>); background-color: #383839;"></div>
                            </a>
                        <?php endif ?>

                        <div class="product-wrapper-1 appear-animate mb-5">
                            <div class="title-link-wrapper pb-1 mb-4">
                                <h2 class="title ls-normal mb-0"><?=$sub['title']?></h2>
                                <a href="<?=BASEURL.'listing/'.$sub['slug']?>" class="font-size-normal font-weight-bold ls-25 mb-0">More
                                Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="row">

                                <div class="col-lg-3 col-sm-4 mb-4">
                                    <a href="javascript://">
                                        <div class="banner h-100 br-sm" style="background-image: url(<?=UPLOADS.$sub['home_ad']?>); 
                                            background-color: #ebeced;">
                                        </div>
                                    </a>
                                </div>
                                <!-- End of Banner -->
                                <div class="col-lg-9 col-sm-8">
                                    <?php 
                                        $products = $this->db->query("SELECT * FROM  `product` WHERE `sub_category_id` = '".$sub['sub_category_id']."' AND `status` = 'active' ORDER BY `product_id` DESC LIMIT 6")->result_array();
                                    ?>
                                    <?php if ($products): ?>
                                        <div class="product-wrapper row cols-md-3 cols-sm-2 cols">
                                            <?php foreach ($products as $key => $p): ?>
                                                <div class="product-wrap">
                                                    <div class="product text-center">
                                                        <figure class="product-media">
                                                            <a href="<?=BASEURL.'product/'.$p['slug']?>">
                                                                <img src="<?=UPLOADS.$p['image']?>" alt="<?=$p['title']?>"
                                                                    width="300" height="338" class="category-img-size" />
                                                            </a>
                                                            <div class="product-action-vertical">
                                                                <a href="<?=BASEURL.'product/'.$p['slug']?>" class="btn-product-icon btn-cart w-icon-cart"
                                                                    title="Add to cart"></a>
                                                                    <?php if (1 == 2): ?>
                                                                        <a href="javascript://" data-product-id="<?=$p['product_id']?>" class="btn-product-icon btn-quickview w-icon-search" title="Quickview"></a>
                                                                    <?php endif ?>
                                                            </div>
                                                            <?php if ($p['discount_percentage'] > 0): ?>
                                                                <div class="product-label-group">
                                                                    <label class="product-label label-discount"><?=$p['discount_percentage']?>% Off</label>
                                                                </div>
                                                            <?php endif ?>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name"><a href="<?=BASEURL.'product/'.$p['slug']?>"><?=$p['title']?></a></h4>
                                                            <div class="product-price">
                                                                <?php if ($p['discount'] > 0): ?>
                                                                    <ins class="new-price">$<?=$p['price'] - $p['discount']?></ins>
                                                                    <del class="old-price">$<?=$p['price']?></del>
                                                                <?php else: ?>
                                                                    <ins class="new-price">$<?=$p['price']?></ins>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
                <!-- End of Product Wrapper 1 -->

                <?php if ($blog): ?>
                    <div class="post-wrapper appear-animate mb-4">
                        <div class="title-link-wrapper pb-1 mb-4">
                            <h2 class="title ls-normal mb-0">Our Blog</h2>
                            <a href="<?=BASEURL?>blog" class="font-weight-bold font-size-normal">View All Articles</a>
                        </div>
                        <div class="swiper">
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                'slidesPerView': 1,
                                'spaceBetween': 20,
                                'breakpoints': {
                                    '576': {
                                        'slidesPerView': 2
                                    },
                                    '768': {
                                        'slidesPerView': 3
                                    },
                                    '992': {
                                        'slidesPerView': 4
                                    }
                                }
                            }">
                                <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">
                                    <?php foreach ($blog as $key => $b): ?>
                                        <div class="swiper-slide post text-center overlay-zoom">
                                            <figure class="post-media br-sm">
                                                <a href="<?=BASEURL.'blog/'.$b['slug']?>">
                                                    <img src="<?=UPLOADS.$b['image']?>" alt="<?=$b['title']?>" width="280"
                                                        height="180" style="background-color: #4b6e91;" />
                                                </a>
                                            </figure>
                                            <div class="post-details">
                                                <div class="post-meta">
                                                    <a href="<?=BASEURL.'blog/'.$b['slug']?>" class="post-date mr-0"><?=DATE('d.m.Y', strtotime($b['at']))?></a>
                                                </div>
                                                <h4 class="post-title"><a href="<?=BASEURL.'blog/'.$b['slug']?>"><?=$b['title']?></a>
                                                </h4>
                                                <a href="<?=BASEURL.'blog/'.$b['slug']?>" class="btn btn-link btn-dark btn-underline">Read More<i class="w-icon-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Post Wrapper -->
                <?php endif ?>

                <?php if ( 1==2 && $new_products): ?>
                    <h2 class="title title-underline mb-4 ls-normal appear-animate">Your Recent Views</h2>
                    <div class="swiper-container swiper-theme shadow-swiper appear-animate pb-4 mb-8" data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 2,
                        'breakpoints': {
                            '576': {
                                'slidesPerView': 3
                            },
                            '768': {
                                'slidesPerView': 4
                            },
                            '992': {
                                'slidesPerView': 6
                            },
                            '1200': {
                                'slidesPerView': 6
                            }
                        }
                    }">
                        <div class="swiper-wrapper row cols-xl-6 cols-lg-6 cols-md-4 cols-2">
                            <?php foreach ($new_products as $key => $new): ?>
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="<?=BASEURL.'product/'.$new['slug']?>">
                                                <img src="<?=UPLOADS.$new['image']?>" alt="<?=$new['title']?>"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="<?=BASEURL.'product/'.$new['slug']?>" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="javascript://" data-product-id="<?=$new['product_id']?>" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <?php if ($new['discount_percentage'] > 0): ?>
                                                <div class="product-label-group">
                                                    <label class="product-label label-discount"><?=$new['discount_percentage']?>% Off</label>
                                                </div>
                                            <?php endif ?>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="<?=BASEURL.'product/'.$new['slug']?>"><?=$new['title']?></a></h4>
                                            <div class="product-price">
                                                <?php if ($new['discount'] > 0): ?>
                                                    <ins class="new-price">$<?=$new['price'] - $new['discount']?></ins>
                                                    <del class="old-price">$<?=$new['price']?></del>
                                                <?php else: ?>
                                                    <ins class="new-price">$<?=$new['price']?></ins>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                <!-- End of Reviewed Producs -->
                <?php endif ?>
            </div>  
            <!--End of Catainer -->
        </main>
        <!-- End of Main -->