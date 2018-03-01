<?php

if (isset($_POST['wish_id'])) {
    $item = $_POST['wish_id'];
    $created_at = time();
    $sql_query = mysqli_query($dblink, "INSERT INTO wishlist (product_id, user_id, created_at) VALUES ('{$item}', '{$_SESSION['curr-user']['id']}', '{$created_at}')");
    header("Location:" . APP_ROOT . "shop");
    exit();
}
if(isset($_POST['remove_id'])) {
    $item = $_POST['remove_id'];
    $sql_query = mysqli_query($dblink, "DELETE FROM wishlist WHERE user_id = '{$_SESSION['curr-user']['id']}' AND product_id = '{$item}'");
}


?>