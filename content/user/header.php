<?php

include "global-header.php";

?>

<main class="main user">
    <div class="main__title user__title">
        <h2><span class="title-lines">Hello <?php echo $_SESSION['curr-user']['fname'] ?><em>!</em></span></h2>
        <a href="<?php echo APP_ROOT ?>logout" class="user__logout hover hover--right"><i class="arrow-cnt"></i><span class="hovertxt">Logout</span></a>
    </div>

    <div class='user__page-title'><h1><?php echo (isset($page[1])) ? $page[1] : $page[0] ?></h1></div>

    <section class="main__content user__content <?php echo ($page[1] == "wishlist") ? 'shop-cnt' : '' ?>">



