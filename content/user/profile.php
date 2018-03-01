<?php

$sql = "SELECT * FROM users WHERE id = {$_SESSION['curr-user']['id']}";
$res = mysqli_query($dblink, $sql);
$row = mysqli_fetch_assoc($res);

?>

<div class="profile form-cnt">
    <form class="profile__form form">
        <?php
        $ignore = ["id" => '', "user_group" => '', "password" => ""];
        $change_labels = array(
            'fname' => 'First Name',
            'lname' => 'Last Name',
            'email' => 'E-Mail'
        );
        $input_type = array(
            "fname" => "text",
            "lname" => "text",
            "street" => "text",
            "city" => "text",
            "postcode" => "textnumber",
            "email" => "email",
            "password" => "password"
        );
        $float_cnt = array(
            "gender" => "left",
            "fname" => "left",
            "lname" => "left",
            "street" => "right",
            "city" => "right",
            "postcode" => "right",
            "country" => "right",
            "email" => "left",
            "username" => "left",
            "submit" => "center"
        );
        foreach ($row as $key => $val) {

            if (isset($ignore[$key])) continue;

            if (isset($change_labels[$key])) {
                $key_label = $change_labels[$key];
            } else {
                $key_label = $key;
            }

            if (isset($input_type[$key])) {
                $key_input = $input_type[$key];
            }

            if (isset($float_cnt[$key])) {
                $float = $float_cnt[$key];
            } else {
                $float = "";
            }



            if ($key == "gender" || $key == "country") {
                ?>
                <div class="form__group form__<?php echo $key . " " . $float ?>">
                    <div class="form__group__cnt ">

                        <div class="arrow-cnt"></div>
                        <select class="def-select" <?php echo "name=\"$key\" id=\"$key\"" ?>>
                            <?php if ($key == "gender") { ?>
                                <option <?php echo ($val == "female") ? 'selected' : '' ?> value="female">Female
                                </option>
                                <option <?php echo ($val == "male") ? 'selected' : '' ?> value="male">Male</option>
                            <?php } ?>

                            <?php if ($key == "country") { ?>
                                <option <?php echo ($val == "austria") ? 'selected' : '' ?> value="austria">Austria
                                </option>
                                <option <?php echo ($val == "germany") ? 'selected' : '' ?> value="germany">Germany
                                </option>
                                <option <?php echo ($val == "switzerland") ? 'selected' : '' ?> value="switzerland">
                                    Switzerland
                                </option>
                                <option <?php echo ($val == "france") ? 'selected' : '' ?> value="france">France
                                </option>
                            <?php } ?>
                        </select><span class="focus-line"></span>
                        <label class="def-label" <?php echo "for=\"$key\">" . $key_label . ':' ?></label>
                    </div>
                </div>
            <?php } else { ?>
                <div class="form__group form__<?php echo $key . " " . $float ?>">
                    <div class="form__group__cnt">
                        <input class="profile-input" <?php echo "type=\"$key_input\" name=\"$key\" id=\"$key\" value=\"$val\" placeholder=\"$key\"" ?>>
                        <label class="def-label" <?php echo "for=\"$key\">" . $key_label . ':' ?></label>
                        <span class="focus-line"></span>
                        <label for="<?php echo $key ?>" class="edit edit-1">
                            <span class="icon-pencil"></span>
                        </label>
                        <label for="<?php echo $key ?>" class="edit edit-2"><span class="icon-pencil"></span><span class="txt">Editing</span></label>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="form__group form__submit center">
            <button type="submit" name="change-profile" class="btn"><span class="btn-hover"></span>Change Profile</button>
        </div>
    </form>
</div>
