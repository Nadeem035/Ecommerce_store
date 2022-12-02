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
                            <?php if ($sub_cat): ?>
                                <div class="row cols-xl-5 cols-md-4 cols-sm-2 cols">
                                    <?php foreach ($sub_cat as $key => $sub): ?>
                                        <a href="<?=BASEURL.'listing/'.$sub['slug']?>" class="w-100 sub_listing">
                                            <button data-hover="<?=$sub['title']?> Listing!" class="mb-3"><div><?=$sub['title']?></div></button>
                                        </a>
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