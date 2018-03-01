<?php

include "global-header.php";

?>

<main class="main">
    <?php if (isset($page[0]) && $page[0] !== 'home') { ?>
        <div class="main__title">
            <h1>
                <span class="title-lines"><?php echo (isset($page[1]) && $page[0] == "shop") ? '' : ($page[0] == "checkout-login") ? '' : $page[0]; ?></span>
            </h1>
        </div>
    <?php } ?>



    <?php echo ($page[0] == "register") ? "<div class='main__to-login'><a class='hover hover--left' href=" . APP_ROOT . "login><i class='arrow-cnt'></i><span class='hovertxt'>back to Login</span></a></div>" : '' ?>

    <section
            class="main__content <?php echo (strpos($_SERVER['REQUEST_URI'], "backend") !== false) ? 'backend__content' : (($page[0] == "shop") ? "shop-cnt" : '');
            echo ($page[0] == "checkout-login") ? 'checkout-login' : '';
            echo ($page[0] == "checkout") ? 'checkout-cnt' : '' ?>">
        <h2 class="visually-hidden"><?php echo $page[0] ?></h2>



