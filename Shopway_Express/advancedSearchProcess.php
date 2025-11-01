<?php

session_start();
require "connection.php";

$search_txt = $_POST["t"];
$category = $_POST["c1"];
$brand = $_POST["b1"];
$model = $_POST["m"];
$condition = $_POST["c2"];
$color = $_POST["c3"];
$from = $_POST["pf"];
$to = $_POST["pt"];
$sort = $_POST["sort"];

$query = "SELECT * FROM `product` INNER JOIN `condition` ON `product`.`condition_condition_id` = `condition`.`condition_id`";
$status = 0;

if ($sort == 0) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%'";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_category_id`='" . $category . "'";
        $status = 1;
    } else if ($category != 0 && $status != 0) {
        $query .= " AND `category_category_id`='" . $category . "'";
    }

    $pid = 0;
    if ($brand != 0 && $model == 0) {
        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($brand == 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `model_model_id`='" . $model . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($brand != 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                        `model_model_id`='" . $model . "' AND `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($condition != 0 && $status == 0) {
        $query .= " WHERE `condition_condition_id`='" . $condition . "'";
        $status = 1;
    } else if ($condition != 0 && $status != 0) {
        $query .= " AND `condition_condition_id`='" . $condition . "'";
    }

    if ($color != 0 && $status == 0) {
        $query .= " WHERE `color_color_id`='" . $color . "'";
        $status = 1;
    } else if ($color != 0 && $status != 0) {
        $query .= " AND `color_color_id`='" . $color . "'";
    }

    if (!empty($from) && empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $from . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $from . "'";
        }
    } else if (empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $to . "'";
        }
    } else if (!empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $from . "' AND '" . $to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $from . "' AND '" . $to . "'";
        }
    }
} else if ($sort == 1) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` ASC";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_category_id`='" . $category . "' ORDER BY `price` ASC";
        $status = 1;
    } else if ($category != 0 && $status != 0) {
        $query .= " AND `category_category_id`='" . $category . "' ORDER BY `price` ASC";
    }

    $pid = 0;
    if ($brand != 0 && $model == 0) {
        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `price` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `price` ASC";
        }
    }

    if ($brand == 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `model_model_id`='" . $model . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `price` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `price` ASC";
        }
    }

    if ($brand != 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                        `model_model_id`='" . $model . "' AND `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `price` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `price` ASC";
        }
    }

    if ($condition != 0 && $status == 0) {
        $query .= " WHERE `condition_condition_id`='" . $condition . "' ORDER BY `price` ASC";
        $status = 1;
    } else if ($condition != 0 && $status != 0) {
        $query .= " AND `condition_condition_id`='" . $condition . "' ORDER BY `price` ASC";
    }

    if ($color != 0 && $status == 0) {
        $query .= " WHERE `color_color_id`='" . $color . "' ORDER BY `price` ASC";
        $status = 1;
    } else if ($color != 0 && $status != 0) {
        $query .= " AND `color_color_id`='" . $color . "' ORDER BY `price` ASC";
    }

    if (!empty($from) && empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $from . "' ORDER BY `price` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $from . "' ORDER BY `price` ASC";
        }
    } else if (empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $to . "' ORDER BY `price` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $to . "' ORDER BY `price` ASC";
        }
    } else if (!empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `price` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `price` ASC";
        }
    }
} else if ($sort == 2) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_category_id`='" . $category . "' ORDER BY `price` DESC";
        $status = 1;
    } else if ($category != 0 && $status != 0) {
        $query .= " AND `category_category_id`='" . $category . "' ORDER BY `price` DESC";
    }

    $pid = 0;
    if ($brand != 0 && $model == 0) {
        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `price` DESC";
        }
    }

    if ($brand == 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `model_model_id`='" . $model . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `price` DESC";
        }
    }

    if ($brand != 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                        `model_model_id`='" . $model . "' AND `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `price` DESC";
        }
    }

    if ($condition != 0 && $status == 0) {
        $query .= " WHERE `condition_condition_id`='" . $condition . "' ORDER BY `price` DESC";
        $status = 1;
    } else if ($condition != 0 && $status != 0) {
        $query .= " AND `condition_condition_id`='" . $condition . "' ORDER BY `price` DESC";
    }

    if ($color != 0 && $status == 0) {
        $query .= " WHERE `color_color_id`='" . $color . "' ORDER BY `price` DESC";
        $status = 1;
    } else if ($color != 0 && $status != 0) {
        $query .= " AND `color_color_id`='" . $color . "' ORDER BY `price` DESC";
    }

    if (!empty($from) && empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $from . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $from . "' ORDER BY `price` DESC";
        }
    } else if (empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $to . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $to . "' ORDER BY `price` DESC";
        }
    } else if (!empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `price` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `price` DESC";
        }
    }
} else if ($sort == 3) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `qty` ASC";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_category_id`='" . $category . "' ORDER BY `qty` ASC";
        $status = 1;
    } else if ($category != 0 && $status != 0) {
        $query .= " AND `category_category_id`='" . $category . "' ORDER BY `qty` ASC";
    }

    $pid = 0;
    if ($brand != 0 && $model == 0) {
        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `qty` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `qty` ASC";
        }
    }

    if ($brand == 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `model_model_id`='" . $model . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `qty` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `qty` ASC";
        }
    }

    if ($brand != 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                        `model_model_id`='" . $model . "' AND `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `qty` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `qty` ASC";
        }
    }

    if ($condition != 0 && $status == 0) {
        $query .= " WHERE `condition_condition_id`='" . $condition . "' ORDER BY `qty` ASC";
        $status = 1;
    } else if ($condition != 0 && $status != 0) {
        $query .= " AND `condition_condition_id`='" . $condition . "' ORDER BY `qty` ASC";
    }

    if ($color != 0 && $status == 0) {
        $query .= " WHERE `color_color_id`='" . $color . "' ORDER BY `qty` ASC";
        $status = 1;
    } else if ($color != 0 && $status != 0) {
        $query .= " AND `color_color_id`='" . $color . "' ORDER BY `qty` ASC";
    }

    if (!empty($from) && empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $from . "' ORDER BY `qty` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $from . "' ORDER BY `qty` ASC";
        }
    } else if (empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $to . "' ORDER BY `qty` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $to . "'";
        }
    } else if (!empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `qty` ASC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `qty` ASC";
        }
    }
} else if ($sort == 4) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `qty` DESC";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_category_id`='" . $category . "' ORDER BY `qty` DESC";
        $status = 1;
    } else if ($category != 0 && $status != 0) {
        $query .= " AND `category_category_id`='" . $category . "' ORDER BY `qty` DESC";
    }

    $pid = 0;
    if ($brand != 0 && $model == 0) {
        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `qty` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `qty` DESC";
        }
    }

    if ($brand == 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                                                `model_model_id`='" . $model . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `qty` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `qty` DESC";
        }
    }

    if ($brand != 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
                        `model_model_id`='" . $model . "' AND `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "' ORDER BY `qty` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "' ORDER BY `qty` DESC";
        }
    }

    if ($condition != 0 && $status == 0) {
        $query .= " WHERE `condition_condition_id`='" . $condition . "' ORDER BY `qty` DESC";
        $status = 1;
    } else if ($condition != 0 && $status != 0) {
        $query .= " AND `condition_condition_id`='" . $condition . "' ORDER BY `qty` DESC";
    }

    if ($color != 0 && $status == 0) {
        $query .= " WHERE `color_color_id`='" . $color . "' ORDER BY `qty` DESC";
        $status = 1;
    } else if ($color != 0 && $status != 0) {
        $query .= " AND `color_color_id`='" . $color . "' ORDER BY `qty` DESC";
    }

    if (!empty($from) && empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $from . "' ORDER BY `qty` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $from . "' ORDER BY `qty` DESC";
        }
    } else if (empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $to . "' ORDER BY `qty` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $to . "' ORDER BY `qty` DESC";
        }
    } else if (!empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `qty` DESC";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `qty` DESC";
        }
    }
}

?>

<div class="col-12">
    <div class="row gap-2 d-flex justify-content-center">

        <?php

        if ("0" != $_POST["page"]) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $product_result = Database::search($query);
        $product_count = $product_result->num_rows;

        $results_per_page = 10;
        $number_of_pages = ceil($product_count / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;

        $product_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        $product_num = $product_rs->num_rows;

        for ($z = 0; $z < $product_num; $z++) {
            $product_data = $product_rs->fetch_assoc();
        ?>

            <!-- Card -->
            <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                <?php

                $image_rs = Database::search("SELECT * FROM `product_image` WHERE `product_product_id`='" . $product_data["product_id"] . "'");
                $image_data = $image_rs->fetch_assoc();

                ?>

                <img src="<?php echo $image_data["product_image_path"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                <div class="card-body ms-0 m-0 text-center">
                    <h5 class="card-title fw-bold fs-6"><?php echo $product_data["title"]; ?></h5>

                    <?php

                    if ($product_data["condition_name"] == "Used") {

                    ?>

                        <span class="badge rounded-pill text-bg-warning"><?php echo $product_data["condition_name"]; ?></span><br />

                    <?php

                    } else {

                    ?>

                        <span class="badge rounded-pill text-bg-primary"><?php echo $product_data["condition_name"]; ?></span><br />

                    <?php

                    }

                    ?>

                    <span class="card-text fs-5 fw-bold" style="color: red;">Rs. <?php echo $product_data["price"]; ?>.00</span><br />
                    <?php

                    if ($product_data["qty"] > 0) {

                    ?>

                        <span class="card-text text-success fw-bold">In Stock</span><br />
                        <span class="card-text text-black fw-bold"><?php echo $product_data["qty"]; ?> Items Available</span><br /><br />

                        <?php

                        if (isset($_SESSION["u"])) {

                        ?>

                            <a href='<?php echo "singleproductview.php?id=" . ($product_data["product_id"]); ?>' class="col-12 btn btn-primary fw-bold text-light">Buy Now</a>
                            <button class="col-12 btn btn-secondary mt-2" onclick="addToCart(<?php echo $product_data['product_id']; ?>);">
                                <i class="bi bi-cart-plus-fill text-light fs-5"></i>
                            </button>

                        <?php

                        } else {

                        ?>

                            <a href='#' class="col-12 btn btn-primary fw-bold text-light" onclick="alert('Please login first.'); window.location = 'index.php';">Buy Now</a>
                            <button class="col-12 btn btn-secondary mt-2" onclick="alert('Please login first.'); window.location = 'index.php';">
                                <i class="bi bi-cart-plus-fill text-light fs-5"></i>
                            </button>

                        <?php

                        }
                    } else {

                        ?>

                        <span class="card-text text-secondary fw-bold">Out of Stock</span><br />
                        <span class="card-text text-black fw-bold">No Items Available</span><br /><br />
                        <button class="col-12 btn btn-primary disabled">Buy Now</button>
                        <button class="col-12 btn btn-dark mt-2 disabled">
                            <i class="bi bi-cart-plus-fill text-white fs-5"></i>
                        </button>

                        <?php

                    }

                    if (isset($_SESSION["u"])) {

                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_product_id`='" . $product_data["product_id"] . "' AND 
                                        `user_email`='" . $_SESSION["u"]["email"] . "'");
                        $watchlist_num = $watchlist_rs->num_rows;

                        if ($watchlist_num == 1) {
                        ?>
                            <button class="col-12 btn mt-2 border border-dark" style="background-color: black;" onclick='addToWatchlist(<?php echo $product_data["product_id"]; ?>); '>
                                <i class="bi bi-heart-fill text-danger fs-5" id="heart<?php echo $product_data["product_id"]; ?>"></i>
                            </button>
                        <?php
                        } else {
                        ?>
                            <button class="col-12 btn mt-2 border border-dark" style="background-color: black;" onclick='addToWatchlist(<?php echo $product_data["product_id"]; ?>); '>
                                <i class="bi bi-heart-fill text-light fs-5" id="heart<?php echo $product_data["product_id"]; ?>"></i>
                            </button>
                        <?php

                        }
                    } else {

                        ?>

                        <button class="col-12 btn mt-2 border border-dark" style="background-color: black;" onclick="alert('Please login first.'); window.location = 'index.php';">
                            <i class="bi bi-heart-fill text-light fs-5"></i>
                        </button>

                    <?php

                    }

                    ?>


                </div>
            </div>
            <!-- Card -->

        <?php
        }

        ?>

    </div>
</div>

<!-- Paginition -->
<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="advancedSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php

            for ($y = 1; $y <= $number_of_pages; $y++) {
                if ($y == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="advancedSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="advancedSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="advancedSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- Paginition -->