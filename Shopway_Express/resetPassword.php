<?php

session_start();
require "connection.php";

if(isset($_SESSION["e"])){

    $email = $_SESSION['e'];

    $nP = $_POST["nP"];
    $rP = $_POST["rP"];
    $vCode = $_POST["vCode"];

    if(empty($nP)){
        echo ("Please Type a New Password");
    }else if(strlen($nP) < 5 || strlen($nP) > 15){
        echo ("Password Length is 5 - 15");
    }else if(empty($rP)){
        echo ("Please Retype password");
    }else if($nP != $rP){
        echo ("Passwords Do not match");
    }else if(empty($vCode)){
        echo("Please Enter Your Verification Code");
    }else{

        $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `varification_code`='".$vCode."'");
        $num = $rs->num_rows;

        if($num == 1){

            Database::iud("UPDATE `user` SET `password`='".$nP."' WHERE `email`='".$email."'");
            echo ("success");

        }else{

            echo ("Invalid Email or Verification Code");

        }

    }

}else{

    echo ("Mising Email Address");

}

?>