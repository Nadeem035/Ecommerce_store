<!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="<?=BASEURL?>">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <!-- Start of Shop Banner -->
                    <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                        style="background-image: url(<?=IMG?>shop/banner1.jpg); background-color: #FFC74E;">
                        <div class="banner-content">
                            <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                            <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                                Watches</h3>
                            <a href="<?=BASEURL.'shop'?>" class="btn btn-dark btn-rounded btn-icon-right">Discover
                                Now<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- End of Shop Banner -->

                    <!-- Start of Shop Category -->
                    <div class="shop-default-category category-ellipse-section mb-6">
                        <div class="swiper-container swiper-theme shadow-swiper"
                            data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 3
                                },
                                '576': {
                                    'slidesPerView': 4
                                },
                                '768': {
                                    'slidesPerView': 6
                                },
                                '992': {
                                    'slidesPerView': 7
                                },
                                '1200': {
                                    'slidesPerView': 8,
                                    'spaceBetween': 30
                                }
                            }
                        }">
                            <div class="swiper-wrapper row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2">
                                <?php foreach ($super_cat as $key => $s): ?>                                    
                                    <div class="swiper-slide category-wrap">
                                        <div class="category category-ellipse">
                                            <figure class="category-media">
                                                <a href="<?=BASEURL.'main/'.$s['slug']?>">
                                                    <img src="<?=UPLOADS.$s['image']?>" alt="<?=$s['title']?>"
                                                        width="190" height="190" style="background-color: #5C92C0;" />
                                                </a>
                                            </figure>
                                            <div class="category-content">
                                                <h4 class="category-name">
                                                    <a href="<?=BASEURL.'main/'.$s['slug']?>"><?=$s['title']?></a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <!-- End of Shop Category -->

                    <!-- Start of Shop Content -->
                    <div class="shop-content row gutter-lg mb-10">
                        <!-- Start of Sidebar, Shop Sidebar -->
                        <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                            <!-- Start of Sidebar Content -->
                            <div class="sidebar-content scrollable">
                                <!-- Start of Sticky Sidebar -->
                                <div class="sticky-sidebar">
                                    <div class="filter-actions">
                                        <label>Filter :</label>
                                        <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                    </div>
                                    <!-- Start of Collapsible widget -->
                                    <?php 
                                        $cat = $this->model->cats($sub_cat['super_category_id'], 'active');
                                    ?>
                                    <?php foreach ($cat as $key => $c): ?>
                                        <div class="widget widget-collapsible">
                                            <h3 class="widget-title collapsed"><label><?=$c['title']?></label></h3>
                                            <ul class="widget-body filter-items search-ul" style="display: none;">
                                                <?php 
                                                    $sub_category = $this->model->sub_cats($c['category_id'], 'active');
                                                ?>
                                                <?php foreach ($sub_category as $key => $sub): ?>
                                                    <li><a href="<?=BASEURL.'listing/'.$sub['slug']?>"><?=$sub['title']?></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    <!-- End of Collapsible Widget -->
                                    <?php endforeach ?>

                                    <form method="post" id="product-filter-items">
                                        <!-- Start of Collapsible Widget -->
                                        <div class="widget widget-collapsible">
                                            <h3 class="widget-title"><label>Price</label></h3>
                                            <div class="widget-body">
                                                <div class="price-range">
                                                    <input type="number" name="min_price" class="min_price text-center" placeholder="Min Amount"><span class="delimiter">-</span>
                                                    <input type="number" name="max_price" class="max_price text-center" placeholder="Max Amount">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Collapsible Widget -->

                                        <?php if ($sizes): ?>
                                            <!-- Start of Collapsible Widget -->
                                            <div class="widget widget-collapsible">
                                                <h3 class="widget-title"><label>Size</label></h3>
                                                <ul class="widget-body filter-items item-check mt-1">
                                                    <?php foreach ($sizes as $key => $size): ?>
                                                        <li>
                                                            <a href="javascript://" data-id="<?=$size['size_id']?>" class="size-checked-item"><?=$size['full_name']?></a>
                                                            <input type="hidden" name="size[]">
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>
                                            <!-- End of Collapsible Widget -->
                                        <?php endif ?>

                                        <?php if ($colors): ?>
                                            <!-- Start of Collapsible Widget -->
                                            <div class="widget widget-collapsible">
                                                <h3 class="widget-title"><label>Color</label></h3>
                                                <ul class="widget-body filter-items item-check mt-1">
                                                    <?php foreach ($colors as $key => $color): ?>
                                                        <li>
                                                            <a href="javascript://" data-id="<?=$color['color_id']?>" class="color-checked-item"><?=$color['full_name']?></a>
                                                            <input type="hidden" name="color[]">
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>
                                        <!-- End of Collapsible Widget -->
                                        <?php endif ?>
                                        <div class="widget mt-2">
                                            <button type="submit" class="btn btn-primary btn-sm btn-block">Filter</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End of Sidebar Content -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </aside>
                        <!-- End of Shop Sidebar -->

                        <!-- Start of Shop Main Content -->
                        <div class="main-content">
                            <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                <div class="toolbox-left">
                                    <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                        btn-icon-left d-block d-lg-none"><i
                                            class="w-icon-category"></i><span>Filters</span></a>
                                    <div class="toolbox-item toolbox-sort select-box text-dark">
                                        <label>Sort By :</label>
                                        <select name="orderby" class="form-control">
                                            <option value="price-low">Sort by pric: low to high</option>
                                            <option value="price-high">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                            </nav>
                            <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                                <?php foreach ($products as $key => $product): ?>
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="<?=BASEURL.'product/'.$product['slug']?>">
                                                    <img src="<?=UPLOADS.$product['image']?>" alt="Product" width="300"
                                                        height="338" />
                                                </a>
                                                <?php if (1 == 2): ?>
                                                <div class="product-action-horizontal">
                                                    <a href="<?=BASEURL.'product/'.$product['slug']?>" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                                        <a href="javascript://" data-product-id="<?=$p['product_id']?>" class="btn-product-icon btn-quickview w-icon-search" title="Quickview"></a>
                                                </div>
                                                <?php endif ?>
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="<?=BASEURL.'listing/'.$sub_cat['slug']?>"><?=$sub_cat['title']?></a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="<?=BASEURL.'product/'.$product['slug']?>"><?=$product['title']?></a>
                                                </h3>
                                                <div class="product-pa-wrapper">
                                                     <div class="product-price">
                                                        <?php if ($product['discount'] > 0): ?>
                                                            <ins class="new-price">$<?=$product['price'] - $product['discount']?></ins>
                                                            <del class="old-price">$<?=$product['price']?></del>
                                                        <?php else: ?>
                                                            <ins class="new-price">$<?=$product['price']?></ins>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>

                            <?php if (1 == 2): ?>
                                <div class="toolbox toolbox-pagination justify-content-between">
                                    <p class="showing-info mb-2 mb-sm-0">
                                        Showing<span>1-12 of 60</span>Products
                                    </p>
                                    <ul class="pagination">
                                        <li class="prev disabled">
                                            <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                                <i class="w-icon-long-arrow-left"></i>Prev
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="next">
                                            <a href="#" aria-label="Next">
                                                Next<i class="w-icon-long-arrow-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- End of Shop Main Content -->
                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->