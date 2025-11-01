<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_POST["payment"])) {

    $payment = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H-i-s");

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user["email"] . "'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        Database::iud("INSERT INTO `invoice` (`order_id`,`date`,`total`,`qty`,`status`,`product_product_id`,`user_email`)
        VALUES ('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','".$d["qty"]."','0','".$d["product_product_id"]."','".$user["email"]."')");

        $rs2 = Database::search("SELECT * FROM `product` WHERE `product_id` = '" . $d["product_product_id"] . "'");
        $d2 = $rs2->fetch_assoc();

        $newQty = $d2["qty"] - $d["qty"];
        Database::iud("UPDATE `product` SET `qty` = '" . $newQty . "' WHERE `product_id` = '" . $d["product_product_id"] . "'");

    }

    Database::iud("DELETE FROM `cart` WHERE `user_email` = '".$user["email"]."'");
    echo ("Success");

}
