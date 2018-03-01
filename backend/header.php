<?php

include "../global-header.php";

?>

<main class="main backend" id="main">
    <div class="main__title backend__title">
        <span class='dash-hello'>Hello <?php echo $_SESSION['curr-user']['fname'] ?><em>!</em></span>
        <h2><span class="title-lines"><?php echo $page[0] ?></span></h2>
    </div>
    <div class='backend__page-title'>
        <?php if (isset($page[1]) && $page[0] == "orders") { ?>
            <h1>Edit order</h1>
        <?php } else { ?>
            <h1><?php echo (isset($page[1])) ? $page[1] : ($page[0] == "users" && isset($page[1])) ? 'EDIT USER' : $page[0] ?></h1>
        <?php } ?>
    </div>

    <nav class="backend__nav">
        <ul class="backend__nav__list">
            <li class="backend__nav__list__item <?php echo ($page[0] == 'products') ? 'active' : '' ?>">
                <a href="<?php echo APP_ROOT ?>backend/products" class='hover hover--left'>
                    <span class='hovertxt'>Products</span>
                </a>
            </li>
            <li class="backend__nav__list__item <?php echo ($page[0] == 'users') ? 'active' : '' ?>">
                <a href="<?php echo APP_ROOT ?>backend/users" class='hover hover--left'>
                    <span class='hovertxt'>Users</span>
                </a>
            </li>
            <li class="backend__nav__list__item <?php echo ($page[0] == 'orders') ? 'active' : '' ?>">
                <a href="<?php echo APP_ROOT ?>backend/orders" class="hover hover--left">
                    <span class='hovertxt'>Orders</span>
                </a>
            </li>
            <li class="backend__nav__list__item">
                <a href="<?php echo APP_ROOT ?>backend/logout" class="hover hover--left">
                    <span class='hovertxt'>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <section class="main__content backend__content">



