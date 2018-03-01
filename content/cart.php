<div class="cart">
    <?php if ($remove_cart == true) { ?>
        <div class="update-success"><span>Product removed from cart!</span></div>
    <?php } ?>
    <?php
    if (empty($_SESSION['cart'])) { ?>
        <div class="empty-cart">
            <h2>Your cart is empty.<br>Shop <a class="hover hover--right" href="<?php echo APP_ROOT ?>shop"><i
                            class="arrow-cnt"></i><span class="hovertxt"><strong>here</strong></span></a></h2>
        </div>

        <?php
    } else { ?>
        <div class="cart__head">
            <h3 class="cart__head-title">Product</h3>
            <h3 class="cart__head-title">Title</h3>
            <h3 class="cart__head-title">Size</h3>
            <h3 class="cart__head-title">Quantity</h3>
            <h3 class="cart__head-title">Price</h3>
        </div>

        <?php


        $token = uniqid();
        $_SESSION['form-token'] = $token;
        foreach ($_SESSION['cart'] as $key => $item) {

            $itemkey = $key;

            /*$created = date("Y-m-d H:i:s", $item['created_at']);
            $min_passed = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s", $item['created_at']) . "+20 minutes"));

            $_SESSION['cart-timer'] = false;
            if (date("Y-m-d H:i:s", time()) >= date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s", $item['created_at']) . "+20 minutes"))) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart-timer'] = true;
            }*/

            ?>

            <div class="cart__item">
                <form class="form-cnt form" method="post">
                    <!--input type="hidden" name="created_at" value="<?php echo $created; ?>">
                    <input type="hidden" name="min-passed" value="<?php echo $min_passed; ?>"-->
                    <input type="hidden" name="cart-login" value="1">
                    <input type="hidden" name="form-token" value="<?php echo $token; ?>">
                    <input type="hidden" class="item-key" name="item-key" value="<?php echo $key ?>">
                    <input type="hidden" name="product-id" value="<?php echo $item['id'] ?>">
                    <div class="form-cnt__group form-cnt__img">
                        <input type="hidden" name="img" value="<?php echo $item['img'] ?>">
                        <img src="<?php echo APP_ROOT . "assets/imgs/products/" . $item['img'] ?>" alt="">
                    </div>
                    <div class="form-cnt__group form-cnt__title">
                        <input type="text" name="title" readonly
                               value="<?php echo $item['title']; ?>">
                    </div>
                    <div class="form-cnt__group form-cnt__size">
                        <!--<input type="text" name="size-<?php /*echo $item['id'] */ ?>" readonly
                           value="<?php /*echo $item['selected-size'] */ ?>">-->

                        <?php
                        $sizes = explode(",", $item['available-sizes']);
                        foreach ($sizes as $key => $size) { ?>
                            <div class="sizes__cnt">
                                <input type="radio" <?php echo ($item['selected-size'] == $size) ? 'checked' : '' ?>
                                       name="size-<?php echo $itemkey ?>"
                                       id="size-<?php echo $size . ":" . $itemkey ?>" class="check-input"
                                       value="<?php echo $size; ?>">
                                <label class="def-label"
                                       for="size-<?php echo $size . ":" . $itemkey ?>"><?php echo $size ?>
                                    <span class="check-ico"></span>
                                </label>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="form-cnt__group form-cnt__quantity">
                        <div class="quantity">
                            <div class="quantity-input">
                                <span class="minus"></span>
                                <span contenteditable="true" class="number"><?php echo $item['quantity'] ?></span>
                                <span class="plus"></span>
                            </div>
                            <input type="hidden" name="quantity" id="quantity" value="<?php echo $item['quantity'] ?>">
                        </div>
                    </div>
                    <div class="form-cnt__group form-cnt__price">
                        <input type="text"
                               data-default="<?php echo ($item['quantity'] !== '1') ? ($item['price'] / $item['quantity']) : $item['price'] ?>"
                               class="price-value"
                               name="price" readonly
                               value="<?php echo $item['price'] . "€" ?>">
                    </div>
                    <div class="form-cnt__group form-cnt__submit">
                        <button type="submit" class="btn" name="delete-cart"><span class="btn-hover">Remove</span>
                        </button>
                    </div>
                </form>
            </div>
        <?php }
    } ?>
    <?php if (!empty($_SESSION['cart'])) { ?>
        <form class="form-cnt checkout" method="post">
            <div class="cart-payment">
                <p>Accepted payment methods:</p>
                <div class="pay-cnt">
                    <span class="pay-method icon-cc-visa"></span>
                    <span class="pay-method icon-cc-paypal"></span>
                    <span class="pay-method icon-cc-mastercard"></span>
                </div>
            </div>
            <div class="cart-sum">
                <strong>Total:</strong><input type="text" readonly value="" name="sum-price" id="sum-price">
            </div>
            <div class="cart-submit">
                <button type="submit" name="submit-cart" id="submit-cart" class="btn"><span
                            class="btn-hover"><strong>Checkout</strong></span></button>
            </div>
        </form>
    <?php } ?>
</div>