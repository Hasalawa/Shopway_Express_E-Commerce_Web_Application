<?php
session_start();
require "connection.php";

if (isset($_GET["v"])) {
    $verification = $_GET["v"];

    $admin = Database::search("SELECT * FROM `admin` WHERE `verification_code`='" . $verification . "'");
    $num = $admin->num_rows;

    if ($num == 1) {
        $data = $admin->fetch_assoc();
        $_SESSION["au"] = $data;
        echo ("Success");
    } else {
        echo ("Invalid Verification Code");
    }
} else {
    echo ("Please Enter Your Verification");
}
?>