<!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="<?=BASEURL?>">Home</a></li>
                        <li><a href="<?=BASEURL.'shop'?>">Shop</a></li>
                        <li>Main</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="shop-content">
                        <!-- Start of Shop Main Content -->
                        <div class="main-content mb-5 mt-5">
                            <?php if ($cat): ?>
                                <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                                    <?php foreach ($cat as $key => $c): ?>
                                        <div class="category category-classic category-absolute overlay-zoom br-xs mb-5">
                                            <a href="<?=BASEURL.'explore/'.$c['slug']?>" class="category-media">
                                                <img src="<?=UPLOADS.$c['image']?>" alt="<?=$c['title']?>" class="top-category-images">
                                            </a>
                                            <div class="category-content">
                                                <h4 class="category-name"><?=$c['title']?></h4>
                                                <a href="<?=BASEURL.'explore/'.$c['slug']?>" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- End of Shop Main Content -->
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->