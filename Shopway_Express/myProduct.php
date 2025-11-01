<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Product | shopWay eXpress</title>
    <link rel="icon" href="resources/logo.png" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />

    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.min.css" />

</head>

<body>


    <?php

    //<!-- nav bar -->
    include "header.php";
    //<!-- nav bar -->

    require "connection.php";

    if (isset($_SESSION["u"])) {

        $email = $_SESSION["u"]["email"];

    ?>

        <!-- content -->
        <div class="col-12">
            <h1 class="fw-bold text-center animation mt-3">Product Store</h1>
        </div>
        <div class="container-fluid">

            <!-- Sort product -->
            <div class="row">
                <div class="col-12 col-lg-2">
                    <div class="m-2 row border border-1 bg-secondary-subtle border-dark rounded-3">
                        <h3 class="text-center fw-bold mt-3">Sort Product</h3>
                        <hr />
                        <div class="row">
                            <div class="col-10">
                                <input type="text" placeholder="Search..." class="form-control border-dark" style="box-shadow: 0px 1px 10px 0px;" id="s" />
                            </div>
                            <div class="col-1 p-1">
                                <label class="form-label text-black"><i class="bi bi-search fs-5"></i></label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-black">Active Time</label>
                        </div>
                        <div class="col-12">
                            <hr style="width: 80%;" />
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r1" id="n">
                                <label class="form-check-label text-black" for="n">
                                    Newest to oldest
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r1" id="o">
                                <label class="form-check-label text-black" for="o">
                                    Oldest to newest
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black">By quantity</label>
                        </div>
                        <div class="col-12">
                            <hr style="width: 80%;" />
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r2" id="h">
                                <label class="form-check-label text-black" for="h">
                                    High to low
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r2" id="l">
                                <label class="form-check-label text-black" for="l">
                                    Low to high
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black">By condition</label>
                        </div>
                        <div class="col-12">
                            <hr style="width: 80%;" />
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r3" id="b">
                                <label class="form-check-label text-black" for="b">
                                    Brandnew
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r3" id="u">
                                <label class="form-check-label text-black" for="u">
                                    Used
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-3 mb-3">
                            <button class="btn btn-primary fw-bold col-12" onclick="sort(0);">Sort</button>
                        </div>
                        <br /><br />
                        <div class="col-12 col-lg-6 mt-3 mb-3">
                            <button type="reset" class="btn btn-danger fw-bold col-12" onclick="window.location.reload();">Reset</button>
                        </div>
                        <br /><br />
                        <hr />
                        <hr />
                        <div class="col-12">
                            <div class="offset-5 offset-lg-3">
                                <img src="resources/Add_Icon.png" style="height: 100px;" />
                            </div>
                            <br />
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="btn fw-bold text-light col-12" style="background-color: black;">Add Product</button>
                            <br /><br />
                        </div>
                    </div>
                    <br />
                </div>
                <!-- Sort product -->


                <div class="col-10" id="sort">
                    <!-- Product -->
                    <div class="col-12">
                        <div class="row" id="sort">

                            <?php

                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                            $product_num = $product_rs->num_rows;

                            $results_per_page = 8;
                            $number_of_pages = ceil($product_num / $results_per_page);

                            $page_results = ($pageno - 1) * $results_per_page;

                            $p_result = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'
                                LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
                            $p_num = $p_result->num_rows;

                            if ($p_num == 0) {
                            ?>
                                <div class="col-12 mb-5 mt-5 bg-body text-center" style="height: 100px;">
                                    <span class=" fs-1 fw-bolder text-black-50 d-block" style="margin-top:80px ;">No Any Product Yet.</span>
                                </div>
                            <?php
                            }

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
                    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mt-4">
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
                    <!-- pagination -->
                </div>


            </div>
        </div>
        <!-- content -->

        <!-- footer -->
        <div class="container-fluid col-12 mt-2">
            <div class="row">
                <?php include "footer.php" ?>
            </div>
        </div>
        <!-- footer -->

        <!-- add product modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-secondary-subtle" id="head">
                        <h4 class="modal-title fw-bold" id="exampleModalLabel">Add New Product | shopWay eXpress</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- modol body -->
                    <div class="modal-body">
                        <div class="container-fluid col-12 mb-2">

                            <div class="row border p-2 shadow bg-secondary-subtle" id="successfulImageLoader">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label text-black fw-bold" style="font-size: 20px;">
                                                Add a Title to your Product
                                            </label>
                                        </div>
                                        <div class="offset-0 offset-lg-2 col-12 col-lg-8 mb-3">
                                            <input type="text" class="form-control" id="title" style="box-shadow: 0px 1px 10px 0px;" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12 d-none d-lg-block d-sm-none border-end border-2 border-dark">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-lable text-black fw-bold" style="font-size: 20px;">
                                                Select Product Category
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-black text-center" id="category" onchange="loadBrands();" style="box-shadow: 0px 1px 10px 0px;">
                                                <option value="0">Select Category</option>

                                                <?php

                                                $category_rs = Database::search("SELECT * FROM `category`");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {

                                                    $category_data = $category_rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $category_data["category_id"]; ?>"><?Php echo $category_data["category_name"]; ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>
                                        </div>

                                        <br /><br />

                                        <div class="col-12">
                                            <label class="form-lable text-black fw-bold" style="font-size: 20px;">
                                                Select Product Brand
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center" id="brand" onchange="loadModel();" style="box-shadow: 0px 1px 10px 0px;">
                                                <option value="0">Select Brand</option>

                                                <?php

                                                $brand_rs = Database::search("SELECT * FROM `brand`");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($x = 0; $x < $brand_num; $x++) {

                                                    $brand_data = $brand_rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $brand_data["brand_id"]; ?>"><?php echo $brand_data["brand_name"]; ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>
                                        </div>

                                        <br /><br />

                                        <div class="col-12">
                                            <label class="form-lable text-black fw-bold" style="font-size: 20px;">
                                                Select Product Model
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center" id="model" style="box-shadow: 0px 1px 10px 0px;">
                                                <option value="0">Select Model</option>

                                                <?Php

                                                $model_rs = Database::search("SELECT * FROM `model`");
                                                $model_num = $model_rs->num_rows;

                                                for ($x = 0; $x < $model_num; $x++) {

                                                    $model_data = $model_rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $model_data["model_id"]; ?>"><?php echo $model_data["model_name"]; ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>
                                        </div>

                                        <br /><br />

                                        <div class="col-12">
                                            <label class="form-label text-black fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                        </div>

                                        <div class="col-12">

                                            <select class="col-12 form-select text-center" id="colour" style="box-shadow: 0px 1px 10px 0px;">
                                                <option value="0">Select Colour</option>

                                                <?php

                                                $colour_rs = Database::search("SELECT * FROM `color`");
                                                $colour_num = $colour_rs->num_rows;

                                                for ($x = 0; $x < $colour_num; $x++) {

                                                    $colour_data = $colour_rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $colour_data["color_id"]; ?>"><?php echo $colour_data["color_name"]; ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 d-lg-none d-block">

                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label text-black fw-bold" style="font-size: 20px;">Select Product Condition</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check form-check-inline mx-5 text-black">
                                                <input class="form-check-input" type="radio" id="brandNew" name="c" checked />
                                                <label class="form-check-label text-black fw-bold" for="brandNew">Brandnew</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="used" name="c" />
                                                <label class="form-check-label text-black fw-bold" for="used">Used</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label text-black fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="number" class="form-control" value="0" min="0" id="qty" style="box-shadow: 0px 1px 10px 0px;" />
                                        </div>

                                        <br /><br />

                                        <div class="col-12">
                                            <label class="form-label text-black fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text text-black" style="box-shadow: 0px 1px 10px 0px;">Rs.</span>
                                                <input type="text text-black" class="form-control" id="cost" style="box-shadow: 0px 1px 10px 0px;" />
                                                <span class="input-group-text text-black" style="box-shadow: 0px 1px 10px 0px;">.00</span>
                                            </div>
                                        </div>

                                        <br /><br />

                                        <div class="col-12 mt-3">
                                            <label class="form-label text-black fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
                                                <div class="col-2 pm pm2"></div>
                                                <div class="col-2 pm pm3"></div>
                                                <div class="col-2 pm pm4"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label text-black" style="font-size: 20px;">Delivery cost Within Matara</label>
                                        </div>
                                        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
                                            <div class="input-group mb-2 mt-2">
                                                <span class="input-group-text text-black" style="box-shadow: 0px 1px 10px 0px;">Rs.</span>
                                                <input type="text" class="form-control text-black" id="deliveryCWM" style="box-shadow: 0px 1px 10px 0px;" />
                                                <span class="input-group-text text-black" style="box-shadow: 0px 1px 10px 0px;">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label text-black" style="font-size: 20px;">Delivery cost out of Matara</label>
                                        </div>
                                        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
                                            <div class="input-group mb-2 mt-2">
                                                <span class="input-group-text text-black" style="box-shadow: 0px 1px 10px 0px;">Rs.</span>
                                                <input type="text" class="form-control text-black" id="diliveryCOM" style="box-shadow: 0px 1px 10px 0px;" />
                                                <span class="input-group-text text-black" style="box-shadow: 0px 1px 10px 0px;">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12 mt-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label text-black fw-bold" style="font-size: 20px;">Product Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="10" class="form-control" id="description" style="box-shadow: 0px 1px 10px 0px;"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <label class="form-label text-black fw-bold" style="font-size: 20px;">Add Product Images</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4 border d-flex justify-content-center border-secondary rounded" style="height: 180px;">
                                                    <img src="resources/Add_Icon.png" class="img-fluid" id="i0" />
                                                </div>
                                                <div class="col-4 border border-secondary d-flex justify-content-center rounded" style="height: 180px;">
                                                    <img src="resources/Add_Icon.png" class="img-fluid" id="i1" />
                                                </div>
                                                <div class="col-4 border border-secondary d-flex justify-content-center rounded" style="height: 180px;">
                                                    <img src="resources/Add_Icon.png" class="img-fluid" id="i2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 mt-4">
                                            <input type="file" class="d-none" id="imageuploader" multiple />
                                            <label for="imageuploader" class="col-12 btn btn-secondary" onclick="changeProductImage();">Upload Images</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- modal body -->

                    <!-- modal footer -->
                    <div class="modal-footer bg-secondary-subtle" id="foot">
                        <button type="button" class="btn btn-success" onclick="addProduct();">Add This Product</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancle</button>
                    </div>
                    <!-- modal footer -->

                </div>
            </div>
        </div>
        <!-- add product modal -->

    <?php

    } else {

    ?>

        <script>
            alert("You have to log in first");
            window.location = "home.php";
        </script>

    <?php

    }

    ?>

    <script src="script.js"></script>
</body>

</html>