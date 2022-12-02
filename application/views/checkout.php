<!-- Start of Main -->
        <main class="main checkout">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="<?=BASEURL?>cart">Shopping Cart</a></li>
                        <li class="active">Checkout</li>
                        <li>Order Complete</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->


            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <?php if (!isset($_SESSION['customer'])): ?>                    
                        <div class="login-toggle">
                            Returning customer? <a href="javascript://"
                                class="show-login font-weight-bold text-uppercase text-dark">Login/Signup</a>
                        </div>
                        <div class="login-content">
                            <p>If you have shopped with us before, please enter your details below. 
                                If you are a new customer, please Signup first to Checkout.</p>
                            <div class="row justify-content-between">
                                <div id="signin-form-alert"></div>
                                <div class="col-md-4">
                                    <h5>Login</h5>
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
                                        <button class="btn btn-rounded btn-login" type="submit">Login</button>
                                    </form>
                                </div>

                                <div class="col-md-6">
                                    <h5>Sign Up</h5>
                                    <form action="" id="sign-up-form" class="row" method="post">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" name="fname" id="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" name="lname" id="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="email" class="form-control" name="email" id="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number *</label>
                                                <input type="text" class="form-control" name="phone" id="phone-number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-5">
                                                <label>Password *</label>
                                                <input type="password" class="form-control" name="password" id="password" required>
                                            </div>
                                        </div>
                                        <button class="btn btn-rounded btn-login" type="submit">Sign Up</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if (1 == 2): ?>
                            
                        <div class="coupon-toggle">
                            Have a coupon? <a href="#"
                                class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                                code</a>
                        </div>
                        <div class="coupon-content mb-4">
                            <p>If you have a coupon code, please apply it below.</p>
                            <div class="input-wrapper-inline">
                                <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code">
                                <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                            </div>
                        </div>
                    <?php endif ?>
                    <form action="<?=BASEURL?>submit-order" class="check-out-page-form" method="post">
                        <input type="hidden" name="total" class="check-out-page-total" required="required" />
                        <input type="hidden" name="items" class="check-out-page-count-input" value="<?=count($_SESSION['cart'])?>" required="required" />
                        <input type="hidden" name="customer_id" value="<?=$customer['customer_id']?>" required="required" />
                        <div class="row mb-9">
                            <div class="col-lg-7 pr-lg-4 mb-4">
                                <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                    Shipping Details
                                </h3>
                                <div class="row gutter-sm">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>First name *</label>
                                            <input type="text" class="form-control form-control-md" name="fname"
                                                required value="<?=$customer['fname']?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Last name *</label>
                                            <input type="text" class="form-control form-control-md" name="lname"
                                                required value="<?=$customer['lname']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutter-sm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City *</label>
                                            <input type="text" class="form-control form-control-md" value="<?=$customer['city']?>" name="city" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ZIP *</label>
                                            <input type="text" class="form-control form-control-md" value="<?=$customer['postcode']?>" name="zip_code" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address *</label>
                                        <input type="text" placeholder="House number and street name"
                                            class="form-control form-control-md mb-2" name="address" value="<?=$customer['address']?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone *</label>
                                            <input type="text" class="form-control form-control-md" value="<?=$customer['phone']?>" name="mobile" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email address *</label>
                                            <input type="email" class="form-control form-control-md" value="<?=$customer['email']?>" name="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="order-notes">Order notes (optional)</label>
                                    <textarea class="form-control mb-0" id="order-notes" name="note" cols="30" rows="4" placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                                <div class="order-summary-wrapper sticky-sidebar">
                                    <h3 class="title text-uppercase ls-10">Your Order</h3>
                                    <div class="order-summary">
                                        <table class="order-table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        <b>Product</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($_SESSION['cart'] as $key => $cart): ?>
                                                    <tr class="bb-no">
                                                        <td class="product-name"><?=$cart['name']?> <i
                                                                class="fas fa-times"></i> <span
                                                                class="product-quantity"><?=$cart['qty']?></span></td>
                                                        <td class="product-total">$<?=$cart['gross_price']?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                <tr class="cart-subtotal bb-no">
                                                    <td>
                                                        <b>Subtotal</b>
                                                    </td>
                                                    <td>
                                                        <b class="sidebar-sub-tottal-price-custom">$0</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="payment-methods" id="payment_method">
                                            <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                            <div class="accordion payment-accordion">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a href="#cash-on-delivery" class="collapse">Cash on delivery</a>
                                                    </div>
                                                    <div id="cash-on-delivery" class="card-body expanded">
                                                        <p class="mb-0">
                                                            Pay with cash upon delivery.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group place-order pt-6">
                                            <?php if (!isset($_SESSION['customer'])): ?>
                                                <button type="button" title="Login to Continue" class="btn btn-block btn-rounded disabled" disabled="disabled" >Please Login To Checkout</button>
                                            <?php else: ?>
                                                <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->