<?php

session_start();

define("APP_ROOT", "http://localhost:8888/SAE/rainer_cms/");

include "includes/dbconnect.php";
include "includes/functions.php";

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = 0;
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (!isset($_SESSION['form-token'])) {
    $_SESSION['form-token'] = "";
}
if (!isset($_SESSION['wish-items'])) {
    $_SESSION['wish-items'] = array();
}
if (!isset($_SESSION['checkout'])) {
    $_SESSION['checkout'] = false;
}
if (!isset($_SESSION['cart-timer'])) $_SESSION['cart-timer'] = false;

$page = (!isset($_GET['page'])) ? "home" : $_GET['page'];


$content = "content/";

$title = null;


$page = rtrim($page, "/");
$page = explode("/", $page);


if (isset($page[1]) && $page[0] == "shop") {
    $content .= "$page[1].php";
} elseif ($page[0] == "user") {
    if ($_SESSION['login'] !== 1) {
        header('Location:' . APP_ROOT . 'login');
        exit();
    } else {
        $page[1] = (!isset($page[1])) ? 'profile' : $page[1];
        $content = "content/user/";
        $content .= "$page[1].php";
    }
} elseif ($page[0] == "checkout-login" && $_SESSION['checkout'] == false || $page[0] == "checkout-login" && empty($_SESSION['cart'])) {
    header("Location:" . APP_ROOT . "shop");
    exit();
} elseif ($page[0] == "checkout" && $_SESSION['checkout'] == false && !isset($_POST['confirm-order']) || $page[0] == "checkout" && empty($_SESSION['cart']) && !isset($_POST['confirm-order'])) {
    $_SESSION['cart-timer'] = "emptied";
    header("Location:" . APP_ROOT . "cart");
    exit();
} else {
    $content .= "$page[0].php";
}


if ($page[0] == "login" && $_SESSION['login'] == 1 || $page[0] == "register" && $_SESSION['login'] == 1) {
    header("Location:" . APP_ROOT . "backend/users");
    exit();
}

if ($page[0] == 'logout') {
    session_destroy();
    header('Location:' . APP_ROOT . 'login');
    exit();
}

if (!file_exists($content)) {
    $content = "error.php";
}


if ($page[0] == "user") {
    include "content/user/header.php";
} elseif (isset($page[1]) && $page[1] == "save_wish") {

} else {
    include "header.php";
}

include $content;

include "footer.php";



