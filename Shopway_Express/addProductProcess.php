<?php

session_start();

require "connection.php";

$email = $_SESSION["u"]["email"];

$title = $_POST["title"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$colour = $_POST["colour"];
$condition = $_POST["condition"];
$qty = $_POST["qty"];
$cost = $_POST["cost"];
$deliveryCWM = $_POST["deliveryCWM"];
$diliveryCOM = $_POST["diliveryCOM"];
$description = $_POST["description"];

if (empty($title)) {
    echo ("Please enter the title");
} else if (empty($category)) {
    echo ("Please select the category");
} else if (empty($brand)) {
    echo ("Please select the brand");
} else if (empty($model)) {
    echo ("Please select the model");
} else if (empty($colour)) {
    echo ("Please select the colour");
} else if (empty($condition)) {
    echo ("Please select the condition");
} else if (empty($qty)) {
    echo ("Please enter the quantity");
} else if (empty($cost)) {
    echo ("Please enter the cost");
} else if (empty($deliveryCWM)) {
    echo ("Please enter the delivery cost");
} else if (empty($diliveryCOM)) {
    echo ("Please enter the delivery cost");
} else if (empty($description)) {
    echo ("Please enter the description");
} else {

    $model_has_brand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `model_model_id` = '" . $model . "' AND `brand_brand_id` = '" . $brand . "'");

    $model_has_brand_id;

    if ($model_has_brand_rs->num_rows > 0) {

        $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
        $model_has_brand_id = $model_has_brand_data["id"];
    } else {

        Database::iud("INSERT INTO `model_has_brand` (`model_model_id`,`brand_brand_id`) VALUES ('" . $model . "','" . $brand . "')");

        $model_has_brand_id = Database::$connection->insert_id;
    }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product`(`price`,`qty`,`description`,`title`,`datetime_added`,`delivery_fee_matara`,
`delivery_fee_other`,`category_category_id`,`user_email`,`model_has_brand_id`,`color_color_id`,
`status_status_id`,`condition_condition_id`) VALUES ('" . $cost . "','" . $qty . "','" . $description . "',
'" . $title . "','" . $date . "','" . $deliveryCWM . "','" . $diliveryCOM . "','" . $category . "','" . $email . "',
'" . $model_has_brand_id . "','" . $colour . "','" . $status . "','" . $condition . "')");

    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        $allowed_img_extantions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {

            if (isset($_FILES["image" . $x])) {

                $img_file = $_FILES["image" . $x];
                $file_extention = $img_file["type"];

                if (in_array($file_extention, $allowed_img_extantions)) {

                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resources//product_images//" . $title . "_" . uniqid() . $new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `product_image`(`product_image_path`,`product_product_id`) VALUES
                ('" . $file_name . "','" . $product_id . "')");
                } else {

                    echo ("Not an allowed image type.");
                }
            }
        }

        echo ("success");
    } else {

        echo ("Invalid Image Count");
    }
}

?>