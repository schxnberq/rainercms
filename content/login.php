<?php
if (isset($page[1]) && strpos($page[1], "wish") !== false) { ?>

    <div class="wish-login">
        <h3><em>!</em>Log in to add products to your wishlist!</h3>
    </div>

<?php } ?>
<form method="post" class="form login">
    <div class="form__group form__email">
        <div class="form__group__cnt">
            <input type="text" name="email_user" id="email_user" placeholder="email">
            <label class="def-label" for="email_user">E-Mail or Username</label>
            <span class="focus-line"></span>
            <span class="error_msg"><?php echo (isset($error_msg['no-user']) && $error == true) ? $error_msg['no-user'] : '' ?></span>
        </div>
    </div>

    <div class="form__group form__pw">
        <div class="form__group__cnt">
            <input type="password" name="password" id="password" placeholder="password">
            <label class="def-label" for="password">Password</label>
            <span class="focus-line"></span>
            <span class="error_msg"><?php echo (isset($error_msg['pw']) && $error == true) ? $error_msg['pw'] : '' ?></span>
        </div>
    </div>
    <div class="form__group form__submit">
        <button type="submit" class="btn" id="submit" name="do-login"><span class="btn-hover">Login</span></button>
    </div>

</form>
<div class="no-user">
    <span>Not registered yet? </span><a class="hover hover--right"
                                        href='<?php echo APP_ROOT ?>register<?php echo (isset($page[1]) && strpos($page[1], "wish") !== false) ? "/wish=1" : '' ?>'><span
                class="hovertxt">Create an account!</span><i class='arrow-cnt'></i></a>
</div>
</section>
