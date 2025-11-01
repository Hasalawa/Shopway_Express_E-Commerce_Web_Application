<?php

session_start();
require "connection.php";

$txt = $_POST["t"];

?>

<div class="col-12">
    <div class="row">

        <?php

        $selected_rs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $txt . "%'");
        $selected_num = $selected_rs->num_rows;

        ?>


        <?php

        for ($z = 0; $z < $selected_num; $z++) {

            $sid = $selected_num;
            $selected_data = $selected_rs->fetch_assoc();

        ?>


            <div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                        <span class="fw-bold text-white"><?php echo $selected_data["product_id"]; ?></span>
                    </div>

                    <div class="col-2 d-none d-lg-block bg-secondary py-2">
                        <?php
                        $image_rs = Database::search("SELECT * FROM `product_image`  WHERE `product_product_id`='" . $selected_data["product_id"] . "'");
                        $image_num = $image_rs->num_rows;
                        if ($image_num == 0) {
                        ?>
                            <img src="resource/empty.svg" style="height: 40px;margin-left: 80px;" />
                        <?php

                        } else {
                            $image_data = $image_rs->fetch_assoc();
                        ?>
                            <img src="<?php echo $image_data["product_image_path"]; ?>" style="height: 40px;margin-left: 80px;" />
                        <?php
                        }
                        ?>

                    </div>
                    <div class="col-4 col-lg-2 bg-secondary py-2">
                        <span class="fw-bold text-white"><?php echo $selected_data["title"]; ?></span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block bg-secondary py-2">
                        <span class="text-white fw-bold">Rs.<?php echo $selected_data["price"]; ?>.00</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-secondary py-2">
                        <span class="fw-bold text-white"><?php echo $selected_data["qty"]; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-secondary py-2">
                        <span class="text-white fw-bold"><?php echo $selected_data["datetime_added"]; ?></span>
                    </div>
                    <div class="col-2 col-lg-1 bg-secondary py-2 d-grid">
                        <?php

                        if ($selected_data["status_status_id"] == 1) {
                        ?>
                            <button id="pb<?php echo $selected_data['product_id']; ?>" class="btn btn-danger fw-bold" onclick="blockProduct('<?php echo $selected_data['product_id']; ?>');">Block</button>
                        <?php
                        } else {
                        ?>
                            <button id="pb<?php echo $selected_data['product_id']; ?>" class="btn btn-success fw-bold" onclick="blockProduct('<?php echo $selected_data['product_id']; ?>');">Unblock</button>
                        <?php

                        }

                        ?>
                    </div>
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
                            <label class="form-label fs-1 fw-bold">The Product You Searched for is not here.</label>
                        </div>
                        <div class="col-12 text-center mb-3">
                            <p class="fs-3 fw-bold text-black">Search for a product that has been added to the shopWay eXpress</p>
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