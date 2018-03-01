<?php

$sql = "SELECT * FROM products WHERE id = '{$page[2]}'";
$res = mysqli_query($dblink, $sql);

?>
<div class="form-cnt products">
    <a class="product-action btn" href='<?php echo APP_ROOT ?>backend/products'><span class="btn-hover">All</span>
    </a>
    <a class="product-action product-action--right btn" href='<?php echo APP_ROOT ?>backend/products/new'><span
                class="btn-hover">Add</span>
    </a>
    <?php if ($updated == true) { ?>
        <div class="update-success"><span>Product successfully updated!</span></div>
    <?php } ?>
    <form method="post" enctype="multipart/form-data" class="products__edit form">
        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
        <?php
        $token = uniqid();
        $_SESSION['form-token'] = $token;
        ?>
        <input type="hidden" name="form-token" value="<?php echo $token; ?>">
        <input type="hidden" name="product-id" value="<?php echo $row['id'] ?>">
        <section class="products__edit__cnt">
            <div class="form__group form__title left">
                <div class="form__group__cnt">
                    <input type="text" name="title" id="title" placeholder="title"
                           value="<?php echo $row['title']; ?>">
                    <label class="def-label" for="title">Product Title</label>
                    <span class="focus-line"></span>
                    <?php echo ($error == true && isset($error_msg['title'])) ? "<span class=\"error_msg\">{$error_msg['title']}</span>" : '' ?>
                </div>
            </div>
            <div class="form__group form__price right">
                <div class="form__group__cnt">
                    <input type="number" name="price" id="price" placeholder="price"
                           value="<?php echo $row['price'] ?>">
                    <label class="def-label" for="price">Starting Price<span
                                class="add_txt">(for smallest size)</span></label>
                    <span class="focus-line"></span>
                    <span class="euro">€</span>
                    <?php echo ($error == true && isset($error_msg['price'])) ? "<span class=\"error_msg\">{$error_msg['price']}</span>" : '' ?>
                </div>
            </div>

            <div class="form__group form__descr left">
                <div class="form__group__cnt">
                    <div class="edit-interface">
                        <button id="bold"><span class="icon-bold"></span></button>
                        <button id="italic"><span class="icon-italic"></span></button>
                        <button id="underline"><span class="icon-underline"></span></button>
                    </div>
                    <div contenteditable="true" spellcheck="false"
                         id="description"><?php echo $row['description'] ?></div>
                    <input type="hidden" value="" name="post-description" id="post-description">
                    <label class="def-label" for="description">Product Description</label>
                    <?php echo ($error == true && isset($error_msg['description'])) ? "<span class=\"error_msg\">{$error_msg['description']}</span>" : '' ?>

                </div>
            </div>

            <div class="form__group form__categ left">
                <span class="txt">Choose Category:</span>
                <input <?php echo ($row['category'] == 'drawing') ? 'checked' : '' ?>
                        class="check-input" type="radio" name="categ" id="drawing" value="drawing">
                <label class="def-label" for="drawing">Drawing<span class="check-ico"></span></label>
                <input <?php echo ($row['category'] == 'painting') ? 'checked' : '' ?>
                        class="check-input" type="radio" name="categ" id="painting" value="painting">
                <label class="def-label" for="painting">Painting<span class="check-ico"></span></label>
                <?php echo ($error == true && isset($error_msg['category'])) ? "<span class=\"error_msg\">{$error_msg['category']}</span>" : '' ?>
            </div>

            <div class="form__group form__upload right">
                <input type="hidden" value="" id="imgupdate" name="imgupdate">
                <input type="file" name="product_img" id="product_img">
                <label class="def-label btn" for="product_img"><span class="btn-hover"></span>Change Image</label>
                <span class="icon-cloud-upload ico"></span>
                <span class="icon-pictures2 ico"></span>
                <span class="upload-success"></span>
                <?php echo ($error == true && isset($error_msg['img'])) ? "<span class=\"error_msg btm-0\">{$error_msg['img']}</span>" : '' ?>
                <?php echo (isset($_POST['new-product']) && $error == true && !isset($error_msg['img'])) ? "<span class='error_msg btm-0 btm--0'><em>!</em>Something went wrong..<br><i>Please upload your images again!</i></span>" : '' ?>

            </div>

            <div class="form__group form__size left">
                <span class="txt">Available sizes:</span>
                <div class="form__size__cnt">
                    <input <?php echo (strpos($row['sizes'], "s") !== false) ? 'checked' : '' ?>
                            class="check-input" type="checkbox" name="sizes[]" id="size-s" value="size-s">
                    <label class="def-label" for="size-s">Small (17x24cm)
                        <span class="check-ico"></span>
                    </label>
                </div>
                <div class="form__size__cnt">
                    <input <?php echo (strpos($row['sizes'], "m") !== false) ? 'checked' : '' ?>
                            class="check-input" type="checkbox" name="sizes[]" id="size-m" value="size-m">
                    <label class="def-label" for="size-m">Medium (30x42cm)
                        <span class="check-ico"></span>
                    </label>
                </div>
                <div class="form__size__cnt">
                    <input <?php echo (strpos($row['sizes'], "l") !== false) ? 'checked' : '' ?>
                            class="check-input" type="checkbox" name="sizes[]" id="size-l" value="size-l">
                    <label class="def-label" for="size-l">Large (50x70cm)
                        <span class="check-ico"></span>
                    </label>
                </div>
                <?php echo ($error == true && isset($error_msg['sizes'])) ? "<span class=\"error_msg\">{$error_msg['sizes']}</span>" : '' ?>
            </div>

            <div class="form__group form__status right">
                <div class="form__group__cnt">
                    <div class="arrow-cnt"></div>
                    <select class="def-select" name="status" id="status">
                        <option value="choose">Choose Product status</option>
                        <option <?php echo ($row['status'] == 'live') ? 'selected' : '' ?> value="live">Live</option>
                        <option <?php echo ($row['status'] == 'draft') ? 'selected' : '' ?> value="draft">Draft</option>
                        <option <?php echo ($row['status'] == 'private') ? 'selected' : '' ?> value="private">Private</option>
                    </select>
                    <span class="focus-line"></span>
                    <label class="def-label" for="status"><span class="check-ico"></span></label>
                </div>
            </div>
        </section>
        <div class="products__new__imgprev">
            <img src="<?php echo APP_ROOT . "assets/imgs/products/" . $row['img'] ?>" alt="">
        </div>

        <div class="form__group form__submit center">
            <button type="submit" name="update-product" class="btn"><span
                        class="btn-hover"></span>Update this Product
            </button>
        </div>
    </form>

</div>


<?php } ?>
