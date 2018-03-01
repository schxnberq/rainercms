<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stephanie Rainer - Online Atelier</title>
    <link rel="stylesheet" href="<?php echo APP_ROOT ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo APP_ROOT ?>assets/fonts/icomoon/style.css">
    <link rel="icon" href="<?php echo APP_ROOT ?>assets/imgs/logo.png">

</head>
<body class="<?php echo (!isset($page[0]) || $page[0] == "home") ? 'home' : '' ?>">
<header class="<?php echo (!isset($page[0]) || $page[0] == "home") ? 'home' : '' ?>">
    <nav class="nav">
        <div class="nav__logo">
            <a href="<?php echo APP_ROOT ?>home">
                <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.37 29.42">
                    <title>logo-dark</title>
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Design">
                            <rect x="0.5" y="0.5" width="55.37" height="28.42" fill="none" stroke="#000"
                                  stroke-miterlimit="10"/>
                            <path d="M22,6.7c-8.32,2-14,6.42-3.47,8.14s14.85,8.28-13.1,7.82" fill="none" stroke="#000"
                                  stroke-miterlimit="10"/>
                            <path d="M32,11.46l.78,12c1,.61-8.37-13.13.58-17.34,8-3.77,18.4,11,8.09,13.26-14.87,3.34-7.2-3.39-2.16-1.81C44.59,19.22,43.39,23,46,24.21s2.23-3.16,2.61-4.66"
                                  fill="none" stroke="#000" stroke-miterlimit="10"/>
                        </g>
                    </g>
                </svg>
            </a>
        </div>

        <?php if ($_SESSION['login'] == 1 && isset($_SESSION['curr-user']) && $_SESSION['curr-user']['group'] == 0 && strpos($_SERVER['REQUEST_URI'], "backend") !== false) { ?>
            <ul class="nav__menu nav__list">
                <li class="nav__menu__item nav__list__item">
                    <a href="<?php echo APP_ROOT ?>home" class="hover hover--left"><span
                                class="hovertxt">View Frontend</span>
                    </a>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="nav__menu nav__list">
                <li class="nav__menu__item nav__list__item">
                    <a href="<?php echo APP_ROOT ?>home" class="hover hover--left"><span class="hovertxt">home</span>
                    </a>
                </li>
                <li class="nav__menu__item nav__list__item">
                    <a href="<?php echo APP_ROOT ?>shop" class="hover hover--left"><span class="hovertxt">shop</span>
                    </a>
                </li>
                <li class="nav__menu__item nav__list__item">
                    <a href="<?php echo APP_ROOT ?>about" class="hover hover--left"><span class="hovertxt">about</span>
                    </a>
                </li>
                <li class="nav__menu__item nav__list__item">
                    <a href="<?php echo APP_ROOT ?>contact" class="hover hover--left"><span
                                class="hovertxt">contact</span>
                    </a>
                </li>
            </ul>
        <?php } ?>

        <ul class="nav__user nav__list">
            <li class="nav__user__item nav__list__item">
                <a href=""><span class="icon-search2"></span>
                </a>
            </li>
            <li class="nav__user__item nav__list__item">
                <a href="<?php echo APP_ROOT ?>cart">
                    <span class="icon-shopping-bag"></span>
                </a>
                <?php if (!empty($_SESSION['cart'])) { ?>
                    <span class="cart-count"><?php echo count($_SESSION['cart']) ?></span>
                <?php } ?>
            </li>
            <li class="nav__user__item nav__list__item arrow-link">
                <a class="acc-drp" href="<?php echo APP_ROOT ?>login"><span
                            class="icon-user-circle-o"></span>
                </a>
                <i class="arrow-cnt"></i>
                <ul class="account">
                    <?php if ($_SESSION['login'] == 1) { ?>
                        <?php if (isset($_SESSION['curr-user']) && $_SESSION['curr-user']['group'] == 1) { ?>
                            <li><a href="<?php echo APP_ROOT ?>user/profile" class="hover hover--left">
                                    <span class="hovertxt">Profile</span></a>
                            </li>
                            <li><a href="<?php echo APP_ROOT ?>user/wishlist" class="hover hover--left">
                                    <span class="hovertxt">Wishlist</span></a>
                            </li>
                        <?php } else { ?>
                            <li><a href="<?php echo APP_ROOT ?>backend/" class="hover hover--left">
                                    <span class="hovertxt">Backend</span></a>
                            </li>
                        <?php } ?>
                        <li><a class="hover hover--left"
                               href="<?php echo (isset($_SESSION['login']) && $_SESSION['login'] == 1) ? APP_ROOT . 'logout' : APP_ROOT . 'login' ?>">
                                <span class="hovertxt"><?php echo (isset($_SESSION['login']) && $_SESSION['login'] == 1) ? 'Logout' : 'Login/Register' ?></span></a>
                        </li>
                    <?php } else { ?>
                        <li><a class="hover hover--left"
                               href="<?php echo (isset($_SESSION['login']) && $_SESSION['login'] == 1) ? APP_ROOT . 'logout' : APP_ROOT . 'login' ?>">
                                <span class="hovertxt"><?php echo (isset($_SESSION['login']) && $_SESSION['login'] == 1) ? 'Logout' : 'Login/Register' ?></span></a>
                        </li>
                    <?php } ?>

                </ul>
            </li>
        </ul>

    </nav>

    <?php if (!isset($page[0]) || $page[0] == "home") { ?>

        <section class="hero">
            <div class="hero__title">
                <h1>Stephanie <span>Rainer</span> <span><em>Art-Studio</em></span></h1>
            </div>
            <div class="hero__imgs">
                <div class="hero__imgs__cnt">
                    <img class="heroimg-left" src="assets/imgs/artpieces/drawing-minimal.jpg" alt="">
                </div>
                <div class="hero__imgs__cnt">
                    <img class="heroimg-middle" src="assets/imgs/artpieces/pr-drawing-minimal_3.jpg" alt="">
                </div>
                <div class="hero__imgs__cnt">
                    <img class="heroimg-right" src="assets/imgs/artpieces/drawing-minimal_6.jpg" alt="">
                </div>
            </div>
            <div class="hero__toshop">
                <div class="hero__toshop__link">
                    <a href="<?php echo APP_ROOT ?>shop">
                        <div class="arrow-default">Shop <i class="arrow-cnt"></i></div>
                    </a>
                </div>
            </div>
            <div class="hero__scroll">
                <a data-scroll href="#" class="arrow-link">
                    <div class="arrow-default"><i class="arrow-cnt"></i> Scroll</div>
                </a>
            </div>
        </section>

    <?php } ?>


</header>