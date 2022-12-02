<!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">My Account</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html">Home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg">
                        <ul class="nav nav-tabs mb-6" role="tablist">
                            <li class="nav-item">
                                <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-orders" class="nav-link">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-details" class="nav-link">Account details</a>
                            </li>
                            <li class="nav-item">
                                <a href="#change-password" class="nav-link">Change Password</a>
                            </li>
                            <li class="link-item">
                                <a href="<?=BASEURL?>logout" class="nav-link">Logout</a>
                            </li>
                        </ul>

                        <div class="tab-content mb-6">
                            <div class="tab-pane active in" id="account-dashboard">
                                <p class="greeting">
                                    Hello
                                    <span class="text-dark font-weight-bold"><?=$customer['fname'].' ' .$customer['lname']?></span>
                                    (<a href="<?=BASEURL?>logout" class="text-primary">Log out</a>)
                                </p>

                                <p class="mb-4">
                                    From your account dashboard you can view your <a href="#account-orders"
                                        class="text-primary link-to-tab">recent orders</a>, manage your 
                                        <a href="#account-details" class="text-primary link-to-tab">account details </a>, and
                                    <a href="#change-password" class="text-primary link-to-tab">edit your password.</a>
                                </p>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-orders" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Orders</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-details" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Account Details</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#change-password" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-cog2"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Change Password</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Logout</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane mb-4" id="account-orders">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                    </div>
                                </div>

                                <table class="shop-table account-orders-table mb-6 ">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Order</th>
                                            <th class="order-date">Date</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($order as $key => $o): ?>
                                            <tr class="text-center">
                                                <td class="order-id">#<?=$o['order_id']?></td>
                                                <td class="order-date"><?=DATE("F d, Y", strtotime($o['at']))?></td>
                                                <td class="order-status"><?=$o['status']?></td>
                                                <td class="order-total">
                                                    <span class="order-price">$<?=$o['total']?></span> 
                                                </td>
                                                <td class="order-action">
                                                    <a href="<?=BASEURL.'order/'.$o['order_id']?>" data-order-id='<?=$o['order_id']?>' class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>

                                <a href="<?=BASEURL.'shop'?>" class="btn btn-dark btn-rounded btn-icon-right">Go
                                    Shop<i class="w-icon-long-arrow-right"></i></a>
                            </div>


                            <div class="tab-pane" id="account-details">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                    </div>
                                </div>
                                <form class="form account-details-form" method="post">
                                    <div id="account-change-setting-alert"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">First name *</label>
                                                <input type="text" id="firstname" name="fname" placeholder="First Name"
                                                    class="form-control form-control-md" required="required" value="<?=$customer['fname']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Last name *</label>
                                                <input type="text" id="lastname" name="lname" placeholder="Last Name"
                                                    class="form-control form-control-md" required="required" value="<?=$customer['lname']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City *</label>
                                                <input type="text" id="city" name="city" placeholder="City"
                                                    class="form-control form-control-md" required="required" value="<?=$customer['city']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="postcode">Postcode *</label>
                                                <input type="text" id="postcode" name="postcode" placeholder="Postcode"
                                                    class="form-control form-control-md" required="required" value="<?=$customer['postcode']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address *</label>
                                        <input type="text" class="form-control form-control-md" id="address" name="address" placeholder="Address" required="required" value="<?=$customer['address']?>">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email_12">Email *</label>
                                                <input type="text" id="email_12"  placeholder="Email" disabled readonly
                                                    class="form-control form-control-md" required="required" value="<?=$customer['email']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone *</label>
                                                <input type="text" id="phone" placeholder="Phone" disabled readonly
                                                    class="form-control form-control-md" required="required" value="<?=$customer['phone']?>">
                                            </div>
                                        </div>
                                        <p style="border: 1px solid red;color: red; padding: 5px 10px; margin: 0 10px;">This Information Can't changed. you cannot change Email & Phone.</p>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane" id="change-password">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-cog2"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Change Password</h4>
                                    </div>
                                </div>
                                <form class="form account-change-password-form" method="post">
                                    <h4 class="title title-password ls-25 font-weight-bold mt-2">Password change</h4>
                                    <div id="account-change-password-alert"></div>
                                    <div class="form-group">
                                        <label class="text-dark" for="cur-password">Current Password</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="cur-password" name="password" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="new-password">New Password</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="new-password" name="new-password" required="required">
                                    </div>
                                    <div class="form-group mb-10">
                                        <label class="text-dark" for="conf-password">Confirm Password</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="conf-password" name="confirm-password" required="required">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->