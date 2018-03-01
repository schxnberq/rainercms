
<div class="checkout-login__info">
    <p>You have to be logged in to proceed to the checkout process <em>!</em></p>
    <p>Log in or create an account here:</p>
</div>
<form method="post" class="form login">
    <h2 class="form__title">Login</h2>
    <input type="hidden" name="checkout-form" value="1">
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
            <input type="password" name="password" id="password-login" placeholder="password">
            <label class="def-label" for="password">Password</label>
            <span class="focus-line"></span>
            <span class="error_msg"><?php echo (isset($error_msg['pw']) && $error == true) ? $error_msg['pw'] : '' ?></span>
        </div>
    </div>
    <div class="form__group form__submit">
        <button type="submit" class="btn" name="do-login"><span class="btn-hover">Login</span></button>
    </div>

</form>

<?php if ($show_form == true) { ?>
    <form method="post" class="form register">
        <h2 class="form__title">Register</h2>
        <input type="hidden" name="checkout-form" value="1">
        <div class="form__group form__gender">
            <input class="check-input" type="radio" name="gender" id="male"
                   value="male" <?php echo (isset($_POST['do-register']) && isset($_POST['gender']) && $_POST['gender'] == 'male') ? 'checked' : '' ?>>
            <label class="def-label" for="male">Male<span class="check-ico"></span></label>
            <input class="check-input" type="radio" name="gender" id="female"
                   value="female" <?php echo (isset($_POST['do-register']) && isset($_POST['gender']) && $_POST['gender'] == 'female') ? 'checked' : '' ?>>
            <label class="def-label" for="female">Female<span class="check-ico"></span></label>
            <?php echo (isset($error_msg['gender']) && $error == true) ? "<span class='error_msg'>{$error_msg['gender']}</span>" : '' ?>
        </div>

        <div class="form__group form__names">
            <div class="form__group__cnt">
                <input type="text" name="fname" id="fname" placeholder="fname"
                       value="<?php echo (isset($_POST['do-register']) && isset($_POST['fname'])) ? $_POST['fname'] : '' ?>">
                <label class="def-label" for="fname">First Name</label>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['fname']) && $error == true) ? "<span class='error_msg'>{$error_msg['fname']}</span>" : '' ?>
            </div>
            <div class="form__group__cnt">
                <input type="text" name="lname" id="lname" placeholder="lname"
                       value="<?php echo (isset($_POST['do-register']) && isset($_POST['lname'])) ? $_POST['lname'] : '' ?>">
                <label class="def-label" for="lname">Last Name</label>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['lname']) && $error == true) ? "<span class='error_msg'>{$error_msg['lname']}</span>" : '' ?>
            </div>
        </div>

        <div class="form__group form__address">
            <div class="form__group__cnt">
                <input type="text" name="street" id="street" placeholder="street"
                       value="<?php echo (isset($_POST['do-register']) && isset($_POST['street'])) ? $_POST['street'] : '' ?>">
                <label class="def-label" for="street">Street name & House number</label>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['street']) && $error == true) ? "<span class='error_msg'>{$error_msg['street']}</span>" : '' ?>
            </div>
            <div class="form__group__cnt">
                <input type="text" name="city" id="city" placeholder="city"
                       value="<?php echo (isset($_POST['do-register']) && isset($_POST['city'])) ? $_POST['city'] : '' ?>">
                <label class="def-label" for="city">City</label>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['city']) && $error == true) ? "<span class='error_msg'>{$error_msg['city']}</span>" : '' ?>
            </div>
        </div>

        <div class="form__group form__address2">
            <div class="form__group__cnt">
                <input type="textnumber" name="postcode" id="postcode" placeholder="postcode"
                       value="<?php echo (isset($_POST['do-register']) && isset($_POST['postcode'])) ? $_POST['postcode'] : '' ?>">
                <label class="def-label" for="postcode">Postcode</label>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['postcode']) && $error == true) ? "<span class='error_msg'>{$error_msg['postcode']}</span>" : '' ?>
            </div>
            <div class="form__group__cnt">
                <i class="arrow-cnt"></i>
                <select class="def-select" name="country" id="country">
                    <option value="choose">Choose Country</option>
                    <option value="austria" <?php echo (isset($_POST['country']) && $_POST['country'] == "austria") ? selected : '' ?>>
                        Austria
                    </option>
                    <option value="germany" <?php echo (isset($_POST['country']) && $_POST['country'] == "germany") ? selected : '' ?>>
                        Germany
                    </option>
                    <option value="switzerland" <?php echo (isset($_POST['country']) && $_POST['country'] == "switzerland") ? selected : '' ?>>
                        Switzerland
                    </option>
                    <option value="france" <?php echo (isset($_POST['country']) && $_POST['country'] == "france") ? selected : '' ?>>
                        France
                    </option>
                </select>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['country']) && $error == true) ? "<span class='error_msg'>{$error_msg['country']}</span>" : '' ?>
            </div>
        </div>

        <div class="form__group form__user">
            <div class="form__group__cnt">
                <input type="text" name="username" id="username" placeholder="username"
                       value="<?php echo (isset($_POST['do-register']) && isset($_POST['username'])) ? $_POST['username'] : '' ?>">
                <label class="def-label" for="username">Username</label>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['username']) && $error == true) ? "<span class='error_msg'>{$error_msg['username']}" : '' ?>
            </div>
            <div class="form__group__cnt">
                <input type="password" name="password" id="password" placeholder="password"
                       value="<?php echo (isset($_POST['do-register']) && isset($_POST['password'])) ? $_POST['password'] : '' ?>">
                <label class="def-label" for="password">Password</label>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['pw_rules']) && $error == true) ? $error_msg['pw_rules'] : '' ?>
            </div>
        </div>

        <div class="form__group form__email">
            <div class="form__group__cnt">
                <input type="email" name="email" id="email" placeholder="email"
                       value="<?php echo (isset($_POST['do-register']) && isset($_POST['email'])) ? $_POST['email'] : '' ?>">
                <label class="def-label" for="email">E-Mail</label>
                <span class="focus-line"></span>
                <?php echo (isset($error_msg['email']) && $error == true) ? "<span class='error_msg'>{$error_msg['email']}</span>" : '' ?>
            </div>
        </div>

        <div class="form__group form__agb">
            <input class="check-input" type="checkbox" name="agb" id="agb"
                   value="agb" <?php echo (isset($_POST['do-register']) && isset($_POST['agb']) && $_POST['agb'] == "agb") ? 'checked' : '' ?>>
            <label class="def-label" for="agb">I read & accept the AGB<span class="check-ico"></span></label>
            <?php echo (isset($error_msg['agb']) && $error == true) ? "<span class='error_msg'>{$error_msg['agb']}</span>" : '' ?>
        </div>

        <div class="form__group form__submit">
            <button type="submit" id="submit" class="btn" name="do-register"><span class="btn-hover">Sign up</span>
            </button>
        </div>

    </form>
<?php } else { ?>
    <div class="register-success">
        <h2>Registration successfull!</h2>
        <p>Thank you for your registration!</p>
        <a href="login" class="hover hover--right"><span class="hovertxt">Login here <i
                        class='arrow-cnt'></i></span></a>
    </div>

<?php } ?>
</section>
