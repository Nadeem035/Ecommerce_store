<!-- Start of Main -->
        <main class="main cart">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="active">Shopping Cart</li>
                        <li>Checkout</li>
                        <li>Order Complete</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-8 pr-lg-4 mb-6">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name"><span>Product</span></th>
                                        <th></th>
                                        <th class="product-price"><span>Price</span></th>
                                        <th class="product-quantity"><span>Quantity</span></th>
                                        <th class="product-subtotal"><span>Subtotal</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($_SESSION['cart']): ?>
                                        <?php foreach ($_SESSION['cart'] as $key => $cart): ?>
                                            <tr class="cart-sidebar-item-<?=$cart['item_number']?>" data-target-item="<?=$cart['item_number']?>">
                                                <input type="hidden" id="final-price-<?=$cart['item_number']?>" name="final_price" value="<?=$cart['gross_price']?>">
                                                <input type="hidden" id="price-<?=$cart['item_number']?>" name="price" value="<?=$cart['price']?>">
                                                <td class="product-thumbnail">
                                                    <div class="p-relative">
                                                        <a href="<?=BASEURL.'product/'.$cart['slug']?>">
                                                            <figure>
                                                                <img src="<?=UPLOADS.$cart['main_img']?>" alt="<?=$cart['name']?>"
                                                                    width="300" height="338">
                                                            </figure>
                                                        </a>
                                                        <button id="item-remove-<?=$cart['item_number']?>" data-item-remove="<?=$cart['item_number']?>" type="submit" class="btn btn-close item-remove" title="Remove This Item"><i class="fas fa-times"></i></button>
                                                    </div>
                                                </td>
                                                <td class="product-name">
                                                    <a href="<?=BASEURL.'product/'.$cart['slug']?>"><?=$cart['name']?></a>
                                                </td>
                                                <td class="product-price"><span class="amount">$<?=$cart['price']?></span></td>
                                                <td class="product-quantity">
                                                    <div class="input-group">
                                                        <input class="form-control cart-item-quantity" type="number" min="1" value="<?=$cart['qty']?>" readonly name="qty" id="item-qty-<?=$cart['item_number']?>">
                                                        <button class="quantity-plus w-icon-plus increaseCartQty" data-target="<?=$cart['item_number']?>"></button>
                                                        <button class="quantity-minus w-icon-minus decreaseCartQty" data-target="<?=$cart['item_number']?>"></button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">$<?=$cart['gross_price']?></span>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>        
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Cart Is Empty</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>

                            <div class="cart-action mb-6">
                                <a href="<?=BASEURL.'shop'?>" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                                <?php if (isset($_SESSION['cart'])): ?>
                                    <a href="<?=BASEURL.'clear-cart'?>" class="btn btn-rounded btn-default btn-clear">Clear Cart</a>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar">
                                <div class="cart-summary mb-4">
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Subtotal</label>
                                        <span class="card-total-price sidebar-sub-tottal-price-custom">$0</span>
                                    </div>

                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="ls-50 card-total-price sidebar-sub-tottal-price-custom">$0</span>
                                    </div>
                                    <a href="<?=BASEURL.'checkout'?>"
                                        class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                        Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->