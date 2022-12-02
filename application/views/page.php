<!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0"><?=$page['title']?></h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-8">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="<?=BASEURL?>">Home</a></li>
                        <li><?=$page['title']?></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->
            
            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <section class="introduce mb-10 pb-10">
                        <?php if ($page['image']): ?>
                            <figure class="br-lg mb-4">
                                <img src="<?=UPLOADS.$page['image']?>" alt="<?=$page['title']?>" 
                                    width="1240" height="540" style="background-color: #D0C1AE;" />
                            </figure>
                        <?php endif ?>
                        <p class=" mx-auto text-center"><?=$page['detail']?></p>
                    </section>
                </div>
            </div>
        </main>
        <!-- End of Main -->