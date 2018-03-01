<?php if ($_SESSION['cart-timer'] == true && empty($_SESSION['cart']) && !isset($_POST['confirm-order'])) { ?>
    <div class="cart-timer">
        <p>Your cart items have been removed! <em>(Items reserved for only 20 minutes)</em></p>
    </div>
<?php }
$token = uniqid();
$_SESSION['form-token'] = $token;

if ($order_confirmed == false) {
    ?>
    <form method="post" class="checkout">
        <input type="hidden" name="form-token" value="<?php echo $token; ?>">
        <div class="checkout__cart">
            <div class="checkout__cart__head">
                <div class="item-count head-item"><?php echo (count($_SESSION['cart']) > 1) ? count($_SESSION['cart']) . " Items" : '1 Item' ?></div>
                <div class="edit-cart head-item"><a href="<?php echo APP_ROOT ?>cart" class="hover hover--left"><span
                                class="hovertxt">Edit Cart</span></a></div>
            </div>
            <?php


            $total = array();
            foreach ($_SESSION['cart'] as $key => $item) {

                $itemkey = $key;
                if (!isset($item)) {
                    "Item removed - 10min over";
                }
                if (date("Y-m-d H:i:s", time()) >= date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s", $item['created_at']) . "+20 minutes"))) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart-timer'] = true;
                }

                array_push($total, $item['price']);
                ?>
                <div class="checkout__cart__item">
                    <input type="hidden" name="product-id[]" value="<?php echo $item['id'] ?>">
                    <div class="item-img"><img src="<?php echo APP_ROOT . 'assets/imgs/products/' . $item['img'] ?>"
                                               alt="<?php echo $item['title'] ?>"></div>
                    <div class="item-info">
                        <div class="item-title"><p><strong><?php echo $item['title'] ?></strong></p></div>
                        <div class="item-size"><p>Size: <strong><?php echo $item['selected-size'] ?></strong></p></div>
                        <input type="hidden" name="size[]" value="<?php echo $item['selected-size'] ?>">
                        <div class="item-quantity"><p>Quantity: <strong><?php echo $item['quantity'] ?></strong></p>
                        </div>
                        <input type="hidden" name="quantity[]" value="<?php echo $item['quantity'] ?>">
                        <input type="hidden" name="price[]" value="<?php echo $item['price'] ?>">
                    </div>
                </div>
            <?php } //ENDFORECH
            $sql = "SELECT fname, lname, street, city, postcode, country, email FROM users WHERE id = '{$_SESSION['curr-user']['id']}'";
            $res = mysqli_query($dblink, $sql);
            $row = mysqli_fetch_assoc($res);
            ?>
            <div class="cart-sum">
                <strong>Sub-total:</strong><input type="text" readonly value="<?php echo array_sum($total) . "€"; ?>"
                                                  name="sub-total" id="sub-total">
                <strong>Shipping:</strong><input type="text" readonly value="+10€"
                                                 name="shipping-price" id="shipping-price">
                <strong>Total:</strong><input type="text" readonly value="<?php echo array_sum($total) . "€"; ?>"
                                              name="sum-price" id="sum-price">
            </div>
        </div>

        <div class="checkout__address form-cnt">
            <div class="checkout__address__title">
                <h3>Delivery Address:</h3>
            </div>
            <section class="form address">
                <div class="form__group form__fname left">
                    <div class="form__group__cnt">
                        <input name="fname" id="fname" class="profile-input" type="text"
                               value="<?php echo $row['fname'] ?>">
                        <label for="" class="def-label">First Name</label>
                        <span class="focus-line"></span>
                        <label for="fname" class="edit edit-1">
                            <span class="icon-pencil"></span>
                        </label>
                        <label for="fname" class="edit edit-2"><span class="icon-pencil"></span><span
                                    class="txt">Editing</span></label>
                        <?php echo (isset($error_msg['fname']) && $error == true) ? "<span class='error_msg'>{$error_msg['fname']}</span>" : '' ?>
                    </div>
                </div>
                <div class="form__group form__lname float">
                    <div class="form__group__cnt">
                        <input name="lname" id="lname" class="profile-input" type="text"
                               value="<?php echo $row['lname'] ?>">
                        <label for="" class="def-label">Last Name</label>
                        <span class="focus-line"></span>
                        <label for="lname" class="edit edit-1">
                            <span class="icon-pencil"></span>
                        </label>
                        <label for="lname" class="edit edit-2"><span class="icon-pencil"></span><span
                                    class="txt">Editing</span></label>
                        <?php echo (isset($error_msg['lname']) && $error == true) ? "<span class='error_msg'>{$error_msg['lname']}</span>" : '' ?>
                    </div>
                </div>
                <div class="form__group form__street left">
                    <div class="form__group__cnt">
                        <input name="street" id="street" class="profile-input" type="text"
                               value="<?php echo $row['street'] ?>">
                        <label for="" class="def-label">Street</label>
                        <span class="focus-line"></span>
                        <label for="street" class="edit edit-1">
                            <span class="icon-pencil"></span>
                        </label>
                        <label for="street" class="edit edit-2"><span class="icon-pencil"></span><span
                                    class="txt">Editing</span></label>
                        <?php echo (isset($error_msg['street']) && $error == true) ? "<span class='error_msg'>{$error_msg['street']}</span>" : '' ?>
                    </div>
                </div>
                <div class="form__group form__city float">
                    <div class="form__group__cnt">
                        <input name="city" id="city" class="profile-input" type="text"
                               value="<?php echo $row['city'] ?>">
                        <label for="" class="def-label">City</label>
                        <span class="focus-line"></span>
                        <label for="city" class="edit edit-1">
                            <span class="icon-pencil"></span>
                        </label>
                        <label for="city" class="edit edit-2"><span class="icon-pencil"></span><span
                                    class="txt">Editing</span></label>
                        <?php echo (isset($error_msg['city']) && $error == true) ? "<span class='error_msg'>{$error_msg['city']}</span>" : '' ?>
                    </div>
                </div>
                <div class="form__group form__postcode left">
                    <div class="form__group__cnt">
                        <input name="postcode" id="postcode" class="profile-input" type="textnumber"
                               value="<?php echo $row['postcode'] ?>">
                        <label for="" class="def-label">Postcode</label>
                        <span class="focus-line"></span>
                        <label for="postcode" class="edit edit-1">
                            <span class="icon-pencil"></span>
                        </label>
                        <label for="postcode" class="edit edit-2"><span class="icon-pencil"></span><span
                                    class="txt">Editing</span></label>
                        <?php echo (isset($error_msg['postcode']) && $error == true) ? "<span class='error_msg'>{$error_msg['postcode']}</span>" : '' ?>
                    </div>
                </div>
                <div class="form__group form__country float">
                    <div class="form__group__cnt">
                        <i class="arrow-cnt"></i>
                        <select class="def-select" name="country" id="country">
                            <option <?php echo ($row['country'] == "austria") ? 'selected' : '' ?> value="austria">
                                Austria
                            </option>
                            <option <?php echo ($row['country'] == "germany") ? 'selected' : '' ?> value="germany">
                                Germany
                            </option>
                            <option <?php echo ($row['country'] == "switzerland") ? 'selected' : '' ?>
                                    value="switzerland">
                                Switzerland
                            </option>
                            <option <?php echo ($row['country'] == "france") ? 'selected' : '' ?> value="france">France
                            </option>
                        </select>
                        <span class="focus-line"></span>
                        <label for="" class="def-label"></label>
                        <?php echo (isset($error_msg['country']) && $error == true) ? "<span class='error_msg'>{$error_msg['country']}</span>" : '' ?>
                    </div>
                </div>
                <div class="form__group form__email left">
                    <div class="form__group__cnt">
                        <input name="email" id="email" class="profile-input" type="email"
                               value="<?php echo $row['email'] ?>">
                        <label for="" class="def-label">E-Mail</label>
                        <span class="focus-line"></span>
                        <label for="email" class="edit edit-1"><span class="icon-pencil"></span></label>
                        <label for="email" class="edit edit-2"><span class="icon-pencil"></span><span
                                    class="txt">Editing</span></label>
                        <?php echo (isset($error_msg['email']) && $error == true) ? "<span class='error_msg'>{$error_msg['email']}</span>" : '' ?>
                    </div>
                </div>
            </section>
        </div>

        <div class="checkout__shipping form">
            <h3 class="checkout__shipping__title">Shipping option:</h3>
            <div class="cnt">
                <input value="standard" checked class="check-input" type="radio" name="shipping" id="standard">
                <label class="def-label" for="standard"></span>Standard delivery <em>10€</em></label>
            </div>
            <div class="cnt">
                <input value="express" class="check-input" type="radio" name="shipping" id="express">
                <label class="def-label" for="express"></span>Express delivery <em>+25€</em></label>
            </div>
            <?php echo (isset($error_msg['shipping']) && $error == true) ? "<span class='error_msg'>{$error_msg['shipping']}</span>" : '' ?>
        </div>

        <div class="checkout__payment form">
            <h3 class="checkout__payment__title">Payment method:</h3>
            <div class="cnt">
                <input value="visa" class="check-input" class="check-input" type="radio" name="payment" id="visa">
                <label class="def-label" for="visa"><span class="icon-cc-visa"></span></span></label>
            </div>
            <div class="cnt">
                <input value="paypal" class="check-input" class="check-input" type="radio" name="payment" id="paypal">
                <label class="def-label" for="paypal"><span class="icon-cc-paypal"></span></span></label>
            </div>
            <div class="cnt">
                <input value="mastercard" class="check-input" type="radio" name="payment" id="mastercard">
                <label class="def-label" for="mastercard"><span class="icon-cc-mastercard"></span></span></label>
            </div>
            <?php echo (isset($error_msg['payment']) && $error == true) ? "<span class='error_msg'>{$error_msg['payment']}</span>" : '' ?>
        </div>

        <div class="checkout__confirm">
            <button name="confirm-order" class="btn"><span class="btn-hover">Place order</span><span
                        class="check-ico"></span></button>
        </div>
    </form>
<?php } else { ?>
    <div class="update-success">
        <h2>Your order has been placed! <em>Check your email for the order confirmation.</em></h2>
        <a class="hover hover--left" href="<?php echo APP_ROOT ?>shop"><span class="hovertxt">Return to shop</span></a>
    </div>
<?php } ?>
