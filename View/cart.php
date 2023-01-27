<div id="body_cart">
    <?php 
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg cart-top">
                <h2 class="cart-top__head">Giỏ hàng của bạn</h2>
                <p class="cart-top__text">Có <?=$_SESSION['quantity_cart'];?> sản phẩm trong giỏ hàng</p>
                <a href="?act=cart&mod=empty">empty cart</a><br/><br/>
                <div class="cart-top__block"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="cart-body">
                    <!-- Item -->
                    <?php       
                        foreach ($_SESSION["cart_item"] as $item){
                            $item_price = $item["quantity"]*$item["productUnitPrice"];
                    ?>
                    <!--  var_dump($item);  -->
                    <div class="cart-body__item">
                        <div class="row cart-body__item--wrap">
                            <div class="col-2">
                                <div class="cart-body__item__img">
                                    <img src="./assets/img/product/<?= $item['image']; ?>" alt="">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="cart-body__item__content">
                                    <h3 class="cart-body__item__content-head">
                                        <?= $item['productName'];?>
                                    </h3>
                                    <p class="cart-body__item__content-price">
                                        <?= $item['productUnitPrice']; ?>
                                    </p>
                                    <div class="cart-body__item__content-btn">
                                        <!-- <a href="#" class="cart-body__item__content-btn--plus">-</a> -->
                                        <input type="text" name="" id="" value="<?= $item['quantity']; ?>">
                                        <!-- <a href="#" class="cart-body__item__content-btn--minus">+</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="cart-body__item__end">
                                    <div class="cart-body__item__end-x">
                                        <a href="?act=cart&mod=remove&idProduct=<?=$item['idProduct']; ?>">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                    <p class="cart-body__item__end__sum-price">
                                        <?=$item_price; ?>đ 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["productUnitPrice"]*$item["quantity"]);
                        }
                    ?>
                </div>
            </div>
            <div class="col-4">
                <div class="cart__info-order">
                    <div class="cart__info-order-head">
                        <h2 class="cart__info-order-head--text">
                            Thông tin đơn hàng
                        </h2>
                    </div>
                    <hr>
                    <div class="cart__info-order-price">
                        <span class="cart__info-order-price--text">Tổng tiền</span>
                        <span class="cart__info-order-price--price">
                            <?=$total_price;?>đ
                        </span>
                    </div>
                    <hr>
                    <div class="cart__info-order-text">
                        <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                        <p>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                    </div>
                    <div class="cart__info-order-btn">
                        <a href="?act=pay" class="pay-btn">Thanh toán</a>
                        <p class="continue-buy-btn">
                            <i class="fas fa-backward"></i>
                            Tiếp tục mua hàng
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        } else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg cart-top">
                <h2 class="cart-top__head">Giỏ hàng của bạn</h2>
                <p class="cart-top__text">Giỏ hàng trống</p>
            </div>
        </div>
    </div>
    <?php 
        }
    ?>
</div>

