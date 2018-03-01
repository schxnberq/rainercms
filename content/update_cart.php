<?php

if (isset($_POST['update_cart'])) {
    $cart_item_id = $_POST['cart_item_id'];
    $_SESSION['cart'][$cart_item_id]['price'] = $_POST['price'];
    $_SESSION['cart'][$cart_item_id]['quantity'] = $_POST['quantity'];
    $_SESSION['cart'][$cart_item_id]['selected-size'] = $_POST['size'];
    header("Location:" . APP_ROOT . "cart");
    exit();
}
if (isset($_POST['timer_remove'])) {
    $remove_cart = true;
    $_SESSION['cart_timer'] = true;
    $key = $_POST['cart_item_id'];
    unset($_SESSION['cart'][$key]);
    header("Location:" . APP_ROOT . "cart");
    exit();
}
