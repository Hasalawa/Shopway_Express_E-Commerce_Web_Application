<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>My Profile | shopWay eXpress</title>
    <link rel="icon" href="resources/logo.png" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <br />

            <?php

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");

                $img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON
                `user_has_address`.`city_city_id`=`city`.`city_id` INNER JOIN `district` ON
                `city`.`district_district_id` = `district`.`district_id` INNER JOIN `province` ON
                `district`.`province_province_id` = `province`.`province_id` WHERE `user_email`='" . $email . "'");

                $uData = $user_rs->fetch_assoc();
                $imgData = $img_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();

            ?>

                <div class="col-12">
                    <div class="row px-5 pt-5 pb-4">
                        <div class="col-12 content-1 rounded-3 mb-4">

                            <div class="row">

                                <div class="col-lg-4 col-12 d-flex justify-content-center border-end border-dark">

                                    <?php

                                    if (empty($imgData["path"])) {

                                    ?>

                                        <img src="resources/user.png" id="img" class="mt-3 mb-3 rounded-circle" style="width: 25%;" />

                                    <?php

                                    } else {

                                    ?>

                                        <img src="<?php echo $imgData["path"]; ?>" id="img" class="mt-3 mb-3 rounded-circle" style="width: 25%;" />

                                    <?php

                                    }

                                    ?>

                                </div>

                                <div class="col-lg-4 col-12 text-center border-end border-dark">
                                    <h3 class="mt-3 text-light"><?php echo $uData["fname"] . " " . $uData["lname"]; ?></h3>
                                    <h6 class="text-light"><?php echo $uData["email"]; ?></h6>
                                    <div class="col-12 mb-3 mt-2">
                                        <input type="file" class="d-none" id="profileImg" />
                                        <label for="profileImg" class="btn btn-dark col-8 opacity-50" onclick="changeImage();">Update Profile Image <i class="bi bi-camera-fill camera-icon"></i></label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12 text-center pb-1 border-dark">
                                    <h5 class="mt-4 px-4 text-light">Default Delivery Address</h5>
                                    <div class="col-12 px-4">
                                        <h6 class="mt-4 text-light">
                                            <?php
                                            if (!empty($address_data["address_line_1"])) {
                                                echo '"' . $address_data["address_line_1"] . '"' . "," . $address_data["address_line_2"] . ',';
                                            } else {
                                            ?><span>The address has not been added</span><?php
                                                                                        }
                                                                                            ?></h6>
                                        <h6 class="text-light">
                                            <?php
                                            if (!empty($address_data["address_line_3"])) {
                                                echo $address_data["address_line_3"] . ".";
                                            }
                                            ?></h6>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-6 col-12 pe-lg-4 mb-4">
                            <div class="row">
                                <div class="col-12 content-1 rounded-3">
                                    <div class="row px-3 pt-3 pb-3">

                                        <div class="col-6">
                                            <label class="form-label text-light">First Name</label>
                                            <input type="text" class="form-control" value="<?php echo $uData["fname"]; ?>" id="fname" />
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label text-light">Last Name</label>
                                            <input type="text" class="form-control" value="<?php echo $uData["lname"]; ?>" id="lname" />
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label text-light">Mobile</label>
                                            <input type="text" class="form-control" value="<?php echo $uData["mobile"]; ?>" id="mobile" />
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label text-light">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control dis" value="<?php echo $uData["password"]; ?>" readonly />
                                                <span class="input-group-text bg-dark" id="basic-addon2" style="border: none; opacity: 60%;">
                                                    <i class="bi bi-eye-slash-fill text-white"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label text-light">Email</label>
                                            <input type="text" class="form-control dis" value="<?php echo $uData["email"]; ?>" readonly />
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label text-light">Registered Date</label>
                                            <input type="text" class="form-control text-dark dis" value="<?php echo $uData["joined_date"]; ?>" readonly />
                                        </div>

                                        <?Php

                                        $gender_rs = Database::search("SELECT * FROM `gender` INNER JOIN `user` ON
                                        user.gender_gender_id = gender.gender_id WHERE `email`='" . $email . "'");

                                        $gender_data = $gender_rs->fetch_assoc();

                                        ?>

                                        <div class="col-6">
                                            <label class="form-label text-light">Gender</label>
                                            <input type="text" class="form-control dis" value="<?php echo $gender_data["gender_name"]; ?>" readonly />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 ps-lg-4">
                            <div class="row">
                                <div class="col-12 content-1 rounded-3">
                                    <div class="row px-3 pt-3 pb-3">

                                        <?Php

                                        if (!empty($address_data["address_line_1"])) {

                                        ?>

                                            <div class="col-6">
                                                <label class="form-label text-light">Address Line 01</label>
                                                <input type="text" class="form-control" id="line1" value="<?php echo $address_data["address_line_1"]; ?>" />
                                            </div>

                                        <?php

                                        } else {

                                        ?>

                                            <div class="col-6">
                                                <label class="form-label text-light">Address Line 01</label>
                                                <input type="text" id="line1" class="form-control" placeholder="Enter Address Line 01" />
                                            </div>

                                        <?php

                                        }

                                        if (!empty($address_data["address_line_2"])) {

                                        ?>

                                            <div class="col-6">
                                                <label class="form-label text-light">Address Line 02</label>
                                                <input type="text" id="line2" class="form-control" value="<?php echo $address_data["address_line_2"]; ?>" />
                                            </div>

                                        <?php

                                        } else {

                                        ?>

                                            <div class="col-6">
                                                <label class="form-label text-light">Address Line 02</label>
                                                <input type="text" id="line2" class="form-control" placeholder="Enter Address Line 02" />
                                            </div>

                                        <?php

                                        }

                                        if (!empty($address_data["address_line_3"])) {

                                        ?>

                                            <div class="col-6">
                                                <label class="form-label text-light">Address Line 03</label>
                                                <input type="text" id="line3" class="form-control" value="<?php echo $address_data["address_line_3"]; ?>" />
                                            </div>

                                        <?php

                                        } else {

                                        ?>

                                            <div class="col-6">
                                                <label class="form-label text-light">Address Line 03</label>
                                                <input type="text" id="line3" class="form-control" placeholder="Enter Address Line 03" />
                                            </div>

                                        <?php

                                        }

                                        $city_rs = Database::search("SELECT * FROM `city`");
                                        $district_rs = Database::search("SELECT * FROM `district`");
                                        $province_rs = Database::search("SELECT * FROM `province`");


                                        ?>

                                        <div class="col-6">
                                            <label class="form-label text-light">City</label>
                                            <select class="form-select" id="city">
                                                <option value="0">Select City</option>
                                                <?php

                                                $count = $city_rs->num_rows;

                                                for ($x = 0; $x < $count; $x++) {
                                                    $city_data = $city_rs->fetch_assoc();
                                                ?>

                                                    <option value="<?php echo $city_data["city_id"]; ?>
                                                    " <?php
                                                        if (!empty($address_data["city_city_id"])) {
                                                            if ($city_data["city_id"] == $address_data["city_city_id"]) {
                                                        ?>selected<?php
                                                                }
                                                            }
                                                                    ?>>
                                                        <?php echo $city_data["city_name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label text-light">District</label>
                                            <select class="form-select" id="district">
                                                <option value="0">Select District</option>
                                                <?php
                                                $district_num = $district_rs->num_rows;
                                                for ($x = 0; $x < $district_num; $x++){
                                                    $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo $district_data["district_id"]; ?>
                                                    "<?php
                                                    if (!empty($address_data["district_district_id"])){
                                                        if($district_data["district_id"] == $address_data["district_district_id"]){
                                                            ?>selected<?php
                                                        }
                                                    } ?>><?php echo  $district_data["district_name"]; ?></option>

                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label text-light">Province</label>
                                            <select class="form-select" id="province">
                                                <option value="0">Select Province</option>
                                                <?php
                                                $province_num = $province_rs->num_rows;
                                                for ($x = 0; $x < $province_num; $x++){
                                                    $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo $province_data["province_id"]; ?>
                                                    "<?php
                                                    if (!empty($address_data["province_province_id"])){
                                                        if ($province_data["province_id"] == $address_data["province_province_id"]){
                                                            ?>selected<?php
                                                        }
                                                    }
                                                    ?>><?php echo $province_data["province_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <?php

                                        if (empty($address_data["postal_code"])) {
                                        ?>
                                            <div class="col-6">
                                                <label class="form-label text-light">Postal Code</label>
                                                <input type="text" id="postalCode" class="form-control" placeholder="Enter your postal code" />
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-6">
                                                <label class="form-label text-light">Postal Code</label>
                                                <input type="text" id="postalCode" class="form-control" value="<?php echo $address_data['postal_code']; ?>" />
                                            </div>
                                        <?php
                                        }

                                        ?>

                                        <div class="col-6 mt-4 mb-2 d-grid">
                                            <button class="btn btn-dark opacity-50 mt-2" onclick="updateProfile();">Update Profile</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

        </div>
    </div>

<?php

            } else {

?>

    <script>
        window.location = "home.php";
    </script>

<?php

            }

?>

<div class="container-fluid col-12">
    <div class="row">
        <?php include "footer.php" ?>
    </div>
</div>

<script src="script.js"></script>
</body>

</html>