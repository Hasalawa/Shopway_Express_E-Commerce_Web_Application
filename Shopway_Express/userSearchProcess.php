<?php
session_start();
require "connection.php";

$txt = $_POST["t"];

?>

<div class="col-12">
    <div class="row">

        <?php

        $selected_rs = Database::search("SELECT * FROM `user` WHERE `fname` LIKE '%" . $txt . "%'");
        $selected_num = $selected_rs->num_rows;
        ?>


        <?php

        for ($z = 0; $z < $selected_num; $z++) {

            $sid = $selected_num;
            $selected_data = $selected_rs->fetch_assoc();



        ?>

            <div class="col-12 mt-3 mb-3" id="userSearch">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-secondary py-2 text-center">
                        <span class=" fw-bold text-white"><?php echo $z + 1; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block text-center bg-secondary py-2">
                        <?php
                        $image_rs = Database::search("SELECT * FROM `profile_image`  WHERE `user_email`='" . $selected_data['email'] . "'");
                        $image_data = $image_rs->fetch_assoc();
                        ?>
                        <img src="<?php echo $image_data["path"] ?>" style="height: 40px;margin-left: 80px;" />
                    </div>
                    <div class="col-4 col-lg-2 bg-secondary text-center py-2">
                        <span class="fw-bold text-white"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block bg-secondary text-center py-2">
                        <span class="fw-bold text-white"><?php echo $selected_data["email"]; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-secondary text-center py-2">
                        <span class="fw-bold text-white"><?php echo $selected_data["mobile"]; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-secondary text-center py-2">
                        <span class="text-white fw-bold"><?php echo $selected_data["joined_date"]; ?></span>
                    </div>

                    <?php
                    if ($selected_data["status"] == 1) {
                    ?>
                        <div class="col-2 col-lg-1 bg-secondary py-2 d-grid">
                            <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-danger fw-bold" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Block</button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-2 col-lg-1 bg-secondary py-2 d-grid">
                            <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-success fw-bold" onclick="blockUser('<?php echo $selected_data['email']; ?>');">UnBlock</button>
                        </div>
                    <?php

                    }
                    ?>

                </div>
            </div>

        <?php

        }
        ?>

        <?php
        if (isset($sid)) {
        } else {
            $sid = 0;
        }
        if ($sid == 1) {
        } elseif ($sid != 1) {
            if ($sid == 0) {
        ?>
                <!-- Empty View -->
                <div class="col-12 mt-5 mb-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <i class="bi bi-search" style="font-size: 100px;"></i>
                        </div>
                        <div class="col-12 text-center mb-2">
                            <label class="form-label fs-1 fw-bold">The user you searched for is not here.</label>
                        </div>
                        <div class="col-12 text-center mb-3">
                            <p class="fs-3 fw-bold text-danger">Find a user connected to the shopWay eXpress.</p>
                        </div>
                    </div>
                </div>
                <!-- Empty View -->
        <?php
            }
        }

        ?>



    </div>
</div>