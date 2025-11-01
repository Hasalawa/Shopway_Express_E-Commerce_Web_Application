<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $user_email = $_SESSION["u"]["email"];

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $mobile = $_POST["mobile"];
        $line1 = $_POST["line1"];
        $line2 = $_POST["line2"];
        $line3 = $_POST["line3"];
        $city = $_POST["city"];
        $district = $_POST["district"];
        $province = $_POST["province"];
        $postal_code = $_POST["pCode"];

        if (empty($fname)) {
            echo ("Please Enter Your First Name.");
        } else if (strlen($fname) > 20) {
            echo ("The Charater Limit Is 20.");
        } else if (empty($lname)) {
            echo ("Please Enter Your Last Name.");
        } else if (strlen($lname) > 20) {
            echo ("The Charater Limit Is 20");
        } else if (empty($mobile)) {
            echo ("Please Enter Your Mobile Number.");
        } else if (strlen($mobile) != 10) {
            echo ("The Character Limit Is 10.");
        } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]{7}/", $mobile)) {
            echo ("Invalid Mobile Number.");
        } else if (empty($line1)) {
            echo ("Please Enter Your Address Line 1.");
        } else if (empty($line2)) {
            echo ("Please Enter Your Address Line 2.");
        } else if (empty($line3)) {
            echo ("Please Enter Your Address Line 3.");
        } else if (empty($city)) {
            echo ("Please Select Your City.");
        } else if (empty($district)) {
            echo ("Please Select Your District.");
        } else if (empty($province)) {
            echo ("Please Select Your Province.");
        } else if (empty($postal_code)) {
            echo ("Please Enter Your Postal Code.");
        } else {

        $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $user_email . "'");

        $address_num = $address_rs->num_rows;

        if ($address_num == 1) {

            Database::iud("UPDATE `user_has_address` SET `city_city_id`='" . $city . "',`address_line_1`='" . $line1 . "',
                        `address_line_2`='" . $line2 . "',`address_line_3`='" . $line3 . "',
                        `postal_code`='" . $postal_code . "' WHERE `user_email`='" . $user_email . "'");

            Database::iud("UPDATE `city` SET `district_district_id` = '" . $district . "' WHERE `city_id` = '" . $city . "'");

            Database::iud("UPDATE `district` SET `province_province_id`='" . $province . "' WHERE `district_id` = '" . $district . "'");

        } else {

            Database::iud("INSERT INTO `user_has_address` (`user_email`,`city_city_id`,`address_line_1`,`address_line_2`,`address_line_3`,`postal_code`)
                        VALUES ('" . $user_email . "','" . $city . "','" . $line1 . "','" . $line2 . "','" . $line3 . "','" . $postal_code . "')");

            Database::iud("UPDATE `city` SET `district_district_id`='" . $district . "' WHERE `city_id`='" . $city . "'");

            Database::iud("UPDATE `district` SET `province_province_id`='" . $province . "' WHERE `district_id`='" . $district . "'");

        }

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        if (isset($_FILES["pImg"])) {

            $img = $_FILES["pImg"];
            $file_type = $img["type"];

            if (in_array($file_type, $allowed_image_extentions)) {

                $new_file_type;

                if ($file_type == "image/jpg") {
                    $new_file_type = ".jpg";
                } else if ($file_type == "image/jpeg") {
                    $new_file_type = ".jpeg";
                } else if ($file_type == "image/png") {
                    $new_file_type = ".png";
                } else if ($file_type == "image/svg+xml") {
                    $new_file_type = ".svg";
                }

                $file_name = "resources//profile_images//" . $lname . "_" . $mobile . "_" . uniqid() . $new_file_type;
                move_uploaded_file($img["tmp_name"], $file_name);

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user_email . "'");

                $image_num = $image_rs->num_rows;

                if ($image_num == 1) {

                    Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE `user_email` = '" . $user_email . "'");
                } else {

                    Database::iud("INSERT INTO `profile_image` (`path`,`user_email`) VALUES
                ('" . $file_name . "','" . $user_email . "')");
                }
            } else {

                echo ("File type does not allowed to upload");
            }
        }

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $user_email . "'");
        $user_num = $user_rs->num_rows;

        if ($user_num == 1) {

            Database::iud("UPDATE `user` SET `fname` = '" . $fname . "',`lname` = '" . $lname . "',`mobile` = '" . $mobile . "' WHERE
        `email` = '" . $user_email . "'");

        }

        echo ("success");

    }

}

?>