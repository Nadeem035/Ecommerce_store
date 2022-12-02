<!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"><?=$q['title']?></h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="<?=BASEURL?>">Home</a></li>
                        <li><a href="<?=BASEURL?>blog">Blog</a></li>
                        <li><?=$q['title']?></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-8">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="main-content post-single-content" style="max-width: 100%;">
                            <div class="post post-grid post-single">
                                <figure class="post-media br-sm">
                                    <img src="<?=UPLOADS.$q['image']?>" alt="Blog" width="930" height="500" style="height: 500px;" />
                                </figure>
                                <div class="post-details">
                                    <div class="post-meta">
                                        <a href="javascript://" class="post-date"><?=DATE("d.m.Y", strtotime($q['at']))?></a>
                                    </div>
                                    <h2 class="post-title"><a href="javascript://"><?=$q['title']?></a></h2>
                                    <div class="post-content"><p><?=$q['detail']?></p></div>
                                </div>
                            </div>
                            <!-- End Tag -->
                            <h4 class="title title-lg font-weight-bold mt-10 pt-1 mb-5">Related Posts</h4>
                            <div class="swiper">
                                <div class="post-slider swiper-container swiper-theme nav-top pb-2" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 1,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 2
                                        },
                                        '768': {
                                            'slidesPerView': 3
                                        },
                                        '992': {
                                            'slidesPerView': 4
                                        },
                                        '1200': {
                                            'slidesPerView': 4
                                        }
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-xs-2 cols-1">
                                        <?php foreach ($blog as $key => $b): ?>
                                            <?php if ($b['blog_id'] !=  $q['blog_id']): ?>
                                                <div class="swiper-slide post post-grid">
                                                    <figure class="post-media br-sm">
                                                        <a href="<?=BASEURL.'blog/'.$b['slug']?>">
                                                            <img src="<?=UPLOADS.$b['image']?>" alt="Post" width="296"
                                                                height="190" style="background-color: #bcbcb4;" />
                                                        </a>
                                                    </figure>
                                                    <div class="post-details text-center">
                                                        <div class="post-meta">
                                                            <a href="<?=BASEURL.'blog/'.$b['slug']?>" class="post-date"><?=DATE('d.m.Y', strtotime($b['at']))?></a>
                                                        </div>
                                                        <h4 class="post-title mb-3"><a href="<?=BASEURL.'blog/'.$b['slug']?>"><?=$b['title']?></a></h4>
                                                        <a href="<?=BASEURL.'blog/'.$b['slug']?>" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i class="w-icon-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            <?php endif ?> 
                                        <?php endforeach ?>
                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                </div>
                            </div>
                            <!-- End Related Posts -->
                        </div>
                        <!-- End of Main Content -->
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->