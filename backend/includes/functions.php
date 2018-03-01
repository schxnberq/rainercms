<?php

$formats = array("jpg" => "", "jpeg" => '', "png" => '', "gif" => '', "bmp" => '');
$max_file_size = 1024 * 500; // 500 kb
$path = "../assets/imgs/products/"; // Upload directory

$error = false;
$error_msg = array();
$product_added = false;

$updated = false;
if (isset($_POST['new-product']) || isset($_POST['update-product'])) {

    $sizes = "";
    $status = "";
    $created_at = time();


    // TITLE
    if (strlen($_POST['title']) < 3) {
        $error = true;
        $error_msg['title'] = "<em>!</em>Title too short. At least 3 characters";
    }
    // CATEGORY
    if (!isset($_POST['categ'])) {
        $error = true;
        $error_msg['category'] = "<em>!</em>Please select a category";
    }
    // PRICE
    if (empty($_POST['price'])) {
        $error = true;
        $error_msg['price'] = "<em>!</em>May not be empty";
    }

    // IMAGES
    $img = "";

    if (isset($_POST['imgupdate']) && $_POST['imgupdate'] !== "update") {
        $img = $_POST['imgupdate'];
    } else {
        if (!empty($_FILES['product_img']['name'])) {

            if ($_FILES['product_img']['size'] > $max_file_size) {
                $error = true;
                $error_msg['img'] = "<em>!</em>Image is too large";

            } elseif (!array_key_exists(explode("/", $_FILES['product_img']['type'])[1], $formats)) {
                $error = true;
                $error_msg['img'] = "<em>!</em>Image is not a valid format";
            } else { // No error found! Move uploaded product_img
                if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $path . $_FILES['product_img']['name'])) ;
                $img = $_FILES['product_img']['name'];
            }
        }
    }

// SIZES
    $checked = array();
    if (empty($_POST['sizes'])) {
        $error = true;
        $error_msg['sizes'] = "<em>!</em>Please choose at least 1 size format";
    } else {
        for ($i = 0; $i < count($_POST['sizes']); $i++) {
            $get_sizes[$i] = explode("-", $_POST['sizes'][$i])[1];


            $sizes = implode(",", $get_sizes);
            $checked[$_POST['sizes'][$i]] = array_push($checked, $_POST['sizes'][$i]);
        }
    }


    // STATUS

    if ($_POST['status'] == "choose") {
        $status = "draft";
    } else {

        $status = $_POST['status'];
    }

    // IF NO ERROR INSERT INTO DB
    if ($error == false) {

        $product_added = true;
        $category = $_POST['categ'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['post-description'];

        if ($_SESSION['form-token'] == $_POST['form-token']) {

            if (isset($_POST['new-product'])) {
                $insert_sql = "INSERT INTO products (title, price, description, category, img, sizes, status, created_at) VALUES ('{$title}', '{$price}', '{$description}', '{$category}', '{$img}', '{$sizes}', '{$status}', '{$created_at}')";
                mysqli_query($dblink, $insert_sql);
            }

            if (isset($_POST['update-product'])) {
                $updated = true;
                $update_sql = "UPDATE products SET title = '{$title}', price = '{$price}', description = '{$description}', category = '{$category}', img = '{$img}', sizes = '{$sizes}', status = '{$status}' WHERE id = '{$_POST['product-id']}'";
                mysqli_query($dblink, $update_sql);
            }
        }

    }


}
$order_remove = false;
if(isset($_POST['remove-order'])) {
    $order_remove = true;
    $sql_query = mysqli_query($dblink, "DELETE FROM orders WHERE id = '{$_POST['order-id']}'");
}


if (isset($_POST['change-profile'])) {

    $updated = true;

    $fname = mysqli_escape_string($dblink, $_POST['fname']);
    $lname = mysqli_escape_string($dblink, $_POST['lname']);
    $username = mysqli_escape_string($dblink, $_POST['username']);
    $email = mysqli_escape_string($dblink, $_POST['email']);
    $street = mysqli_escape_string($dblink, $_POST['street']);

    $sql = "UPDATE users SET gender = '{$_POST['gender']}', fname = '{$fname}', lname = '{$lname}', street = '{$street}', city = '{$_POST['city']}', postcode = '{$_POST['postcode']}', country = '{$_POST['country']}', username = '{$username}', email = '{$email}' WHERE id = '{$_POST['user-id']}'";
    mysqli_query($dblink, $sql);

    if ($_SESSION['form-token'] == $_POST['form-token']) {


    }


}