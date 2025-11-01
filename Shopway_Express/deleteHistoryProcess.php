<?php

require "connection.php";

if(isset($_GET["delId"])){

    $hid = $_GET["delId"];

    $history_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='".$hid."'");

    if($history_rs->num_rows == 1){
        Database::iud("Delete FROM `invoice` WHERE `id`='".$hid."'");
        echo ("deleted");
    }else{
        echo ("Please try Again Later");
    }

}

?>