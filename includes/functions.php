<?php
$error = false;
$error_msg = array();
$show_form = true;

$order_confirmed = false;
$newsletter_submit = false;
if (isset($_POST['do-newsletter'])) {

    $newsletter_submit = true;

    // FNAME
    if (strlen($_POST['fname']) < 3) {
        $error = true;
        $error_msg['fname'] = "<em>!</em>Your first name is too short (At least 3 characters)";
    } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜ ]+$/", $_POST['fname'])) {
        $error = true;
        $error_msg['fname'] = "<em>!</em>Your first name may only contain characters from A-Z";
    }

    // LNAME
    if (strlen($_POST['lname']) < 3) {
        $error = true;
        $error_msg['lname'] = "<em>!</em>Your last name is too short(At least 3 characters)";
    } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜ]+$/", $_POST['lname'])) {
        $error = true;
        $error_msg['lname'] = "<em>!</em>Your last name may only contain characters from A-Z";
    }

    // EMAIL
    if (!preg_match("/^([-0-9a-zA-Z.+_])+@([a-zA-Z0-9]{2,10})\.?([a-zA-Z0-9]{2,8})?\.?([a-zA-Z0-9]{2,8})?$/", $_POST['email'])) {
        $error = true;
        $error_msg['email'] = "<em>!</em>Your E-Mail address is invalid";
    }



    $fname = mysqli_escape_string($dblink, $_POST['fname']);
    $lname = mysqli_escape_string($dblink, $_POST['lname']);
    $email = mysqli_escape_string($dblink, $_POST['email']);

    if ($_SESSION['form-token'] == $_POST['form-token']) {
        $sql = mysqli_query($dblink, "INSERT INTO newsletter (fname, lname, email) VALUES ('{$fname}', '{$lname}', '{$email}')");

    }


}


// REGISTER
if (isset($_POST['do-register'])) {

    $used_sql = "SELECT username,email FROM users WHERE username = '{$_POST['username']}' OR email = '{$_POST['email']}'";
    $used_res = mysqli_query($dblink, $used_sql);
    $used_data = array();

    if (mysqli_num_rows($used_res) !== 0) {
        $error = true;
        $used_data = mysqli_fetch_assoc($used_res);
    }


    // GENDER
    if (empty($_POST['gender'])) {
        $error = true;
        $error_msg['gender'] = "<em>!</em>Please select your gender";
    }


    // FNAME
    if (strlen($_POST['fname']) < 3) {
        $error = true;
        $error_msg['fname'] = "<em>!</em>Your first name is too short (At least 3 characters)";
    } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜ ]+$/", $_POST['fname'])) {
        $error = true;
        $error_msg['fname'] = "<em>!</em>Your first name may only contain characters from A-Z";
    }

    // LNAME
    if (strlen($_POST['lname']) < 3) {
        $error = true;
        $error_msg['lname'] = "<em>!</em>Your last name is too short(At least 3 characters)";
    } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜ]+$/", $_POST['lname'])) {
        $error = true;
        $error_msg['lname'] = "<em>!</em>Your last name may only contain characters from A-Z";
    }


    // STREET
    if (strlen($_POST['street']) < 3) {
        $error = true;
        $error_msg['street'] = "<em>!</em>Your Street address is too short(At least 3 characters)";
    } elseif (!preg_match("/^[a-zA-Z0-9äöüÄÖÜß ]+$/", $_POST['street'])) {
        $error = true;
        $error_msg['street'] = "<em>!</em>Your Street may only contain characters from A-Z and numbers";
    } elseif (!preg_match("/^.*[0-9]+$/", $_POST['street'])) {
        $error = true;
        $error_msg['street'] = "<em>!</em>Please add your house number";
    }


    // CITY
    if (strlen($_POST['city']) < 2) {
        $error = true;
        $error_msg['city'] = "<em>!</em>Your City address is too short (At least 2 characters)";
    } elseif (!preg_match("/^[a-zA-ZäüöÄÜÖß ]+$/", $_POST['city'])) {
        $error = true;
        $error_msg['city'] = "<em>!</em>Your City may only contain characters from A-Z";
    }

    // POSTCODE
    if (strlen($_POST['postcode']) < 3) {
        $error = true;
        $error_msg['postcode'] = "<em>!</em>Your Postcode is too short (At least 3 characters)";
    } elseif (!preg_match("/^[0-9 ]+$/", $_POST['postcode'])) {
        $error = true;
        $error_msg['postcode'] = "<em>!</em>Your Postcode may only contain numbers";
    }


    // COUNTRY
    if (strpos($_POST['country'], 'choose') !== false) {
        $error = true;
        $error_msg['country'] = "<em>!</em>Please select your Country";
    }


    // USERNAME
    if (!empty($used_data) && $_POST['username'] == $used_data['username']) {
        $error = true;
        $error_msg['username'] = "<em>!</em>This username has already been used";
    } elseif (strlen($_POST['username']) < 5) {
        $error = true;
        $error_msg['username'] = "<em>!</em>Your Username is too short (At least 5 characters)";
    } elseif (!preg_match("/^([a-zA-Z0-9])[a-zA-Z0-9\.\-_]+$/", $_POST['username'])) {
        $error = true;
        $error_msg['username'] = "<em>!</em>Your Username may only contain A-Z, numbers and '-_.'";
    }


    // PASSWORD
    if (strlen($_POST['password']) < 3 || !preg_match('/[A-Z0-9\W]/', $_POST['password'])) {
        $error = true;
        $error_msg['pw_rules'] = "<span style='display: block;' class='error_msg'>Your Password must contain<em>:</em></span><ul class='pw_rules error_msg'><li>At least 5 characters!</li><li>At least 1 uppercase letter!</li><li>At least 1 number!</li><li>At least 1 special character!</li></ul>";
    }

    // EMAIL

    if (!empty($used_data) && $_POST['email'] == $used_data['email']) {
        $error = true;
        $error_msg['email'] = "<em>!</em>This email has already been used";
    } elseif (!preg_match("/^([-0-9a-zA-Zß.+_])+@([a-zA-Z0-9]{2,10})\.?([a-zA-Z0-9]{2,8})?\.?([a-zA-Z0-9]{2,8})?$/", $_POST['email'])) {
        $error = true;
        $error_msg['email'] = "<em>!</em>Your E-Mail address is invalid";
    }


    // AGB
    if (empty($_POST['agb'])) {
        $error = true;
        $error_msg['agb'] = "<em>!</em>Please accept the AGB's";
    }


    if ($error == false) {
        $show_form = false;

        $gender = $_POST['gender'];
        $fname = mysqli_escape_string($dblink, $_POST['fname']);
        $lname = mysqli_escape_string($dblink, $_POST['lname']);
        $street = mysqli_escape_string($dblink, $_POST['street']);
        $city = mysqli_escape_string($dblink, $_POST['city']);
        $postcode = mysqli_escape_string($dblink, $_POST['postcode']);
        $country = $_POST['country'];
        $username = mysqli_escape_string($dblink, $_POST['username']);
        $password = mysqli_escape_string($dblink, $_POST['password']);
        $email = mysqli_escape_string($dblink, $_POST['email']);
        $agb = $_POST['agb'];

        $pw_fin = sha1($password . "rainer") . ":rainer";


        $sql = "INSERT INTO users (user_group, gender, fname, lname, street, city, postcode, country, username, password, email) VALUES ('1', '{$gender}', '{$fname}', '{$lname}', '{$street}', '{$city}', '{$postcode}', '{$country}', '{$username}', '{$pw_fin}', '{$email}')";
        mysqli_query($dblink, $sql);

        if (isset($_POST['checkout-form']) && $_POST['checkout-form'] == 1) {
            header("Location:" . APP_ROOT . "checkout");
            exit();
        } else {
            header("Location:" . APP_ROOT . "user/profile");
            exit();
        }

    }
} // REGISTER END

// LOGIN
if (isset($_POST['do-login'])) {

    $sql = "SELECT * FROM users WHERE email = '{$_POST['email_user']}' OR username = '{$_POST['email_user']}'";

    $res = mysqli_query($dblink, $sql);

    if (mysqli_num_rows($res) == 0) {
        $error = true;
        $error_msg['no-user'] = "User does not exist<em>!</em>";
    }

    if (mysqli_num_rows($res) == 1) {

        $user = mysqli_fetch_assoc($res);


        $pw_hash = explode(":", $user['password']);


        if ($pw_hash[0] == sha1($_POST['password'] . $pw_hash[1])) {

            $_SESSION['login'] = 1;
            $_SESSION['curr-user'] = array(
                "id" => $user['id'],
                "group" => $user['user_group'],
                "fname" => $user['fname']
            );

            if (isset($_POST['checkout-form']) && $_POST['checkout-form'] == 1) {
                header("Location:" . APP_ROOT . "checkout");
                exit();
            } else if ($_SESSION['curr-user']['group'] == 0 && !isset($_POST['checkout-form'])) {
                header('Location: backend/users');
                exit();
            } else {
                header('Location:' . APP_ROOT . 'user/profile');
                exit();
            }

        } else {
            $error = true;
            $error_msg['pw'] = "Your Password is incorrect<em>!</em>";
        }
    }


}


if (isset($_POST['delete-wish'])) {
    $sql_query = mysqli_query($dblink, "DELETE FROM wishlist WHERE id = '{$_POST['wish-id']}'");
}


// ADD TO CART
$to_cart = false;
if (isset($_POST['add-to-cart']) || isset($_POST['do-wish'])) {

    $price = (strpos($_POST['price'], "€") !== false) ? explode("€", $_POST['price'])[0] : $_POST['price'];

    $_SESSION['cart-timer'] = false;


    if ($_POST['form-token'] == $_SESSION['form-token']) {
        $to_cart = true;
        $cart = array(
            "id" => $_POST['product-id'],
            "title" => $_POST['title'],
            "img" => $_POST['img'],
            "price" => $price,
            "selected-size" => $_POST['size'],
            "available-sizes" => $_POST['available-sizes'],
            "quantity" => $_POST['quantity'],
            "created_at" => $_POST['created_at']
        );
        array_push($_SESSION['cart'], $cart);
    }

}
$remove_cart = false;
if (isset($_POST['delete-cart'])) {

    if ($_POST['form-token'] == $_SESSION['form-token']) {
        $remove_cart = true;
        $key = $_POST['item-key'];
        unset($_SESSION['cart'][$key]);
    }
}

if (isset($_POST['submit-cart'])) {

    $_SESSION['checkout'] = true;


    if ($_SESSION['login'] !== 1) {
        header("Location:" . APP_ROOT . "checkout-login");
        exit();
    } else {
        header("Location:" . APP_ROOT . "checkout");
        exit();
    }


}

if (isset($_POST['confirm-order'])) {

    // FNAME
    if (strlen($_POST['fname']) < 3) {
        $error = true;
        $error_msg['fname'] = "<em>!</em>Your first name is too short (At least 3 characters)";
    } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜ ]+$/", $_POST['fname'])) {
        $error = true;
        $error_msg['fname'] = "<em>!</em>Your first name may only contain characters from A-Z";
    }

    // LNAME
    if (strlen($_POST['lname']) < 3) {
        $error = true;
        $error_msg['lname'] = "<em>!</em>Your last name is too short(At least 3 characters)";
    } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜ]+$/", $_POST['lname'])) {
        $error = true;
        $error_msg['lname'] = "<em>!</em>Your last name may only contain characters from A-Z";
    }


    // STREET
    if (strlen($_POST['street']) < 3) {
        $error = true;
        $error_msg['street'] = "<em>!</em>Your Street address is too short(At least 3 characters)";
    } elseif (!preg_match("/^[a-zA-Z0-9äöüÄÖÜß ]+$/", $_POST['street'])) {
        $error = true;
        $error_msg['street'] = "<em>!</em>Your Street may only contain characters from A-Z and numbers";
    } elseif (!preg_match("/^.*[0-9]+$/", $_POST['street'])) {
        $error = true;
        $error_msg['street'] = "<em>!</em>Please add your house number";
    }


    // CITY
    if (strlen($_POST['city']) < 2) {
        $error = true;
        $error_msg['city'] = "<em>!</em>Your City address is too short (At least 2 characters)";
    } elseif (!preg_match("/^[a-zA-ZäüöÄÜÖß ]+$/", $_POST['city'])) {
        $error = true;
        $error_msg['city'] = "<em>!</em>Your City may only contain characters from A-Z";
    }

    // POSTCODE
    if (strlen($_POST['postcode']) < 3) {
        $error = true;
        $error_msg['postcode'] = "<em>!</em>Your Postcode is too short (At least 3 characters)";
    } elseif (!preg_match("/^[0-9 ]+$/", $_POST['postcode'])) {
        $error = true;
        $error_msg['postcode'] = "<em>!</em>Your Postcode may only contain numbers";
    }


    // COUNTRY
    if (strpos($_POST['country'], 'choose') !== false) {
        $error = true;
        $error_msg['country'] = "<em>!</em>Please select your Country";
    }

    if (!preg_match("/^([-0-9a-zA-Zß.+_])+@([a-zA-Z0-9]{2,10})\.?([a-zA-Z0-9]{2,8})?\.?([a-zA-Z0-9]{2,8})?$/", $_POST['email'])) {
        $error = true;
        $error_msg['email'] = "<em>!</em>Your E-Mail address is invalid";
    }

    /// PRODUCTS
    $product_id = "";


    if (empty($_POST['shipping'])) {
        $error = true;
        $error_msg['shipping'] = "<em>!</em>Please select a shipping method";
    }
    if (empty($_POST['payment'])) {
        $error = true;
        $error_msg['payment'] = "<em>!</em>Please select a payment method";
    }

    if ($error == false && $_POST['form-token'] == $_SESSION['form-token']) {
        $order_confirmed = true;

        $user_id = $_SESSION['curr-user']['id'];
        $product_id = implode(", ", $_POST['product-id']);

        $size = implode(", ", $_POST['size']);
        $quantity = implode(", ", $_POST['quantity']);
        $price = implode(", ", $_POST['price']);
        $total_price = explode("€", $_POST['sum-price'])[0];

        $shipping = $_POST['shipping'];
        $payment = $_POST['payment'];

        $fname = mysqli_escape_string($dblink, $_POST['fname']);
        $lname = mysqli_escape_string($dblink, $_POST['lname']);
        $street = mysqli_escape_string($dblink, $_POST['street']);
        $city = mysqli_escape_string($dblink, $_POST['city']);
        $postcode = mysqli_escape_string($dblink, $_POST['postcode']);
        $country = $_POST['country'];


        $sql = "INSERT INTO orders (user_id, product_id, size, price, total, quantity, shipping, payment, country, fname, lname, street, city, postcode) VALUES ('{$user_id}', '{$product_id}', '{$size}','{$price}', '{$total_price}', '{$quantity}','{$shipping}','{$payment}','{$country}','{$fname}','{$lname}','{$street}','{$city}','{$postcode}')";
        mysqli_query($dblink, $sql);

        unset($_SESSION['cart']);
        $_SESSION['cart-timer'] = false;

    }

}


if (isset($_POST['destroy'])) {
    $redirect = explode("rainer_cms/", $_SERVER['REQUEST_URI'])[1];
    session_destroy();
    header("Location:" . APP_ROOT . $redirect);
    exit();
}