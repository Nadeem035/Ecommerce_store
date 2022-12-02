<!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Blog</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-6">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="<?=BASEURL?>">Home</a></li>
                        <li>Blogs</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <?php if ($blog): ?>
                <div class="page-content">
                    <div class="container">
                        <div class="row grid cols-lg-3 cols-md-2 mb-2" data-grid-options="{
                            'layoutMode': 'fitRows'
                        }">                 
                            <?php foreach ($blog as $key => $b): ?>
                                <div class="grid-item">
                                    <article class="post post-mask overlay-zoom br-sm">
                                        <figure class="post-media">
                                            <a href="<?=BASEURL.'blog/'.$b['slug']?>">
                                                <img src="<?=UPLOADS.$b['image']?>" width="600"
                                                    height="420" alt="<?=$b['title']?>">
                                            </a>
                                        </figure>
                                        <div class="post-details">
                                            <div class="post-details-visible">
                                                <h4 class="post-title text-white"><a href="<?=BASEURL.'blog/'.$b['slug']?>"><?=$b['title']?></a>
                                                </h4>
                                            </div>
                                            <div class="post-meta">
                                                <a href="<?=BASEURL.'blog/'.$b['slug']?>" class="post-date"><?=DATE('d.m.Y', strtotime($b['at']))?></a>
                                            </div>
                                        </div>
                        
                                    </article>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <?php if (1 == 2): ?>
                            <ul class="pagination justify-content-center mb-10 pb-2 pt-2 mt-8">
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
                        <?php endif ?>
                    </div>
                </div>
            <!-- End of Page Content -->
            <?php endif ?>
        </main>
        <!-- End of Main -->