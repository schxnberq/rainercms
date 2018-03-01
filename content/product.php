<?php

$sql = "SELECT * FROM products WHERE id = '{$page[2]}'";
$res = mysqli_query($dblink, $sql);
$product = mysqli_fetch_assoc($res);

$sizes_cm = array(
    "s" => "17x24",
    "m" => "30x42",
    "l" => "50x70"
);

$onesize = false;

if (strlen($product['sizes']) > 1) {
    $available_sizes = explode(",", $product['sizes']);
} else {
    $onesize = true;
    $available_sizes = $product['sizes'];
}

?>

<div class="detail">
    <?php
    if ($to_cart == true) { ?>
        <div class="update-success"><span>Product added to cart!</span></div>
    <?php } ?>
    <a class="detail__back-link hover hover--left" href="<?php echo APP_ROOT ?>shop"><span class="hovertxt">back to shop <i class="arrow-cnt"></i></span></a>
    <form method="post" class="form">

        <input type="hidden" name="product-id" value="<?php echo $product['id']; ?>">
        <?php $token = uniqid();
        $_SESSION['form-token'] = $token; ?>
        <input type="hidden" name="form-token" value="<?php echo $token; ?>">
        <input type="hidden" name="created_at" value="<?php echo time(); ?>">
        <article class="detail__info">
            <h1 class="title"><span class="title-lines"><?php echo $product['title'] ?></span></h1>
            <input type="hidden" name="title" value="<?php echo $product['title'] ?>">
            <div class="price-cnt">
                <input readonly type="text" name="price" id="price" class="price"
                       value="<?php echo "{$product['price']}" ?>">
                <em>€</em>
            </div>
            <p class="description"><?php echo $product['description'] ?></p>
            <div class="sizes">
                <input type="hidden" name="available-sizes"
                       value="<?php echo ($onesize == true) ? $available_sizes : implode(",", $available_sizes); ?>">
                <p>Available Sizes <em>(in cm)</em>:</p>
                <?php
                if ($onesize == false) {
                    foreach ($available_sizes as $key => $size) { ?>
                        <div class="sizes__cnt">
                            <input type="radio" <?php echo ($key == 0) ? 'checked' : '' ?> name="size"
                                   id="size-<?php echo $size; ?>" class="check-input" value="<?php echo $size; ?>">
                            <label class="def-label" for="size-<?php echo $size; ?>"><?php echo $sizes_cm[$size] ?>
                                <span class="check-ico"></span>
                            </label>
                        </div>
                    <?php }
                } else { ?>
                    <div class="sizes__cnt">
                        <input type="radio" checked name="size" value="<?php echo $available_sizes ?>"
                               id="size-<?php echo $available_sizes; ?>" class="check-input">
                        <label class="def-label"
                               for="size-<?php echo $available_sizes; ?>"><?php echo $sizes_cm[$available_sizes] ?>
                            <span class="check-ico"></span>
                        </label>
                    </div>
                <?php } ?>

            </div>
            <div class="quantity">
                <p>Quantity</p>
                <div class="quantity-input">
                    <span class="minus"></span>
                    <span contenteditable="true" class="number">1</span>
                    <span class="plus"></span>
                </div>
                <input type="number" name="quantity" id="quantity" value="1">
            </div>
            <div class="add-button">
                <button class="btn" name="add-to-cart" id="add-to-cart"><span class="btn-hover">Add to cart</span>
                </button>
            </div>
        </article>
        <div class="detail__img">
            <input type="hidden" name="img" value="<?php echo $product['img'] ?>">
            <img src="<?php echo APP_ROOT . "assets/imgs/products/" . $product['img'] ?>" alt="">
        </div>
    </form>


</div>
