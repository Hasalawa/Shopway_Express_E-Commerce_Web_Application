<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"]["email"];

    $total = 0;
    $subtotal = 0;
    $shipping = 0;

?>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Cart | shopWay eXpress</title>
        <link rel="icon" href="resources/logo.png" />

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />
        <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.min.css" />

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php
                include "header.php";
                ?>

                <div class="col-12 bg-secondary-subtle">
                    <h1 class="fw-bold text-center animation mt-4">My Cart <i class="bi bi-cart4 fs-1"></i></h1>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">

                        <div class="col-12">
                            <hr />
                        </div>

                        <?php
                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
                        $cart_num = $cart_rs->num_rows;

                        if ($cart_num == 0) {
                        ?>
                            <!-- Empty View -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 text-center mt-5 mb-5" style="height: 20vh;">
                                        <br />
                                        <label class="form-label fs-1 fw-bold">
                                            You have no items in your Cart yet.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Empty View -->
                        <?php
                        } else {
                        ?>
                            <!-- products -->

                            <div class="col-12 col-lg-9">
                                <div class="row">

                                    <?php

                                    for ($x = 0; $x < $cart_num; $x++) {
                                        $cart_data = $cart_rs->fetch_assoc();
                                        $id = $cart_data["product_product_id"];

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE
                                                                    `product_id`='" . $cart_data["product_product_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();

                                        $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                        $address_rs = Database::search("SELECT `district`.`district_id` AS `did` FROM
                                    `user_has_address` INNER JOIN `city` ON
                                    `user_has_address`.`city_city_id`=`city`.`city_id` INNER JOIN `district` ON
                                    `city`.`district_district_id`=`district`.`district_id` WHERE `user_email`='" . $user . "'");
                                        $address_data = $address_rs->fetch_assoc();

                                        $ship = 0;

                                        if ($address_data["did"] == 22) {
                                            $ship = $product_data["delivery_fee_matara"];
                                            $shipping = $shipping + $ship;
                                        } else {
                                            $ship = $product_data["delivery_fee_other"];
                                            $shipping = $shipping + $ship;
                                        }

                                        $seller_rs = Database::search("SELECT * FROM `user` WHERE
                                                                    `email`='" . $product_data["user_email"] . "'");
                                        $seller_data = $seller_rs->fetch_assoc();
                                        $seller = $seller_data["fname"] . " " . $seller_data["lname"];
                                    ?>

                                        <div class="card mb-3 mx-0 col-12 bg-secondary-subtle">
                                            <div class="row g-0">
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="fw-bold text-black">Seller :&nbsp;<?php echo $seller; ?></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <!-- popup -->
                                                <div class="col-md-4">

                                                    <?php

                                                    $image_rs = Database::search("SELECT * FROM `product_image` WHERE `product_product_id`='" . $product_data["product_id"] . "'");
                                                    $image_data = $image_rs->fetch_assoc();

                                                    ?>

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo $product_data["description"]; ?>" title="Product Description">
                                                        <img src="<?php echo $image_data["product_image_path"]; ?>" class="img-fluid rounded-start" style="max-width: 200px;">
                                                    </span>

                                                </div>
                                                <!-- popup -->
                                                <div class="col-md-5">
                                                    <div class="card-body">

                                                        <h3 class="card-title"><?php echo $product_data["title"] ?></h3>

                                                        <?php

                                                        $colour_rs = Database::search("SELECT * FROM `color` INNER JOIN `product` ON
                                                        `color_id`=`color_color_id` WHERE `product_id`='" . $cart_data["product_product_id"] . "'");
                                                        $colour_data = $colour_rs->fetch_assoc();

                                                        $condition_rs = Database::search("SELECT * FROM `condition` INNER JOIN `product` ON
                                                        `condition_id`=`condition_condition_id` WHERE `product_id`='" . $cart_data["product_product_id"] . "'");
                                                        $condition_data = $condition_rs->fetch_assoc();

                                                        ?>

                                                        <span class="fw-bold text-black-50">Colour : <?php echo $colour_data["color_name"]; ?></span> &nbsp; |

                                                        &nbsp; <span class="fw-bold text-black-50">Condition : <?php echo $condition_data["condition_name"]; ?></span>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Quantity :</span>
                                                        <br /><br />
                                                        <div class="input-group mb-3" style="width: 150px;">
                                                            <span class="input-group-text" onclick='decrementCartQty("<?php echo $id ?>");'><i class="bi bi-caret-left-fill fs-5"></i></span>
                                                            <input type="text" class="form-control fs-5 fw-bold" onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' pattern="[0-9]" id="qty<?php echo $id ?>" value="<?php echo $cart_data["qty"]; ?>" aria-label="Amount (to the nearest dollar)">
                                                            <span class="input-group-text" onclick='incrementCartQty("<?php echo $id ?>");'><i class="bi bi-caret-right-fill fs-5"></i></span>
                                                        </div>
                                                        <span class="fw-bold text-black-50 fs-5">Delivery Fee :</span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs.<?php echo $ship; ?>.00</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body d-grid">

                                                        <?php

                                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_product_id`='" . $product_data["product_id"] . "' AND 
                                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                        $watchlist_num = $watchlist_rs->num_rows;

                                                        if ($watchlist_num == 1) {

                                                        ?>
                                                            <a class="btn mb-2" style="background-color: black;" onclick='addToWatchlist(<?php echo $product_data["product_id"]; ?>); '><i class="bi bi-heart-fill text-danger fs-5" id="heart<?php echo $product_data["product_id"]; ?>"></i></a>
                                                        <?php

                                                        } else {

                                                        ?>
                                                            <a class="btn mb-2" style="background-color: black;" onclick='addToWatchlist(<?php echo $product_data["product_id"]; ?>); '><i class="bi bi-heart-fill text-white fs-5" id="heart<?php echo $product_data["product_id"]; ?>"></i></a>
                                                        <?php

                                                        }

                                                        ?>

                                                        <a class="btn btn-danger mb-2" onclick="removeFromCart(<?php echo $cart_data['cart_id']; ?>);"><i class="bi bi-trash3-fill fs-5"></i></a>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Rs.<?php echo ($product_data["price"] * $cart_data["qty"] + $ship); ?>.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>

                                </div>
                            </div>

                            <!-- products -->

                            <!-- summary -->
                            <div class="col-12 col-lg-3">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label text-black fs-3 fw-bold">Order Summary</label>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>

                                    <div class="col-6 mb-3">
                                        <span class="fs-6 fw-bold">items (<?php echo $cart_num; ?>)</span>
                                    </div>

                                    <div class="col-6 text-end mb-3">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                    </div>

                                    <div class="col-6">
                                        <span class="fs-6 fw-bold">Shipping</span>
                                    </div>

                                    <div class="col-6 text-end">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $shipping; ?> .00</span>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <hr />
                                    </div>

                                    <div class="col-6 mt-2">
                                        <span class="fs-4 fw-bold">Total</span>
                                    </div>

                                    <div class="col-6 mt-2 text-end">
                                        <span class="fs-4 fw-bold">Rs. <?php echo $total + $shipping; ?> .00</span>
                                    </div>

                                    <div class="col-12 mt-3 mb-3 d-grid">
                                        <button class="btn btn-primary fs-5 fw-bold" onclick="checkOut();">PROCEED CHECKOUT</button>
                                    </div>

                                </div>
                            </div>
                            <!-- summary -->
                        <?php
                        }
                        ?>




                    </div>
                </div>

                <?php include "footer.php"; ?>

            </div>
        </div>

        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

        <!-- <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script> -->
    </body>

    </html>
<?php

} else {
?>
    <script>
        window.location = "home.php";
    </script>
<?php
}

?>