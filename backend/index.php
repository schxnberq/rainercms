<?php

session_start();

define("APP_ROOT", "http://localhost:8888/SAE/rainer_cms/");

if (isset($_SESSION['login']) && $_SESSION['login'] !== 1 || !isset($_SESSION['login'])) {
    header('Location: ../login');
    exit();
}
if (isset($_SESSION['curr-user']) && $_SESSION['curr-user']['group'] == 1) {
    header("Location:" . APP_ROOT . "user/profile");
    exit();
}
include '../includes/dbconnect.php';
include 'includes/functions.php';

$page = (!isset($_GET['page'])) ? "users" : $_GET['page'];

$content = "content/";
$title = "";


$page = rtrim($page, "/");
$page = explode("/", $page);

if ($page[0] == 'logout') {
    session_destroy();
    header('Location:' . APP_ROOT . 'login');
    exit();
} else {
    $content .= "$page[0].php";
}
if ($page[0] == "login" && $_SESSION['login'] == 1 || $page[0] == "register" && $_SESSION['login'] == 1 && $_SESSION['curr-user']['group'] == 0) {
    header("Location:" . APP_ROOT . "backend/profile");
    exit();
}

if (!file_exists($content)) {
    $content = "error.php";
}


if (isset($page[1]) && $page[1] == "delete" && isset($page[2])) {

} else {
    include "header.php";
}

include $content;

include "../footer.php";
