<?php

$sql = "SELECT * FROM products WHERE status = 'live'";
$res = mysqli_query($dblink, $sql);
$row = mysqli_fetch_all($res, MYSQLI_ASSOC);


if ($_SESSION['login'] !== 0 && isset($_SESSION['curr-user'])) {
    $wish_sql = "SELECT * FROM wishlist WHERE user_id = '{$_SESSION['curr-user']['id']}'";
    $wish_res = mysqli_query($dblink, $wish_sql);
    $wish_row = mysqli_fetch_all($wish_res, MYSQLI_ASSOC);

    $wish_items = array();
    foreach ($wish_row as $key => $item) {
        $wish_items[$item['product_id']] = "is-wished";
    }
}

?>

<div class="shop">
    <div class="shop__items">
        <?php if ($_SESSION['login'] !== 1) { ?>
            <div class="wish-redirect">
                <div class="cnt">
                    <div class="exit"></div>
                    <span class="text">You have to be logged in to add products to your wishlist</span>
                    <a href="<?php echo APP_ROOT ?>login/wish=1" class="btn"><span class="btn-hover">Login</span></a>
                    <a href="<?php echo APP_ROOT ?>register/wish=1" class="btn"><span class="btn-hover">Register</span></a>
                </div>
            </div>
        <?php } ?>
        <?php foreach ($row as $product) {

            $img = $product['img'];
            /*$imgDimen = getimagesize(APP_ROOT . "assets/imgs/products/" . $img);


            if ($imgDimen[0] > $imgDimen[1]) {
                $img_format = "lndsc";
            }
            if ($imgDimen[0] < $imgDimen[1]) {
                $img_format = "prtr";
            }
            if ($imgDimen[0] == $imgDimen[1]) {
                $img_format = "squr";
            }*/
            ?>
            <div class="product">
                <a class="product__link" href="<?php echo APP_ROOT . "shop/product/" . $product['id'] ?>"></a>
                <a href="<?php echo ($_SESSION['login'] !== 1) ? APP_ROOT . 'login' : APP_ROOT . 'shop/save_wish/' . $product['id'] ?>"
                   class="wishlist <?php echo ($_SESSION['login'] !== 0 && array_key_exists($product['id'], $wish_items)) ? 'is-wished' : '' ?><?php echo ($_SESSION['login'] !== 1) ? 'login' : '' ?>">
                    <i class="icon-heart-o basic"></i>
                    <i class="icon-heart2 basic--hover"></i>
                    <i class="icon-heart2 icon-anim"></i>
                    <i class="icon-heart2 icon-anim"></i>
                    <i class="icon-heart2 icon-anim"></i>
                </a>

                <div class="product__img">
                    <img src="<?php echo APP_ROOT . "assets/imgs/products/" . $img ?>"
                         alt="<?php echo $product['category'] ?>">

                </div>
                <div class="product__bg">
                    <img src="<?php echo APP_ROOT ?>assets/imgs/products/product-bg_xs.jpg" alt="">
                </div>
                <a class="product__descr"
                   href="<?php echo APP_ROOT . "shop/product/" . $product['id'] ?>"><?php echo $product['title'] ?>
                    <span class="price">€<?php echo $product['price'] ?></span>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
