<div class="orders">
    <?php if ($order_remove == true) { ?>
        <div class="update-success"><span>Order successfully removed!</span></div>
        <?php
    }
    if (!isset($page[1])) {
        ?>
        <div class="orders__head">
            <h3 class="orders__head-title">User</h3>
            <h3 class="orders__head-title">UserID</h3>
            <h3 class="orders__head-title">OrderID</h3>
            <h3 class="orders__head-title">Products</h3>
        </div>
        <div class="orders-cnt">
            <?php
            $sql = "SELECT orders.*, users.* FROM orders LEFT JOIN users ON orders.user_id = users.id";
            $res = mysqli_query($dblink, $sql);
            $row = mysqli_fetch_all($res, MYSQLI_BOTH);


            foreach ($row

                     as $key => $item) {

                $order_id = $item[0];

                $product_id = (strlen($item['product_id']) > 1) ? explode(", ", $item['product_id']) : $item['product_id'];

                $multiple_ids = array();
                if (strlen($item['product_id']) > 1) {

                    for ($i = 0; $i < count($product_id); $i++) {
                        $product = "SELECT * FROM products WHERE id = $product_id[$i]";
                        $product_res = mysqli_query($dblink, $product);
                        $product_row = mysqli_fetch_assoc($product_res);

                    }

                } else {
                    $product = "SELECT * FROM products WHERE id = $product_id";
                    $product_res = mysqli_query($dblink, $product);
                    $product_row = mysqli_fetch_assoc($product_res);
                }

                //var_dump($product_row);


                ?>

                <div class="orders__item">
                    <div class="item-cnt"><?php echo $item['fname'] . ' ' . $item['lname'] ?></div>
                    <div class="item-cnt"><?php echo $item['user_id'] ?></div>
                    <div class="item-cnt"><?php echo $order_id ?></div>
                    <div class="item-cnt"><?php echo $item['product_id'] ?></div>
                    <!--<div class="item-cnt"><a class="btn"
                                             href="<?php /*echo APP_ROOT . 'backend/orders/edit/' . $order_id */ ?>"><span
                                    class="btn-hover">Edit</span></a></div>-->
                    <div class="item-cnt action">
                        <form method="post">
                            <a class="btn"
                               href="<?php echo APP_ROOT . 'backend/orders/edit/' . $order_id ?>"><span
                                        class="btn-hover">Edit</span></a>
                            <input type="hidden" name="order-id" value="<?php echo $order_id ?>">
                            <button class="btn" type="submit" name="remove-order"><span class="btn-hover">Remove</span>
                            </button>
                        </form>
                    </div>
                </div>

            <?php } ?>
        </div>
    <?php } else {

    $sql = "SELECT * FROM orders WHERE id = '{$page[2]}'";
    $res = mysqli_query($dblink, $sql);
    $row = mysqli_fetch_assoc($res);


    $ids = explode(", ", $row['product_id']);
    $sizes = explode(", ", $row['size']);

    $ids = array();
    $sizes = array();
    $prices = array();
    $quantities = array();

    if (strlen($row['product_id']) > 1) {
        $ids = explode(", ", $row['product_id']);
        $sizes = explode(", ", $row['size']);
        $prices = explode(", ", $row['price']);
        $quantities = explode(", ", $row['quantity']);
    } else {
        $ids = $row['product_id'];
        $sizes = $row['size'];
        $prices = $row['price'];
        $quantities = $row['quantity'];
    } ?>
    <div class="orders__head">
        <h3 class="orders__head-title">Product</h3>
        <h3 class="orders__head-title">ProductID</h3>
        <h3 class="orders__head-title">Size</h3>
        <h3 class="orders__head-title">Quantity</h3>
    </div>
    <form method="post" class="form orders__edit">
        <?php foreach ($ids as $key => $item) {
            $product_sql = "SELECT * FROM products WHERE id = '{$item}'";
            $product_res = mysqli_query($dblink, $product_sql);
            $product_row = mysqli_fetch_assoc($product_res);

            $onesize = false;
            $product_sizes = "";

            if (strlen($product_row['sizes']) > 1) {
                $product_sizes = explode(",", $product_row['sizes']);
            } else {
                $onesize = true;
                $product_sizes = $product_row['sizes'];
            }


            ?>
            <div class="orders__item">
                <div class="item-cnt"><img height="100%"
                                           src="<?php echo APP_ROOT . 'assets/imgs/products/' . $product_row['img']; ?>"
                                           alt=""></div>
                <div class="item-cnt"><p><?php echo $ids[$key]; ?></p></div>
                <div class="item-cnt">
                    <?php
                    if ($onesize == false) {
                        foreach ($sizes as $key_1 => $size) {
                            ?>

                            <div class="sizes__cnt">
                                <input type="radio" <?php echo ($size == $sizes[$key]) ? 'checked' : '' ?>
                                       name="size-<?php echo $key ?>"
                                       id="size-<?php echo $size . ":" . $key ?>" class="check-input"
                                       value="<?php echo $size; ?>">
                                <label class="def-label"
                                       for="size-<?php echo $size . ":" . $key ?>"><?php echo $size ?>
                                    <span class="check-ico"></span>
                                </label>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="sizes__cnt">
                            <input type="radio" checked name="size-<?php echo $key ?>"
                                   value="<?php echo $product_sizes ?>"
                                   id="size-<?php echo $product_sizes . ":" . $key ?>" class="check-input">
                            <label class="def-label"
                                   for="size-<?php echo $product_sizes . ":" . $key ?>"><?php echo $product_sizes; ?>
                                <span
                                        class="check-ico"></span>
                            </label>
                        </div>
                    <?php } ?>
                </div>
                <div class="item-cnt form__group">
                    <div class="quantity">
                        <input class="number" type="number" value="<?php echo $quantities[$key]; ?>">
                    </div>
                </div>
            </div>
        <?php }
        } ?>
    </form>
</div>
