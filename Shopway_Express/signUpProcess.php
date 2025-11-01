<?php

require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["pwd"];
$password1 = $_POST["pwd1"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];

if (empty($fname)) {
    echo ("Please Enter Your First Name.");
} else if (strlen($fname) > 20) {
    echo ("The Charater Limit Is 20.");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name.");
} else if (strlen($lname) > 20) {
    echo ("The Charater Limit Is 20");
} else if (empty($email)) {
    echo ("Please Enter Your Email Address.");
} else if (strlen($email) > 100) {
    echo ("Email Must Have Less Than 100 Characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else if (empty($password)) {
    echo ("Please Enter Your Password.");
} else if (strlen($password) < 5 || strlen($password) > 15) {
    echo ("Password Length is 5 - 15.");
} else if (empty($password1)) {
    echo ("Please Enter Your Password");
} else if ($password != $password1) {
    echo ("Pasword Does Not Match");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile Number.");
} else if (strlen($mobile) != 10) {
    echo ("The Character Limit Is 10.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number.");
} else if (empty($gender)) {
    echo ("Please Select Your Gender.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("Email Or Mobile Number Already Exists.");
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimeZone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` 
        (`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`status`,`gender_gender_id`)
        VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $password . "','" . $mobile . "',
        '" . $date . "','1','" . $gender . "')");

        echo ("success");
    }
}

?>