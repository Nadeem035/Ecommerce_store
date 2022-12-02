        <!-- Start of Main -->
        <main class="main order">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed">Shopping Cart</li>
                        <li class="passed">Checkout</li>
                        <li class="active">Order Complete</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content mb-10 pb-2">
                <div class="container">
                    <div class="order-success text-center font-weight-bolder text-dark">
                        <i class="fas fa-check"></i>
                        Thank you. Your order has been received.
                    </div>
                    <!-- End of Order Success -->

                    <ul class="order-view list-style-none">
                        <li>
                            <label>Order #</label>
                            <strong><?=$order['order_id']?></strong>
                        </li>
                        <li>
                            <label>Status</label>
                            <strong><?=$order['status']?></strong>
                        </li>
                        <li>
                            <label>Date</label>
                            <strong><?=DATE("F d,Y", strtotime($order['at']))?></strong>
                        </li>
                        <li>
                            <label>Total</label>
                            <strong>$<?=$order['total']?></strong>
                        </li>
                        <li>
                            <label>Payment method</label>
                            <strong>Cash On Delivery</strong>
                        </li>
                    </ul>
                    <!-- End of Order View -->

                    <div class="row">
                        <div class="col-sm-6 mb-8">
                            <div class="order-details-wrapper mb-5">
                                <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th class="text-dark">Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detail as $key => $d): ?>
                                            <tr>
                                                <td>
                                                    <a href="<?=BASEURL.'product/'.$d['slug']?>" target="_blank"><?=$d['name']?></a>&nbsp;<strong>x <?=$d['qty']?></strong><br>
                                                </td>
                                                <td>$<?=$d['gross_price']?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td>$<?=$order['total']?></td>
                                        </tr>
                                        <tr>
                                            <th>Payment method:</th>
                                            <td>Cash On Delivery</td>
                                        </tr>
                                        <tr class="total">
                                            <th class="border-no">Total:</th>
                                            <td class="border-no">$<?=$order['total']?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address billing-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td><?=$order['fname'].' '.$order['lname']?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$order['mobile']?></td>
                                            </tr>
                                            <tr class="email">
                                                <td><?=$order['email']?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$order['city']?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$order['address']?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$order['zip_code']?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                    </div>
                    <!-- End of Account Address -->

                    <a href="<?=BASEURL.'my-account'?>" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Go to Dashboard</a>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->