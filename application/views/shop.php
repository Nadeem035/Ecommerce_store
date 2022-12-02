<!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="<?=BASEURL?>">Home</a></li>
                        <li>Main</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">

                    <!-- Start of Shop Category -->
                    <?php if ($super_cat): ?>                        
                        <div class="shop-default-category category-ellipse-section mb-6" style="border-bottom: none">
                            <div class="container">
                                <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                                    <?php foreach ($super_cat as $key => $cat): ?>
                                        <div class="category category-classic category-absolute overlay-zoom br-xs mb-5">
                                            <a href="<?=BASEURL.'main/'.$cat['slug']?>" class="category-media">
                                                <img src="<?=UPLOADS.$cat['image']?>" alt="<?=$cat['title']?>" class="top-category-images">
                                            </a>
                                            <div class="category-content">
                                                <h4 class="category-name"><?=$cat['title']?></h4>
                                                <a href="<?=BASEURL.'main/'.$cat['slug']?>" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <!-- End of Shop Category -->

                    
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->