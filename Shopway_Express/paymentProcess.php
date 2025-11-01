<?php

include "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];

    $productList = array();
    $qtyList = array();

    if (isset($_POST["cart"]) && $_POST["cart"] == "true") {
        // From Cart

        $rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $user["email"] . "'");
        $num = $rs->num_rows;

        for ($i = 0; $i < $num; $i++) {
            $d = $rs->fetch_assoc();

            $productList[] = $d["product_product_id"];
            $qtyList[] = $d["qty"];
        }
    }

    $merchantId = "1222356";
    $merchantSecret = "MjI3MzY4NDQ0NzMzMjY5NzEzNzMzOTM3MzQwNzM3Mjk0MTg3ODU=";
    $items = "";
    $netTotal = 0;
    $currency = "LKR";
    $oderId = uniqid();

    $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON
    `user_has_address`.`city_city_id` = `city`.`city_id` INNER JOIN `district` ON
    `city`.`district_district_id` = `district`.`district_id` WHERE `user_email`= '".$user["email"]."'");
    $address_d = $address_rs->fetch_assoc();

    for ($i = 0; $i < sizeof($productList); $i++) {
        $rs2 = Database::search("SELECT * FROM `product` WHERE `product_id` = '" . $productList[$i] . "'");

        $d2 = $rs2->fetch_assoc();
        $productQty = $d2["qty"];

        if ($productQty >= $qtyList[$i]) {
            //Stock Available
            $items .= $d2["title"];

            if ($i != sizeof($productList) - 1) {
                $items .= ", ";
            }

            $netTotal += (intval($d2["price"]) * intval($qtyList[$i]));

            if($address_d["district_id"] == 22){
                $netTotal += 300;
            }else{
                $netTotal += 350;
            }

        } else {
            echo ("Product has no available stock");
        }
    }

    $hash = strtoupper(
        md5(
            $merchantId .
                $oderId .
                number_format($netTotal, 2, '.', '') .
                $currency .
                strtoupper(md5($merchantSecret))
        )
    );

    $city_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $user["email"] . "'");
    $city_data = $city_rs->fetch_assoc();

    $payment = array();
    $payment["sandbox"] = true;
    $payment["merchant_id"] = $merchantId;
    $payment["first_name"] = $user["fname"];
    $payment["last_name"] = $user["lname"];
    $payment["email"] = $user["email"];
    $payment["phone"] = $user["mobile"];
    $payment["address"] = $city_data["address_line_1"] . "," . $city_data["address_line_2"];
    $payment["city"] = $city_data["address_line_3"];
    $payment["country"] = "Sri Lanka";
    $payment["order_id"] = $oderId;
    $payment["items"] = $items;
    $payment["currency"] = $currency;
    $payment["amount"] = number_format($netTotal, 2, '.', '');
    $payment["hash"] = $hash;
    $payment["return_url"] = "";
    $payment["cancel_url"] = "";
    $payment["notify_url"] = "";

    echo json_encode($payment);

}