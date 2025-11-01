<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Home | shopWay eXpress</title>
    <link rel="icon" href="resources/logo.png" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />
    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.min.css" />

</head>

<body class="bg-secondary-subtle">

    <div class="container-fluid">
        <div class="row">

            <!-- nav bar -->
            <?php include "header.php" ?>
            <!-- nav bar -->

            <div class="col-12">
                <div class="row mt-3 mb-3">

                    <div class="offset-lg-2 col-12 col-lg-6">

                        <div class="input-group mt-3 mb-3">

                            <select class="form-select" style="max-width: 250px;" id="basic_search_select">
                                <option value="0">All Categories</option>

                                <?php

                                require "connection.php";

                                $categories_rs = Database::search("SELECT * FROM `category`");
                                $categories_num = $categories_rs->num_rows;

                                for ($x = 0; $x < $categories_num; $x++) {
                                    $categories_data = $categories_rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo $categories_data["category_id"]; ?>"><?Php echo $categories_data["category_name"]; ?></option>

                                <?php
                                }

                                ?>
                            </select>

                            <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt" />

                        </div>

                    </div>

                    <div class="col-12 col-lg-1 d-grid">
                        <button class="btn btn-primary mt-3 mb-3" onclick="basicSearch(0);"><i class="bi bi-search"></i> Search</button>
                    </div>

                    <div class="col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start">
                        <a href="advancedSearch.php" class="text-decoration-none link-dark fw-bold">Advanced</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="col-12" id="basicSearchResult">
        <!-- Carousel -->
        <div id="carouselExampleCaptions" class="carousel slide d-none d-lg-block mb-3" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="resources/carousel_images/c1.jpg" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="100%" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
                <div class="carousel-item">
                    <img src="resources/carousel_images/c2.jpg" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="100%" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
                <div class="carousel-item">
                    <img src="resources/carousel_images/c3.jpg" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel -->

        <div class="container-fluid">
            <?php

            $category_rs = Database::search("SELECT * FROM `category`");
            $category_num = $category_rs->num_rows;

            for ($y = 0; $y < $category_num; $y++) {
                $category_data = $category_rs->fetch_assoc();

            ?>

                <!-- Category Name -->
                <div class="col-12 m-2 d-none">
                    <a href="#" class="text-decoration-none text-dark fs-3 fw-bold"><?php echo $category_data["category_name"]; ?></a>
                </div>
                <!-- Category Name -->

            <?php

            }

            ?>

            <!-- Products -->
            <div class="col-12 mb-2">
                <div class="row">

                    <div class="col-12">
                        <div class="row gap-2 d-flex justify-content-center">

                            <?php

                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }

                            $product_result = Database::search("SELECT * FROM `product`");
                            $product_count = $product_result->num_rows;

                            $results_per_page = 10;
                            $number_of_pages = ceil($product_count / $results_per_page);

                            $page_results = ($pageno - 1) * $results_per_page;

                            $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `condition` ON `product`.`condition_condition_id` = `condition`.`condition_id`
                    WHERE `status_status_id`='1' ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

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
                                                <button class="col-12 btn btn-outline-light mt-2 border border-dark" style="background-color: black;" onclick='addToWatchlist(<?php echo $product_data["product_id"]; ?>); '>
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
                    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mt-3 mb-2">
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

                                for ($y = 1; $y <= $number_of_pages; $y++) {
                                    if ($y == $pageno) {
                                ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="<?php echo "?page=" . ($y); ?>"><?php echo $y; ?></a>
                                        </li>
                                    <?Php
                                    } else {
                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo "?page=" . ($y); ?>"><?php echo $y; ?></a>
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
                    <!-- Paginition -->

                </div>
            </div>
            <!-- Products -->

        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid col-12">
        <div class="row">
            <?php include "footer.php" ?>
        </div>
    </div>
    <!-- footer -->

    <script src="script.js"></script>
</body>

</html>