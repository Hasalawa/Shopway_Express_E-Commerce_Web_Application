<?php

include "connection.php";
$cartId = $_POST['c'];
$newQty = $_POST['q'];

// echo($newQty);

$rs = Database::search("SELECT * FROM `cart` WHERE `product_product_id` = '" . $cartId . "'");
$num = $rs->num_rows;
$cart = $rs->fetch_assoc();

$prs = Database::search("SELECT * FROM `product` WHERE `product_id` = '" . $cartId . "'");
$num1 = $prs->num_rows;
$prs_data = $prs->fetch_assoc();
$qty = $prs_data["qty"];

if ($num > 0) {

    if ($qty >= $newQty) {
        Database::iud("UPDATE `cart` SET `qty` = '" . $newQty . "' WHERE `product_product_id` = '" . $cartId . "'");
        echo "success";
    } else {
        echo "Your Product Quantity Exceeded";
    }
} else {
    echo "Cart item not found";
}