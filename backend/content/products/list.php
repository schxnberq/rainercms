<?php
$sql = "SELECT * FROM products WHERE status != 'deleted'";
$res = mysqli_query($dblink, $sql);
$row = mysqli_fetch_all($res, MYSQLI_ASSOC);


?>
<div class="products form-cnt">
    <a class="product-action btn products__add" href='<?php echo APP_ROOT ?>backend/products/new'><span
                class="btn-hover">Add</span>
    </a>
    <div class="products__head">
        <h3>Image</h3>
        <h3>Title</h3>
        <h3>Category</h3>
        <h3>Status</h3>
        <h3>Action</h3>
    </div>
    <?php foreach ($row as $product) { ?>
        <?php

        /*$paths = explode("::", $product['img']);
        $img = "";
        for ($i = 0; $i < count($paths); $i++) {
            if (preg_match("/^(main;).*$/", $paths[$i])) {
                $img = $paths[$i];
            }
        }*/
        $img = $product['img'];



        ?>
        <div class="products__list">
            <div class="__cnt __cnt__img">
                <a href="<?php echo 'products/edit/' . $product['id'] ?>">
                    <img src="<?php echo APP_ROOT . "assets/imgs/products/" . $img ?>"
                         alt="<?php echo $product['category'] ?>">
                </a>
            </div>
            <div class="__cnt __cnt__title">
                <h4><?php echo $product['title'] ?></h4>
            </div>
            <div class="__cnt __cnt__category">
                <span><?php echo $product['category'] ?></span>
            </div>
            <div class="__cnt __cnt__status <?php echo $product['status'] ?>">
                <span><?php echo $product['status'] ?></span>
            </div>
            <!--<div class="__cnt __cnt__status">
                <span><?php /*echo $product['status'] */ ?></span>
            </div>-->
            <div class="__cnt __cnt__action">
                <a class="btn action-btn" href="<?php echo APP_ROOT . "backend/products/edit/" . $product['id'] ?>">
                    <span class="btn-hover">Edit</span>
                </a>
                <input type="checkbox" <?php echo "id=\"delete-{$product['id']}\" name=\"delete-{$product['id']}\"" ?>>
                <label class="btn action-btn" for="delete-<?php echo $product['id'] ?>">
                    <span class="btn-hover">Delete</span>
                </label>
                <div class="confirm-delete">
                    <span>You really want to delete this product?</span>
                    <div class="buttons">
                        <label class="btn" for="delete-<?php echo $product['id'] ?>"><span class="btn-hover">No!</span></label>
                        <a class="btn" href="<?php echo APP_ROOT . "backend/products/delete/" . $product['id'] ?>"><span class="btn-hover">Yes!</span></a>
                    </div>

                </div>
            </div>
        </div>
    <?php } ?>
</div>

</section>
