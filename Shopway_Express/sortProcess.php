<?php

session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];

$search = $_POST["s"];
$time = $_POST["t"];
$qty = $_POST["q"];
$condition = $_POST["c"];

$query = "SELECT * FROM `product` WHERE `user_email`='" . $email . "' ";

if (!empty($search)) {
    $query .= " AND `title` LIKE '%" . $search . "%'";
}

if ($condition != "0") {
    $query .= " AND `condition_condition_id`='" . $condition . "'";
}

if ($time != "0") {
    if ($time == "1") {
        $query .= " ORDER BY `datetime_added` DESC";
    } else if ($time == "2") {
        $query .= " ORDER BY `datetime_added` ASC";
    }
}

if ($time != "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " , `qty` DESC";
    } else if ($qty == "2") {
        $query .= " , `qty` ASC";
    }
}  else if ($time == "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " ORDER BY `qty` DESC";
    } else if ($qty == "2") {
        $query .= " ORDER BY `qty` ASC";
    }
}

?>

<!-- Product -->
<div class="col-12">
    <div class="row" id="sort">

        <?php

        if ("0" != $_POST["page"]) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        $results_per_page = 8;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;

        $p_result = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
        $p_num = $p_result->num_rows;

        for ($x = 0; $x < $p_num; $x++) {
            $p_data = $p_result->fetch_assoc();
        ?>

            <!-- Card -->
            <div class="col-12 col-lg-3 offset-1 offset-lg-0 shadow border bg-secondary-subtle bg-secondary-subtle rounded-3 mt-2 text-center">
                <br />

                <?php

                $product_image_result = Database::search("SELECT * FROM `product_image` WHERE
                                `product_product_id` = '" . $p_data["product_id"] . "'");

                $product_image_data = $product_image_result->fetch_assoc();

                ?>

                <div class="row d-flex justify-content-center">

                    <div class="col-12 mb-2" style="height: 170px; border-radius: 15px;">

                        <img src="<?php echo $product_image_data["product_image_path"]; ?>" style="height: 170px; border-radius: 15px;" />

                    </div>

                </div>

                <span class="fw-bold"><?php echo $p_data["title"]; ?></span>
                <br />
                <span class="fs-5 fw-bold" style="color: red;">Rs. <?php echo $p_data["price"]; ?>.00</span>
                <br>
                <span class="text-secondary fw-bold"><?php echo $p_data["qty"]; ?> Items Left</span>
                <br>
                <div class="form-check form-switch mt-2 mb-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="<?php echo $p_data["product_id"]; ?>" onchange="changeStatus(<?php echo $p_data['product_id']; ?>);" <?php if ($p_data["status_status_id"] == 2) { ?> checked <?php } ?> />
                    <label class="form-check-label fw-bold text-info" for="<?php echo $p_data["product_id"]; ?>">
                        <?php if ($p_data["status_status_id"] == 2) { ?>
                            <span class="text-light badge rounded-pill text-bg-success">Activate Product</span>
                        <?php } else { ?>

                            <span class="text-light badge rounded-pill text-bg-warning">Deactivate Product</span>

                        <?php } ?>

                    </label>
                </div>
                <div class="col-12 mt-3">
                    <button class="col-6 btn btn-primary fw-bold" onclick="updateSendId(<?php echo $p_data['product_id']; ?>);">Update</button>
                </div>
                <br />
            </div>
            <!-- Card -->

        <?php
        }

        ?>

    </div>
</div>
<!-- Product -->

<!-- pagination -->
<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mt-4 mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="sort(<?php echo ($pageno - 1) ?>);" <?php
                                                                                    } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php

            for ($y = 1; $y <= $number_of_pages; $y++) {
                if ($y == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="sort(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="sort(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="sort(<?php echo ($pageno + 1) ?>);" <?php
                                                                                    } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- pagination -->