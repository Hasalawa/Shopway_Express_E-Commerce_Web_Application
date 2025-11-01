<?php

require "connection.php";

if(isset($_GET["del"])){

    $del = $_GET["del"];

    if($del == "true"){

        Database::iud("DELETE FROM `invoice`");
        echo("deleted");

    }else{
        echo ("Please agree to the remove all history.");
    }

}else{

    echo ("Something went wrong.");

}

?>