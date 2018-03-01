<div class="categ categ-left">
    <div class="categ__imgs">
        <div class="main-img">
            <img src="<?php echo APP_ROOT ?>assets/imgs/home/categ-draw.jpg" alt="">
        </div>
        <div class="side-imgs">
            <img src="<?php echo APP_ROOT ?>assets/imgs/home/categ-draw_1.jpg" alt="">
            <img src="<?php echo APP_ROOT ?>assets/imgs/home/categ-draw_2.jpg" alt="">
        </div>
    </div>
    <div class="categ__txt">
        <h3 class="title-lines">drawings</h3>
        <a class="shop-link" href="<?php echo APP_ROOT ?>shop"><span>Shop <i class="arrow-cnt"></i></span></a>
        <p>Labore viral iceland prism meh, fugiat tilde brunch exercitation post-ironic. Fam organic hella, chia banjo
            kitsch green juice irony consectetur twee aesthetic cloud bread adaptogen duis. Flexitarian lo-fi
            single-origin coffee, cloud bread godard small batch occaecat lumbersexual aliquip irure.</p>
        <p>Next level pop-up freegan literally hella. Tempor mlkshk marfa tote bag pour-over tofu, brunch subway tile
            post-ironic venmo before they sold out photo booth. Master cleanse +1 chartreuse lyft chambray photo booth,
            ethical kitsch cred lo-fi twee gentrify portland yr XOXO.</p>
    </div>
</div>
<div class="categ categ-right">
    <div class="categ__imgs">
        <div class="main-img">
            <img src="<?php echo APP_ROOT ?>assets/imgs/home/categ-paint.jpg" alt="">
        </div>
        <div class="side-imgs">
            <img src="<?php echo APP_ROOT ?>assets/imgs/home/categ-paint_1.jpg" alt="">
            <img src="<?php echo APP_ROOT ?>assets/imgs/home/categ-paint_2.jpg" alt="">
        </div>
    </div>
    <div class="categ__txt">
        <h3 class="title-lines">paintings</h3>
        <a class="shop-link" href="<?php echo APP_ROOT ?>shop"><span>Shop <i class="arrow-cnt"></i></span></a>
        <p>Pickled flexitarian gluten-free roof party nulla. Pariatur vape drinking vinegar, commodo whatever synth
            aesthetic labore sunt consequat vexillologist man bun crucifix cray. Gentrify godard elit laborum, copper
            mug sriracha occupy stumptown vaporware small batch kombucha ipsum church-key. Poutine ugh aesthetic, enamel
            pin activated charcoal ethical magna ut brunch asymmetrical post-ironic adaptogen paleo.</p>
        <p>IPhone wayfarers ullamco, lyft brunch sint vegan butcher 8-bit chicharrones wolf. Cloud bread chillwave man
            braid, deserunt stumptown vape gentrify vinyl pour-over pork belly intelligentsia green juice semiotics XOXO
            artisan.</p>
    </div>
</div>


<div class="newsletter form-cnt">

    <?php $token = uniqid();
    $_SESSION['form-token'] = $token;
    ?>
    <h3><span class="title-lines">Newsletter</span></h3>
    <form class="form" method="post">
        <input type="hidden" name="form-token" value="<?php echo $token; ?>">
        <div class="form__group form__fname">
            <div class="form__group__cnt">
                <input type="text" name="fname" id="fname" placeholder="first name">
                <label for="fname" class="def-label">First Name</label>
                <span class="focus-line"></span>
            </div>
        </div>
        <div class="form__group form__lname">
            <div class="form__group__cnt">
                <input type="text" name="lname" id="lname" placeholder="last name">
                <label for="lname" class="def-label">Last Name</label>
                <span class="focus-line"></span>
            </div>
        </div>
        <div class="form__group form__email">
            <div class="form__group__cnt">
                <input type="email" name="email" id="newsletter" placeholder="email">
                <label class="def-label" for="newsletter">E-Mail</label>
                <span class="focus-line"></span>
            </div>
        </div>
        <div class="form__group form__submit">
            <button class="btn" name="do-newsletter" type="submit" id="do-newsletter"><span class="btn-hover">Get the latest news!</span>
            </button>
        </div>
    </form>

</div>

<div class="content-line"></div>
