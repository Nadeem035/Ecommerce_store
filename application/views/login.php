<!-- Start of Main -->
        <main class="main login-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Sign In</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="<?=BASEURL?>">Home</a></li>
                        <li>Sign In</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container">
                    <div class="login-popup">
                        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                            <ul class="nav nav-tabs text-uppercase" role="tablist">
                                <li class="nav-item">
                                    <a href="#sign-in" class="nav-link active">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sign-up" class="nav-link">Sign Up</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2">
                                <div id="signin-form-alert"></div>
                                <div class="tab-pane active" id="sign-in">
                                    <form action="" method="post" id="sign-in-form">
                                        <div class="form-group">
                                            <label>Phone Number *</label>
                                            <input type="text" class="form-control" name="phone" id="phone-number" required>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label>Password *</label>
                                            <input type="password" class="form-control" name="password" id="password" required>
                                        </div>
                                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                                            <input type="checkbox" class="custom-checkbox" id="remember1">
                                            <label for="remember1">Remember me</label>
                                            <a href="javascript://">Last your password?</a>
                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="sign-up">
                                    <form action="" id="sign-up-form" method="post">
                                        <div class="form-group">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control" name="fname" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" name="lname" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number *</label>
                                            <input type="text" class="form-control" name="phone" id="phone-number" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label>Password *</label>
                                            <input type="password" class="form-control" name="password" id="password" required>
                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="forgot-password">
                                    <form action="" id="sign-up-form" method="post">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">Forgot</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End of Main -->