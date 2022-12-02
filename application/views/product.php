<!-- Start of Main -->
        <main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav container">
                <ul class="breadcrumb bb-no">
                    <li><a href="<?=BASEURL?>">Home</a></li>
                    <li><?=$q['title']?></li>
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="main-content">
                            <div class="product product-single row">
                                <div class="col-md-6 mb-6">
                                    <div class="product-gallery product-gallery-sticky">
                                        <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                            <div class="swiper-wrapper row cols-1 gutter-no">
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="<?=UPLOADS.$q['image']?>"
                                                            data-zoom-image="<?=UPLOADS.$q['image']?>"
                                                            alt="<?=$q['title']?>" width="800" height="900">
                                                    </figure>
                                                </div>
                                                <?php foreach ($photos as $key => $photo): ?>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="<?=UPLOADS.$photo['image']?>"
                                                                data-zoom-image="<?=UPLOADS.$photo['image']?>"
                                                                alt="<?=$q['title']?>" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                            <!-- <a href="javascript://" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a> -->
                                        </div>
                                        <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                            <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                                <div class="product-thumb swiper-slide">
                                                    <img src="<?=UPLOADS.$q['image']?>"
                                                        alt="<?=$q['title']?>" width="800" height="900">
                                                </div>
                                                <?php if ($photos): ?>
                                                    <?php foreach ($photos as $key => $photo): ?>
                                                        <div class="product-thumb swiper-slide">
                                                            <img src="<?=UPLOADS.$photo['image']?>"
                                                                alt="<?=$q['title']?>" width="800" height="900">
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-6">
                                    <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                        <h1 class="product-title"><?=$q['title']?></h1>
                                        <div class="product-bm-wrapper">
                                            <div class="product-meta">
                                                <div class="product-categories">
                                                    Category:
                                                    <span class="product-category">
                                                        <a href="<?=BASEURL.'explore/'.$sub_cat['title']?>"><?=$sub_cat['title']?></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="product-divider">

                                        <div class="product-price">
                                            <?php if ($q['discount'] > 0): ?>
                                                <ins class="new-price">$<?=$q['price'] - $q['discount']?></ins>
                                                <del class="old-price">$<?=$q['price']?></del>
                                            <?php else: ?>
                                                <ins class="new-price">$<?=$q['price']?></ins>
                                            <?php endif ?>
                                        </div>

                                        <div class="product-short-desc">
                                            <p><?=$q['short_desc']?></p>
                                        </div>

                                        <?php if ($q['qty'] > 0): ?>
                                            
                                            <hr class="product-divider">
                                            <?php if ($q['colors']): ?>
                                                <div class="product-form product-variation-form product-size-swatch">
                                                    <label>Color:</label>
                                                    <div class="flex-wrap d-flex align-items-center product-variations">
                                                        <?php
                                                            $colors = explode(',', $q['colors']); 
                                                        ?>
                                                        <?php foreach ($colors as $key => $color): ?>
                                                            <?php $c = $this->model->get_color_byid($color); ?>
                                                            <?php if ($key == 0): ?>
                                                                <div>   
                                                                    <input class="checkbox-tools" type="radio" name="color" id="<?=$c['name'].'-'.$c['color_id']?>" value="<?=$c['color_id']?>" checked required>
                                                                    <label for="<?=$c['name'].'-'.$c['color_id']?>"><?=$c['full_name']?></label>
                                                                </div>
                                                            <?php else: ?>
                                                                <div>   
                                                                    <input class="checkbox-tools" type="radio" name="color" id="<?=$c['name'].'-'.$c['color_id']?>" value="<?=$c['color_id']?>" required>
                                                                    <label for="<?=$c['name'].'-'.$c['color_id']?>"><?=$c['full_name']?></label>
                                                                </div>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <?php if ($q['sizes']): ?>
                                                <div class="product-form product-variation-form product-size-swatch mb-4">
                                                    <label class="mb-1">Size:</label>
                                                    <div class="flex-wrap d-flex align-items-center product-variations">
                                                        <?php
                                                            $sizes = explode(',', $q['sizes']); 
                                                        ?>
                                                            
                                                        <?php foreach ($sizes as $key => $size): ?>
                                                            <?php $s = $this->model->get_size_byid($size); ?>
                                                            <?php if ($key == 0): ?>
                                                                <div>   
                                                                <input class="checkbox-tools" type="radio" name="size" id="<?=$s['name'].'-'.$s['size_id']?>" value="<?=$s['size_id']?>" checked required>
                                                                <label for="<?=$s['name'].'-'.$s['size_id']?>"><?=$s['full_name']?></label>
                                                            </div>
                                                            <?php else: ?>
                                                                <div>   
                                                                    <input class="checkbox-tools" type="radio" name="size" id="<?=$s['name'].'-'.$s['size_id']?>" value="<?=$s['size_id']?>" required>
                                                                    <label for="<?=$s['name'].'-'.$s['size_id']?>"><?=$s['full_name']?></label>
                                                                </div>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <br>
                                        <?php endif ?>

                                        <div class="product-sticky-content sticky-content">
                                            <div class="product-form container">
                                                <?php if ($q['qty'] > 0): ?>
                                                    <div class="product-qty-form">
                                                        <div class="input-group">
                                                            <input class="quantity form-control product-selected-qty" type="number" min="1"
                                                                max="<?=$q['qty']?>" readonly>
                                                            <button class="quantity-plus w-icon-plus"></button>
                                                            <button class="quantity-minus w-icon-minus"></button>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary d-block add-to-cart" data-product-id="<?=$q['product_id']?>">
                                                        <i class="w-icon-cart"></i>
                                                        <span>Add to Cart</span>
                                                    </button>
                                                <?php else: ?>
                                                    <p>Product Out of Stock</p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#product-tab-description" class="nav-link active">Description</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="product-tab-description">
                                        <div class="row mb-4">
                                            <div class="col-md-12 mb-5">
                                                <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                                <p class="mb-4"><?=$q['detail']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($other_products): ?>
                                <section class="related-product-section">
                                    <div class="title-link-wrapper mb-4">
                                        <h4 class="title">Related Products</h4>
                                        <?php if (count($other_products) > 4) : ?>
                                            <a href="<?=BASEURL.'listing/'.$sub_cat['slug']?>" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                                Products<i class="w-icon-long-arrow-right"></i></a>
                                        <?php endif ?>
                                    </div>
                                    <div class="swiper-container swiper-theme" data-swiper-options="{
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
                                                'slidesPerView': 3
                                            }
                                        }
                                    }">
                                        <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                            <?php foreach ($other_products as $key => $other): ?>
                                                <div class="swiper-slide product">
                                                    <figure class="product-media">
                                                        <a href="<?=BASEURL.'product/'.$other['slug']?>">
                                                            <img src="<?=UPLOADS.$other['image']?>" alt="Product"
                                                                width="300" height="338" />
                                                        </a>
                                                        <div class="product-action-vertical">
                                                            <a href="<?=BASEURL.'product/'.$other['slug']?>" class="btn-product-icon btn-cart w-icon-cart"
                                                                title="Add to cart"></a>
                                                        </div>
                                                        <?php if ( 1 == 2): ?>
                                                            <div class="product-action">
                                                                <a href="javascript://" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                                                            </div>
                                                        <?php endif ?>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="<?=BASEURL.'product/'.$other['slug']?>"><?=$other['title']?></a></h4>
                                                        <div class="product-pa-wrapper">
                                                            <div class="product-price">
                                                                <?php if ($other['discount'] > 0): ?>
                                                                    <ins class="new-price">$<?=$other['price'] - $other['discount']?></ins>
                                                                    <del class="old-price">$<?=$other['price']?></del>
                                                                <?php else: ?>
                                                                    <ins class="new-price">$<?=$other['price']?></ins>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </section>
                            <?php endif ?>
                        </div>
                        <!-- End of Main Content -->
                        <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="javascript://"><i class="close-icon"></i></a>
                            <a href="javascript://" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content scrollable">
                                <div class="sticky-sidebar">
                                    <div class="widget widget-icon-box mb-6">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                                <p>For all orders over $99</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Secure Payment</h4>
                                                <p>We ensure secure payment</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Money Back Guarantee</h4>
                                                <p>Any back within 30 days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Icon Box -->
                                </div>
                            </div>
                        </aside>
                        <!-- End of Sidebar -->
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main