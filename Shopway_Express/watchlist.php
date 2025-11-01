<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
?>

    <!DOCTYPE html>
    <html>

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

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php include "header.php";


                ?>

                <div class="col-12 bg-secondary-subtle">
                    <h1 class="fw-bold text-center animation mt-4">Watchlist <i class="bi bi-heart-fill"></i></h1>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 rounded mb-2">
                            <div class="row d-flex justify-content-center">

                                <div class="col-12">
                                    <hr />
                                </div>

                                <?php
                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE
                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 0) {
                                ?>
                                    <!-- empty view -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 text-center mt-5 mb-5" style="height: 20vh;">
                                                <br />
                                                <label class="form-label fs-1 fw-bold">
                                                    You have no items in your watchlist yet.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- empty view -->
                                    <?php
                                } else {

                                    for ($x = 0; $x < $watchlist_num; $x++) {
                                        $watchlist_data = $watchlist_rs->fetch_assoc();
                                    ?>
                                        <!-- have products -->
                                        <div class="col-12 col-lg-9">
                                            <div class="row">

                                                <?php

                                                $products_rs = Database::search("SELECT * FROM `product` INNER JOIN `watchlist` ON
                                                                `watchlist`.`product_product_id` = `product`.`product_id` WHERE `watchlist`.`watchlist_id`='" . $watchlist_data["watchlist_id"] . "'");
                                                $products_data = $products_rs->fetch_assoc();

                                                $colour_rs = Database::search("SELECT * FROM `color` INNER JOIN `product` ON
                                                        `color_id`=`color_color_id` WHERE `product_id`='" . $products_data["product_id"] . "'");
                                                $colour_data = $colour_rs->fetch_assoc();

                                                $condition_rs = Database::search("SELECT * FROM `condition` INNER JOIN `product` ON
                                                        `condition_id`=`condition_condition_id` WHERE `product_id`='" . $products_data["product_id"] . "'");
                                                $condition_data = $condition_rs->fetch_assoc();

                                                $seller_rs = Database::search("SELECT * FROM `user` WHERE
                                                                `email`='" . $products_data["user_email"] . "'");
                                                $seller_data = $seller_rs->fetch_assoc();
                                                $seller = $seller_data["fname"] . " " . $seller_data["lname"];

                                                $image_rs = Database::search("SELECT * FROM `product_image` WHERE `product_product_id`='" . $products_data["product_id"] . "'");
                                                            $image_data = $image_rs->fetch_assoc();

                                                ?>

                                                <div class="card bg-secondary-subtle mb-3 mx-0 mx-lg-2 col-12">
                                                    <div class="row g-0">

                                                        <div class="col-md-4">
                                                            <br/>
                                                            <img src="<?php echo $image_data["product_image_path"]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">

                                                                <br />
                                                                <h5 class="card-title fs-2 fw-bold"><?php echo $products_data["title"]; ?></h5>

                                                                <span class="fs-5 fw-bold text-black-50">Colour : <?php echo $colour_data["color_name"]; ?></span>

                                                                &nbsp;&nbsp; | &nbsp;&nbsp;

                                                                <span class="fs-5 fw-bold text-black-50">Condition : <?php echo $condition_data["condition_name"]; ?></span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 fw-bold text-black">Rs. <?php echo $products_data["price"]; ?> .00</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Quantity :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 fw-bold text-black"><?php echo $products_data["qty"]; ?> Items available</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Seller :</span>
                                                                <span class="fs-5 fw-bold text-black"><?php echo $seller; ?></span>
                                                                <br /><br />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-5">
                                                            <div class="card-body d-grid">
                                                                <a href="#" class="btn btn-secondary mb-2" onclick="addToCart(<?php echo $products_data['product_id']; ?>);"><i class="bi bi-cart-plus-fill text-light fs-5"></i></a>
                                                                <a href="#" onclick="removeFromeWatchlist(<?php echo $watchlist_data['watchlist_id']; ?>);" class="btn btn-danger"><i class="bi bi-trash3-fill fs-5"></i></a>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- have products -->
                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php include "footer.php"; ?>

            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
}else{
    ?>
    <script>
        window.location = "home.php";
    </script>
    <?php
}

?>