<div class="form-cnt products">
    <?php if ($product_added == false) { ?>
        <a class="product-action btn" href='<?php echo APP_ROOT ?>backend/products'><span class="btn-hover">All</span>
        </a>

        <form method="post" enctype="multipart/form-data" class="products__new form">
            <?php
            $token = uniqid();
            $_SESSION['form-token'] = $token;
            ?>
            <input type="hidden" name="form-token" value="<?php echo $token; ?>">
            <section class="products__new__cnt">
                <div class="form__group form__title left">
                    <div class="form__group__cnt">
                        <input type="text" name="title" id="title" placeholder="title"
                               value="<?php echo(isset($_POST['new-product']) && isset($_POST['title']) ? $_POST['title'] : '') ?>">
                        <label class="def-label" for="title">Product Title</label>
                        <span class="focus-line"></span>
                        <?php echo ($error == true && isset($error_msg['title'])) ? "<span class=\"error_msg\">{$error_msg['title']}</span>" : '' ?>
                    </div>
                </div>
                <div class="form__group form__price right">
                    <div class="form__group__cnt">
                        <input type="number" name="price" id="price" placeholder="price"
                               value="<?php echo(isset($_POST['new-product']) && isset($_POST['price']) ? $_POST['price'] : '') ?>">
                        <label class="def-label" for="price">Starting Price <span
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
                        <div contenteditable="true" spellcheck="false" id="description"></div>
                        <input type="hidden" value="" name="post-description" id="post-description">
                        <label class="def-label" for="description">Product Description</label>
                        <?php echo ($error == true && isset($error_msg['description'])) ? "<span class=\"error_msg\">{$error_msg['description']}</span>" : '' ?>

                    </div>
                </div>

                <div class="form__group form__categ left">
                    <span class="txt">Choose Category:</span>
                    <input <?php echo (isset($_POST['new-product']) && isset($_POST['categ']) && $_POST['categ'] == 'drawing') ? 'checked' : '' ?>
                            class="check-input" type="radio" name="categ" id="drawing" value="drawing">
                    <label class="def-label" for="drawing">Drawing<span class="check-ico"></span></label>
                    <input <?php echo (isset($_POST['new-product']) && isset($_POST['categ']) && $_POST['categ'] == 'painting') ? 'checked' : '' ?>
                            class="check-input" type="radio" name="categ" id="painting" value="painting">
                    <label class="def-label" for="painting">Painting<span class="check-ico"></span></label>
                    <?php echo ($error == true && isset($error_msg['category'])) ? "<span class=\"error_msg\">{$error_msg['category']}</span>" : '' ?>
                </div>

                <div class="form__group form__upload right">
                    <input type="file" name="product_img" id="product_img">
                    <label class="def-label btn" for="product_img"><span class="btn-hover"></span>Upload Image</label>
                    <span class="icon-cloud-upload ico"></span>
                    <span class="icon-pictures2 ico"></span>
                    <span class="upload-success"></span>

                    <?php echo ($error == true && isset($error_msg['img'])) ? "<span class=\"error_msg btm-0\">{$error_msg['img']}</span>" : '' ?>
                    <?php echo (isset($_POST['new-product']) && $error == true && !isset($error_msg['img'])) ? "<span class='error_msg btm-0 btm--0'><em>!</em>Something went wrong..<br><i>Please upload your image again!</i></span>" : '' ?>

                </div>

                <div class="form__group form__size left">
                    <span class="txt">Available sizes:</span>
                    <div class="form__size__cnt">
                        <input <?php echo(isset($_POST['new-product']) && isset($checked['size-s']) ? 'checked' : '') ?>
                                class="check-input" type="checkbox" name="sizes[]" id="size-s" value="size-s">
                        <label class="def-label" for="size-s">Small (17x24cm)
                            <span class="check-ico"></span>
                        </label>
                    </div>
                    <div class="form__size__cnt">
                        <input <?php echo(isset($_POST['new-product']) && isset($checked['size-m']) ? 'checked' : '') ?>
                                class="check-input" type="checkbox" name="sizes[]" id="size-m" value="size-m">
                        <label class="def-label" for="size-m">Medium (30x42cm)
                            <span class="check-ico"></span>
                        </label>
                    </div>
                    <div class="form__size__cnt">
                        <input <?php echo(isset($_POST['new-product']) && isset($checked['size-l']) ? 'checked' : '') ?>
                                class="check-input" type="checkbox" name="sizes[]" id="size-l" value="size-l">
                        <label class="def-label" for="size-l">Large (50x70cm)
                            <span class="check-ico"></span>
                        </label>
                    </div>
                    <?php echo ($error == true && isset($error_msg['sizes'])) ? "<span class=\"error_msg\">{$error_msg['sizes']}</span>" : '' ?>
                </div>

                <div class="form__group form__status right">
                    <!--<span>Product visibility status:</span>-->
                    <div class="form__group__cnt">
                        <div class="arrow-cnt"></div>
                        <select class="def-select" name="status" id="status">
                            <option value="choose">Choose product status:</option>
                            <option value="live">Live</option>
                            <option value="draft">Draft</option>
                            <option value="private">Private</option>
                        </select><span class="focus-line"></span>
                        <label class="def-label" for="status"><span class="check-ico"></span></label>
                    </div>
                </div>

            </section>
            <div class="products__new__imgprev">

            </div>
            <div class="form__group form__submit center">
                <button type="submit" value="new-product" name="new-product" class="btn"><span class="btn-hover"></span>Add
                    this Product
                </button>
            </div>
        </form>
    <?php } else { ?>
        <div class="products__is-added">
            <h3>Nice! You successfully added a new product.</h3>
            <a class="hover hover--left" href="<?php echo APP_ROOT ?>backend/products"><span
                        class="hovertxt">View All</span></a>
            <span>or</span>
            <a class="hover hover--left" href="<?php echo APP_ROOT ?>backend/products/new"><span class="hovertxt">Add another product</span></a>
        </div>
    <?php } ?>
</div>
