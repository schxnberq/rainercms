</section>
</main>
<footer>
    <section class="footer">
        <h2 class="visually-hidden">Footer</h2>
        <div class="footer__cnt footer__links">
            <a class="privacy" href="privacy">
                <span>Privacy</span>
            </a><br>
            <a class="terms" href="terms">
                <span>Terms & Conditions</span>
            </a>
            <ul class="footer__links__social">
                <li class="footer__links__social__item">
                    <a target="_blank" href="https://facebook.com">
                        <span class="icon-facebook"></span>
                    </a>
                </li>
                <li class="footer__links__social__item">
                    <a target="_blank" href="https://instagram.com">
                        <span class="icon-instagram"></span>
                    </a>
                </li>
                <li class="footer__links__social__item">
                    <a target="_blank" href="https://pinterest.com">
                        <span class="icon-pinterest2"></span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="footer__cnt footer__address">
            <a target="_blank" href="https://goo.gl/maps/XaffXVUnfWA2">
                <span class="icon-map2"></span>
                <span>Schottenring 17/11</span>
                <span>1010 Wien</span>
            </a>
        </div>

        <div class="footer__cnt footer__logo">
            <a href="home">
                <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.37 29.42">
                    <title>logo-bright</title>
                    <g id="Layer_3" data-name="Layer 3">
                        <g id="Design-2">
                            <rect x="0.5" y="0.5" width="55.37" height="28.42" fill="none" stroke="#f2efee"
                                  stroke-miterlimit="10"/>
                            <path d="M23.76,6.7c-9.49,1-14.06,7.14-3.48,8.14C33.36,16.07,32.73,23.42,7,22.68"
                                  fill="none"
                                  stroke="#f2efee" stroke-miterlimit="10"/>
                            <path d="M32,11.46l.78,12C33.77,24,26,8,33.31,6.08c8.55-2.27,18.4,11,8.09,13.26-14.87,3.34-7.2-3.39-2.16-1.81C44.59,19.22,43.39,23,46,24.21s2.23-3.16,2.61-4.66"
                                  fill="none" stroke="#f2efee" stroke-miterlimit="10"/>
                        </g>
                    </g>
                </svg>
            </a>
            <span>© 2017 Stephanie Rainer</span>
        </div>
    </section>
</footer>
<div class="grid-lines">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<?php

if ($page[0] == "home" || !isset($page[0])) {
    echo "<script src=" . APP_ROOT . 'assets/js/noframework.waypoints.js' . "></script>";
    echo "<script src=" . APP_ROOT . 'assets/js/home.js' . "></script>";
} elseif (isset($page[1]) && $page[0] == "products") {
    if ($page[1] == "edit") {
        echo "<script src=" . APP_ROOT . "backend/assets/js/new.js" . "></script>";
    } else {
        if (file_exists("assets/js/$page[1].js")) {
            echo "<script src=" . APP_ROOT . "backend/assets/js/$page[1].js" . "></script>";
        }
    }
} elseif (strpos($_SERVER['REQUEST_URI'], "backend") !== false && file_exists("backend/assets/js/$page[0].js")) {
    echo "<script src=" . APP_ROOT . "backend/assets/js/$page[0].js" . "></script>";
} elseif (isset($page[0]) && !isset($page[1])) {
    if($page[0] == "checkout") {
        echo "<script src=" . APP_ROOT . "assets/js/profile.js" . "></script>";
    }
    if (file_exists("assets/js/$page[0].js")) {
        if ($page[0] == "shop" || $page[0] == "cart") {
            echo "<script
  src=\"https://code.jquery.com/jquery-1.12.4.min.js\"
  integrity=\"sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=\"
  crossorigin=\"anonymous\"></script>";
        }
        echo "<script src=" . APP_ROOT . "assets/js/$page[0].js" . "></script>";
    }
} elseif (isset($page[0]) && isset($page[1])) {
    if($page[0] == "user" && $page[1] == "wishlist") {
        echo "<script src=" . APP_ROOT . "assets/js/cart.js" . "></script>";
    }
    if (file_exists("assets/js/$page[1].js")) {
        echo "<script src=" . APP_ROOT . "assets/js/$page[1].js" . "></script>";
    }
}
echo "<script <script src=" . APP_ROOT . "assets/js/main.js" . "></script>"


?>


</body>
</html>