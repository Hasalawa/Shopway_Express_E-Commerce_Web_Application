<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

?>

    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Manage Product | shopWay eXpress</title>
        <link rel="icon" href="resources/logo.png" />

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />
        <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.min.css" />

    </head>

    <body class="bg-secondary-subtle">

        <div class="container-fluid">
            <div class="row">

                <!-- Nav Bar -->
                <?php include "adminNavbar.php"; ?>
                <!-- Nav Bar -->

                <div class="col-12 bg-light text-center">
                    <label class="form-label text-black fw-bold fs-1">Manage All Products</label>
                </div>

                <div class="col-12">
                    <div class="row bg-secondary">
                        <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                            <div class="row">
                                <div class="col-9">
                                    <br/>
                                    <input type="text" class="form-control" id="product" />
                                </div>
                                <div class="col-3 d-grid">
                                    <br/>
                                    <button class="btn btn-primary fw-bold" onclick="productSearch();">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-primary py-2 text-center">
                            <span class="fw-bold text-white">#</span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-primary py-2 text-center">
                            <span class="text-white fw-bold">Product Image</span>
                        </div>
                        <div class="col-4 col-lg-2 bg-primary py-2 text-center">
                            <span class="fw-bold text-white">Title</span>
                        </div>
                        <div class="col-4 col-lg-2 d-lg-block bg-primary py-2 text-center">
                            <span class="fw-bold text-white">Price</span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-primary py-2 text-center">
                            <span class="fw-bold text-white">Quantity</span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-primary py-2 text-center">
                            <span class="fw-bold text-white">Registered Date</span>
                        </div>
                        <div class="col-2 d-none d-lg-block col-lg-1 bg-primary py-2 text-center">
                        <span class="fw-bold text-white">Status</span>
                        </div>
                    </div>
                </div>
                <div class="col-12" id="productSearch">
                    <div class="row">


                        <?php

                        $query = "SELECT * FROM `product`";
                        $pageno;

                        if (isset($_GET["page"])) {
                            $pageno = $_GET["page"];
                        } else {
                            $pageno = 1;
                        }

                        $product_rs = Database::search($query);
                        $product_num = $product_rs->num_rows;

                        $results_per_page = 20;
                        $number_of_pages = ceil($product_num / $results_per_page);

                        $page_results = ($pageno - 1) * $results_per_page;
                        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                        $selected_num = $selected_rs->num_rows;

                        for ($x = 0; $x < $selected_num; $x++) {
                            $selected_data = $selected_rs->fetch_assoc();

                        ?>

                            <div class="col-12 mt-3 mb-3">
                                <div class="row">
                                    <div class="col-2 col-lg-1 bg-secondary py-2 text-center">
                                        <span class="fw-bold text-white"><?php echo $selected_data["product_id"]; ?></span>
                                    </div>

                                    <div class="col-2 d-none d-lg-block bg-secondary py-2">
                                        <?php
                                        $image_rs = Database::search("SELECT * FROM `product_image`  WHERE `product_product_id`='" . $selected_data["product_id"] . "'");
                                        $image_num = $image_rs->num_rows;
                                        if ($image_num == 0) {
                                        ?>
                                            <img src="resources/camera.svg" style="height: 40px;margin-left: 80px;" />
                                        <?php

                                        } else {
                                            $image_data = $image_rs->fetch_assoc();
                                        ?>
                                            <img src="<?php echo $image_data["product_image_path"]; ?>" style="height: 40px;margin-left: 80px;" />
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="col-4 col-lg-2 bg-secondary text-center py-2">
                                        <span class="fw-bold text-white"><?php echo $selected_data["title"]; ?></span>
                                    </div>
                                    <div class="col-4 col-lg-2 d-lg-block text-center bg-secondary py-2">
                                        <span class="fw-bold text-white">Rs.<?php echo $selected_data["price"]; ?>.00</span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block text-center bg-secondary py-2">
                                        <span class="fw-bold text-white"><?php echo $selected_data["qty"]; ?></span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block text-center bg-secondary py-2">
                                        <span class="fw-bold text-white"><?php echo $selected_data["datetime_added"]; ?></span>
                                    </div>
                                    <div class="col-2 col-lg-1 bg-secondary text-center py-2 d-grid">
                                        <?php

                                        if ($selected_data["status_status_id"] == 1) {
                                        ?>
                                            <button id="pb<?php echo $selected_data['product_id']; ?>" class="btn btn-danger fw-bold" onclick="blockProduct('<?php echo $selected_data['product_id']; ?>');">Block</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button id="pb<?php echo $selected_data['product_id']; ?>" class="btn btn-success fw-bold" onclick="blockProduct('<?php echo $selected_data['product_id']; ?>');">Unblock</button>
                                        <?php

                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>

                        <?php

                        }

                        ?>

                        <!--  -->
                        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php

                                    for ($x = 1; $x <= $number_of_pages; $x++) {
                                        if ($x == $pageno) {
                                    ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                            </li>
                                    <?php
                                        }
                                    }

                                    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!--  -->

                    </div>
                </div>

                <?php include "footer.php"; ?>

            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php

}

?>