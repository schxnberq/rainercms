<div class="cart">
    <?php if ($to_cart == true) { ?>
        <div class="update-success"><span>Product added to cart!</span></div>
    <?php } ?>
    <?php
    $sql = "SELECT products.*, wishlist.* FROM products LEFT JOIN wishlist ON products.id = wishlist.product_id WHERE user_id = '{$_SESSION['curr-user']['id']}'";
    $res = mysqli_query($dblink, $sql);
    $product = mysqli_fetch_all($res, MYSQLI_BOTH);


    $token = uniqid();
    $_SESSION['form-token'] = $token;

    foreach ($product as $key => $item) {
        $onesize = false;
        $sizes = "";

        $product_id = $item[0];


        if (strlen($item['sizes']) > 1) {
            $sizes = explode(",", $item['sizes']);
        } else {
            $onesize = true;
            $sizes = $item['sizes'];
        }


        ?>

        <div class="cart__item">
            <form class="form-cnt form" method="post">
                <input type="hidden" name="form-token" value="<?php echo $token; ?>">
                <input type="hidden" class="item-key" name="item-key" value="<?php echo $key ?>">
                <input type="hidden" name="created_at" value="<?php echo time(); ?>">
                <input type="hidden" name="wish-id" value="<?php echo $item['id'] ?>">
                <input type="hidden" name="product-id" value="<?php echo $product_id ?>">
                <div class="form-cnt__group form-cnt__img">
                    <input type="hidden" name="img" value="<?php echo $item['img'] ?>">
                    <img src="<?php echo APP_ROOT . "assets/imgs/products/" . $item['img'] ?>" alt="">
                </div>
                <input type="hidden" name="title" readonly
                       value="<?php echo $item['title']; ?>">
                <div class="form-cnt__group form-cnt__size">
                    <input type="hidden" name="available-sizes"
                           value="<?php echo ($onesize == true) ? $sizes : implode(",", $sizes); ?>">

                    <?php
                    if ($onesize == false) {
                        foreach ($sizes as $key => $size) { ?>
                            <div class="sizes__cnt">
                                <input type="radio" <?php echo ($key == 0) ? 'checked' : '' ?>
                                       name="size"
                                       id="size-<?php echo $size . ":" . $item['id'] ?>" class="check-input"
                                       value="<?php echo $size; ?>">
                                <label class="def-label"
                                       for="size-<?php echo $size . ":" . $item['id'] ?>"><?php echo $size ?>
                                    <span class="check-ico"></span>
                                </label>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="sizes__cnt">
                            <input type="radio" checked name="size" value="<?php echo $sizes ?>"
                                   id="size-<?php echo $sizes; ?>" class="check-input">
                            <label class="def-label" for="size-<?php echo $sizes; ?>"><?php echo $sizes; ?><span
                                        class="check-ico"></span>
                            </label>
                        </div>
                    <?php } ?>

                </div>
                <div class="form-cnt__group form-cnt__quantity">
                    <div class="quantity">
                        <div class="quantity-input">
                            <span class="minus"></span>
                            <span contenteditable="true" class="number">1</span>
                            <span class="plus"></span>
                        </div>
                        <input type="hidden" name="quantity" value="1">
                    </div>
                </div>
                <div class="form-cnt__group form-cnt__price">
                    <input type="text"
                           data-default="<?php echo $item['price'] ?>"
                           class="price-value"
                           name="price" readonly
                           value="<?php echo $item['price'] . "€" ?>">
                </div>
                <div class="form-cnt__group form-cnt__submit">
                    <button type="submit" class="btn" name="delete-wish"><span class="btn-hover">Remove</span></button>
                    <button type="submit" class="btn" name="do-wish"><span
                                class="btn-hover">Add to cart</span></button>
                </div>
            </form>
        </div>
    <?php } ?>
</div>
</div>
