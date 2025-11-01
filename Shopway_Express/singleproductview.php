<?php

session_start();
require "connection.php";

if (isset($_GET["id"])) {
    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.product_id,product.price,product.qty,product.description,
    product.title,product.datetime_added,product.delivery_fee_matara,product.delivery_fee_other,
    product.category_category_id,product.model_has_brand_id,product.color_color_id,product.status_status_id,
    product.condition_condition_id,product.user_email,model.model_name AS mname,
    brand.brand_name AS bname FROM `product` INNER JOIN `model_has_brand` ON
    model_has_brand.id=product.model_has_brand_id INNER JOIN `brand` ON
    brand.brand_id = model_has_brand.brand_brand_id INNER JOIN `model` ON
    model.model_id=model_has_brand.model_model_id WHERE product.product_id='" . $pid . "'");

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {
        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>

        <html lang="en">

        <head>

            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />

            <title><?php echo $product_data["title"]; ?> | shopWay eXpress</title>
            <link rel="icon" href="resources/logo.png" />

            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
            <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />
            <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.min.css" />

        </head>

        <body>

            <!-- nav bar -->
            <?php include "header.php" ?>
            <!-- nav bar -->

            <!-- content -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="border shadow col-11 col-lg-4 mx-4 mt-3" style="border-radius: 20px;">
                                <div class="row mb-4 text-center">

                                    <?php
                                    $img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_product_id`='" . $pid . "'");
                                    $img_num = $img_rs->num_rows;
                                    $img_list = array();

                                    ?>

                                    <div class="col-12 text-center mt-4 animation" style="height: 330px; border-radius: 20px;">
                                        <div class="mainImg" id="mainImg" style="height: 330px; border-radius: 20px;"></div>
                                    </div>

                                    <?php

                                    if ($img_num != 0) {
                                        for ($x = 0; $x < $img_num; $x++) {
                                            $img_data = $img_rs->fetch_assoc();
                                            $img_list[$x] = $img_data["product_image_path"];
                                    ?>
                                            <div class="col-4 mt-4 text-center" style="height: 150px; border-radius: 20px;">
                                                <img src="<?php echo $img_list[$x]; ?>" id="product_img<?php echo $x; ?>" onclick="changeMainImg(<?php echo $x; ?>);" class="border border-2" style="height: 150px; width: 150px; border-radius: 20px;" />
                                            </div>
                                        <?php
                                        }
                                    } else {

                                        ?>
                                        <div class="col-4 mt-4 text-center" style="height: 150px; border-radius: 20px;">
                                            <img src="resources/camera.svg" class="border border-2" style="height: 150px; border-radius: 20px;" />
                                        </div>
                                        <div class="col-4 mt-4 text-center" style="height: 150px; border-radius: 20px;">
                                            <img src="resources/camera.svg" class="border border-2" style="height: 150px; border-radius: 20px;" />
                                        </div>
                                        <div class="col-4 mt-4 text-center" style="height: 150px; border-radius: 20px;">
                                            <img src="resources/camera.svg" class="border border-2" style="height: 150px; border-radius: 20px;" />
                                        </div>
                                    <?php

                                    }

                                    ?>

                                </div>
                            </div>
                            <div class="col-11 col-lg-7 bg-light mt-3 mx-4 shadow border animation bg-opacity-50" style="border-radius: 20px;">
                                <div class="row">
                                    <div class="col-12 border shadow" style="border-radius: 20px;">
                                        <br />
                                        <span class="fs-3 fw-bold text-dark"><?php echo $product_data["title"]; ?></span>
                                        <br /><br />
                                    </div>
                                    <div class="col-12 border shadow" style="border-radius: 20px;">

                                        <?php

                                        $price = $product_data["price"];
                                        $add = ($price / 100) * 10;
                                        $new_price = $price + $add;
                                        $diff = $new_price - $price;
                                        $percent = ($diff / $price) * 100;

                                        ?>

                                        <br />
                                        <span class="fw-bold" style="font-size: 30px; color: red;">Rs.<?php echo $price; ?>.00</span>
                                        <span class="fw-bold" style="font-size: 30px;">|</span>
                                        <span class="fw-bold text-black"><del style="font-size: 30px;">Rs.<?php echo $new_price; ?>.00</del></span>
                                        <span class="fw-bold" style="font-size: 30px;">|</span>
                                        <span class="fw-bold text-black-50" style="font-size: 30px;">Save Rs. <?php echo $diff; ?> .00 (<?php echo $percent; ?>%)</span>
                                        <br /><br />
                                    </div>
                                    <div class="col-12 border fw-bold shadow" style="border-radius: 20px;">
                                        <br />
                                        <span style="font-family: monospace;">Warrenty: 1 Year Warrenty</span>
                                        <br />
                                        <span style="font-family: monospace;">In Stock: <?php echo $product_data["qty"]; ?> Items</span>
                                        <br />
                                        <span style="font-family: monospace;">Promotions: Min spend Rs. 4,999</span>
                                        <br /><br />
                                    </div>
                                    <div class="col-12 border shadow text-center" style="border-radius: 20px;">
                                        <br />
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg> | ************No Ratings************</span>
                                        <br /><br />
                                    </div>
                                    <div class="col-12 text-center shadow border" style="border-radius: 20px;">
                                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                                            </svg> <b>Stand a chance to get <u>5% discount</u> by using <u>credit card</u></b></i>
                                    </div>
                                    <div class="col-12 shadow border" style="border-radius: 20px;">
                                        <div class="row">
                                            <div class="col-2 mt-1">
                                                <br />
                                                <span class="fw-bold" style="font-size: 18px;">Quantity:</span>
                                            </div>
                                            <div class="col-3">
                                                <br />
                                                <input type="number" value="1" min="1" onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' id="qty_input" class="form-control" />
                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 shadow border" style="border-radius: 20px;">

                                        <?php

                                        if (isset($_SESSION["u"])) {

                                        ?>

                                            <div class="row">
                                                <div class="col-12 col-lg-4 mt-3 mb-3">
                                                    <button class="btn btn-primary fw-bold col-12" onclick="paynow(<?php echo $pid ?>)">Pay Now</button>
                                                </div>
                                                <div class="col-12 col-lg-4 mt-3 mb-3">
                                                    <button class="btn btn-secondary col-12" onclick="addToCart(<?php echo $product_data['product_id']; ?>);">
                                                        <i class="bi bi-cart-plus-fill text-light fs-5"></i>
                                                    </button>
                                                </div>
                                                <div class="col-12 col-lg-4 mt-3 mb-3">

                                                    <?php

                                                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_product_id`='" . $product_data["product_id"] . "' AND 
                                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                    $watchlist_num = $watchlist_rs->num_rows;

                                                    if ($watchlist_num == 1) {

                                                    ?>

                                                        <button class="btn col-12" style="background-color: black;" onclick='addToWatchlist(<?php echo $product_data["product_id"]; ?>); '>
                                                            <i class="bi bi-heart-fill text-danger fs-5" id="heart<?php echo $product_data["product_id"]; ?>"></i>
                                                        </button>

                                                    <?php

                                                    } else {
                                                    ?>

                                                        <button class="btn col-12" style="background-color: black;" onclick='addToWatchlist(<?php echo $product_data["product_id"]; ?>); '>
                                                            <i class="bi bi-heart-fill text-light fs-5" id="heart<?php echo $product_data["product_id"]; ?>"></i>
                                                        </button>

                                                    <?php
                                                    }

                                                    ?>

                                                </div>
                                            </div>

                                        <?php

                                        } else {

                                        ?>

                                            <div class="row">
                                                <div class="col-12 col-lg-4 mt-3 mb-3">
                                                    <button class="btn btn-primary fw-bold col-12" onclick="alert('Please login first.'); window.location = 'index.php';">Pay Now</button>
                                                </div>
                                                <div class="col-12 col-lg-4 mt-3 mb-3">
                                                    <button class="btn btn-secondary col-12" onclick="alert('Please login first.'); window.location = 'index.php';">
                                                        <i class="bi bi-cart-plus-fill text-light fs-5"></i>
                                                    </button>
                                                </div>
                                                <div class="col-12 col-lg-4 mt-3 mb-3">
                                                    <button class="btn col-12" style="background-color: black;" onclick="alert('Please login first.'); window.location = 'index.php';">
                                                        <i class="bi bi-heart-fill text-light fs-5"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        <?php

                                        }

                                        ?>


                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 bg-white">
                                <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                    <div class="col-12">
                                        <span class="fs-3 fw-bold">Related Items</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 bg-white">
                                <div class="row g-2">

                                    <!-- Products -->
                                    <div class="col-12 mb-2">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="row gap-2 d-flex justify-content-center">

                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product`  INNER JOIN `condition` ON `product`.`condition_condition_id` = `condition`.`condition_id` WHERE `status_status_id`='1' AND `model_has_brand_id`='" . $product_data["model_has_brand_id"] . "' LIMIT 5");

                                                    $product_num = $product_rs->num_rows;

                                                    for ($z = 0; $z < $product_num; $z++) {
                                                        $products_data = $product_rs->fetch_assoc();
                                                    ?>

                                                        <!-- Card -->
                                                        <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                                            <?php

                                                            $image_rs = Database::search("SELECT * FROM `product_image` WHERE `product_product_id`='" . $products_data["product_id"] . "'");
                                                            $image_data = $image_rs->fetch_assoc();

                                                            ?>

                                                            <img src="<?php echo $image_data["product_image_path"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                                            <div class="card-body ms-0 m-0 text-center">
                                                                <h5 class="card-title fw-bold fs-6"><?php echo $products_data["title"]; ?></h5>

                                                                <?php

                                                                if ($products_data["condition_name"] == "Used") {

                                                                ?>

                                                                    <span class="badge rounded-pill text-bg-warning"><?php echo $products_data["condition_name"]; ?></span><br />

                                                                <?php

                                                                } else {

                                                                ?>

                                                                    <span class="badge rounded-pill text-bg-primary"><?php echo $products_data["condition_name"]; ?></span><br />

                                                                <?php

                                                                }

                                                                ?>

                                                                <span class="card-text fs-5 fw-bold" style="color: red;">Rs. <?php echo $products_data["price"]; ?>.00</span><br />
                                                                <?php

                                                                if ($products_data["qty"] > 0) {

                                                                ?>

                                                                    <span class="card-text text-success fw-bold">In Stock</span><br />
                                                                    <span class="card-text text-black fw-bold"><?php echo $products_data["qty"]; ?> Items Available</span><br /><br />

                                                                    <?php

                                                                    if (isset($_SESSION["u"])) {

                                                                    ?>

                                                                        <a href='<?php echo "singleproductview.php?id=" . ($products_data["product_id"]); ?>' class="col-12 btn btn-primary fw-bold text-light">Buy Now</a>
                                                                        <button class="col-12 btn btn-secondary mt-2" onclick="addToCart(<?php echo $products_data['product_id']; ?>);">
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

                                                                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_product_id`='" . $products_data["product_id"] . "' AND 
                                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                    $watchlist_num = $watchlist_rs->num_rows;

                                                                    if ($watchlist_num == 1) {
                                                                    ?>
                                                                        <button class="col-12 btn btn-outline-light mt-2 border border-dark" style="background-color: black;" onclick='addToWatchlist(<?php echo $products_data["product_id"]; ?>); '>
                                                                            <i class="bi bi-heart-fill text-danger fs-5" id="heart<?php echo $products_data["product_id"]; ?>"></i>
                                                                        </button>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <button class="col-12 btn mt-2 border border-dark" style="background-color: black;" onclick='addToWatchlist(<?php echo $products_data["product_id"]; ?>); '>
                                                                            <i class="bi bi-heart-fill text-light fs-5" id="heart<?php echo $products_data["product_id"]; ?>"></i>
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

                                        </div>
                                    </div>
                                    <!-- Products -->

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark border-end">
                                            <div class="col-12">
                                                <span class="fs-4 fw-bold">Product Details</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 bg-white">
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label text-black fs-4 fw-bold">Brand : </label>
                                                </div>
                                                <div class="col-9">
                                                    <label class="form-label text-black fs-4"><?php echo $product_data["title"]; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label text-black fs-4 fw-bold">Model : </label>
                                                </div>
                                                <div class="col-9">
                                                    <label class="form-label text-black fs-4"><?php echo $product_data["mname"]; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label text-black fs-4 fw-bold">Description : </label>
                                                </div>
                                                <div class="col-12">
                                                    <textarea cols="60" rows="10" class="form-control" readonly><?php echo $product_data["description"]; ?></textarea>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- content -->

                <!-- footer -->
                <div class="col-12 mt-3">
                    <div class="row">
                        <?php include "footer.php" ?>
                    </div>
                </div>
                <!-- footer -->

                <script src="script.js"></script>
                <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>

<?php

    }
}

?>