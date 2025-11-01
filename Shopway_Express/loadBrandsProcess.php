<?php

require "connection.php";

if(isset($_GET["c"])){

    $category_id = $_GET["c"];

    $category_rs = Database::search("SELECT * FROM `brand_has_category` WHERE `category_category_id`='".$category_id."'");
    $category_num = $category_rs->num_rows;

    ?>
    
    <option value="0">Select Brand</option>
    
    <?Php

    for($x = 0; $x < $category_num; $x++){

        $category_data = $category_rs->fetch_assoc();

        $brand_rs = Database::search("SELECT * FROM `brand` WHERE `brand_id` = '".$category_data["brand_brand_id"]."'");
        $brand_data = $brand_rs->fetch_assoc();

        ?>
        
        <option value="<?php echo $brand_data["brand_id"]; ?>"><?php echo  $brand_data["brand_name"]; ?></option>

        <?php

    }
    
}

?>