<?php

if (!isset($_SESSION['login']) || $_SESSION['login'] !== 1) {
    header("Location:" . APP_ROOT . "home");
    exit();
} else {
    include "../includes/dbconnect.php";
    $sql = "UPDATE products SET status = 'deleted' WHERE id = '{$page[2]}'";
    mysqli_query($dblink, $sql);
    header("Location:" . APP_ROOT . "backend/products");
    exit();
}

