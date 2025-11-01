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

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- nav bar -->
            <?php include "header.php" ?>
            <!-- nav bar -->

            <div class="col-12 bg-secondary-subtle">
                <h1 class="fw-bold text-center animation mt-3">Update Product</h1>
            </div>

        </div>
    </div>

    <?php

    require "connection.php";

    if (isset($_SESSION["u"])) {
        if (isset($_SESSION["p"])) {

            $product = $_SESSION["p"];

    ?>

            <!-- Update product body -->
            <div class="container-fluid col-10 mt-2 mb-4">
                <div class="row border p-2 shadow bg-secondary-subtle">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label text-black fw-bold" style="font-size: 20px;">
                                    Add a Title to your Product
                                </label>
                            </div>
                            <div class="offset-0 offset-lg-2 col-12 col-lg-8 mb-3">
                                <input type="text" class="form-control" value="<?php echo $product["title"]; ?>" id="updateTitle" style="box-shadow: 0px 1px 10px 0px;" />
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

                                <?php

                                $category_rs = Database::search("SELECT * FROM `category` WHERE `category_id`='" . $product["category_category_id"] . "'");
                                $category_data = $category_rs->fetch_assoc();

                                ?>

                                <select class="form-select text-center" style="box-shadow: 0px 1px 10px 0px;" disabled>
                                    <option><?php echo $category_data["category_name"]; ?></option>
                                </select>

                            </div>

                            <br /><br />

                            <div class="col-12">
                                <label class="form-lable text-black fw-bold" style="font-size: 20px;">
                                    Select Product Brand
                                </label>
                            </div>

                            <div class="col-12">

                                <?php

                                $brand_rs = Database::search("SELECT * FROM `brand` WHERE `brand_id` IN 
                                                                                (SELECT `brand_brand_id` FROM `model_has_brand` WHERE 
                                                                                `id`='" . $product["model_has_brand_id"] . "')");
                                $brand_data = $brand_rs->fetch_assoc();

                                ?>

                                <select class="form-select text-center" id="brand" style="box-shadow: 0px 1px 10px 0px;" disabled>
                                    <option><?php echo $brand_data["brand_name"]; ?></option>
                                </select>

                            </div>

                            <br /><br />

                            <div class="col-12">
                                <label class="form-lable text-black fw-bold" style="font-size: 20px;">
                                    Select Product Model
                                </label>
                            </div>

                            <div class="col-12">

                                <?Php

                                $model_rs = Database::search("SELECT * FROM `model` WHERE `model_id` IN 
                                                                                (SELECT `model_model_id` FROM `model_has_brand` WHERE 
                                                                                `id`='" . $product["model_has_brand_id"] . "')");
                                $model_data = $model_rs->fetch_assoc();

                                ?>

                                <select class="form-select text-center" id="model" style="box-shadow: 0px 1px 10px 0px;" disabled>
                                    <option><?php echo $model_data["model_name"]; ?></option>
                                </select>

                            </div>

                            <br /><br />

                            <div class="col-12">
                                <label class="form-label text-black fw-bold" style="font-size: 20px;">Select Product Colour</label>
                            </div>

                            <div class="col-12">

                                <?php

                                $color_rs = Database::search("SELECT * FROM `color` WHERE
                                                                                        `color_id`='" . $product["color_color_id"] . "'");
                                $color_data = $color_rs->fetch_assoc();

                                ?>

                                <select class="col-12 form-select text-center" style="box-shadow: 0px 1px 10px 0px;" disabled>
                                    <option><?php echo $color_data["color_name"]; ?></option>

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

                            <?php

                            if ($product["condition_condition_id"] == 1) {

                            ?>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mx-5 text-black">
                                        <input class="form-check-input" type="radio" id="b" name="c" checked disabled />
                                        <label class="form-check-label text-black fw-bold" for="b">Brandnew</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="u" name="c" disabled />
                                        <label class="form-check-label text-black fw-bold" for="u">Used</label>
                                    </div>
                                </div>
                            <?php

                            } else if ($product["condition_condition_id"] == 2) {

                            ?>

                                <div class="col-12">
                                    <div class="form-check form-check-inline mx-5 text-black">
                                        <input class="form-check-input" type="radio" id="b" name="c" disabled />
                                        <label class="form-check-label text-black fw-bold" for="b">Brandnew</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="u" name="c" checked disabled />
                                        <label class="form-check-label text-black fw-bold" for="u">Used</label>
                                    </div>
                                </div>

                            <?php

                            }

                            ?>

                            <div class="col-12">
                                <label class="form-label text-black fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                            </div>
                            <div class="col-12">
                                <input type="number" class="form-control" value="<?php echo $product["qty"]; ?>" min="0" id="updateQty" style="box-shadow: 0px 1px 10px 0px;" />
                            </div>

                            <br /><br />

                            <div class="col-12">
                                <label class="form-label text-black fw-bold" style="font-size: 20px;">Cost Per Item</label>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-black" style="box-shadow: 0px 1px 10px 0px;">Rs.</span>
                                    <input type="text text-black" class="form-control" disabled value="<?php echo $product["price"]; ?>" id="cost" style="box-shadow: 0px 1px 10px 0px;" />
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
                                    <input type="text" class="form-control text-black" value="<?php echo $product["delivery_fee_matara"]; ?>" id="dCostM" style="box-shadow: 0px 1px 10px 0px;" />
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
                                    <input type="text" class="form-control text-black" value="<?php echo $product["delivery_fee_other"]; ?>" id="dOCost" style="box-shadow: 0px 1px 10px 0px;" />
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
                                <textarea cols="30" rows="10" class="form-control" id="pDescription" style="box-shadow: 0px 1px 10px 0px;"><?php echo $product["description"]; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label class="form-label text-black fw-bold" style="font-size: 20px;">Add Product Images</label>
                            </div>
                            <div class="col-12">

                                <?php
                                $img = array();
                                $img[0] = "resources/Add_Icon.png";
                                $img[1] = "resources/Add_Icon.png";
                                $img[2] = "resources/Add_Icon.png";
                                $img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_product_id`='" . $product["product_id"] . "'");
                                $img_num = $img_rs->num_rows;
                                for ($x = 0; $x < $img_num; $x++) {
                                    $img_data = $img_rs->fetch_assoc();
                                    $img[$x] = $img_data["product_image_path"];
                                }
                                ?>

                                <div class="row">
                                    <div class="col-4 border border-secondary d-flex justify-content-center rounded" style="height: 180px;">
                                        <img src="<?php echo $img[0]; ?>" class="img-fluid" id="i0" />
                                    </div>
                                    <div class="col-4 border border-secondary d-flex justify-content-center rounded" style="height: 180px;">
                                        <img src="<?php echo $img[1]; ?>" class="img-fluid" id="i1" />
                                    </div>
                                    <div class="col-4 border border-secondary d-flex justify-content-center rounded" style="height: 180px;">
                                        <img src="<?php echo $img[2]; ?>" class="img-fluid" id="i2" />
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
            <!-- Update product body -->

            <!-- Update product boady footer -->
            <div class="container-fluid bg-secondary-subtle">
                <div class="offset-1 col-10">
                    <div class="row">
                        <div class="col-6 d-grid">
                            <br />
                            <button type="button" class="btn btn-success" onclick="update();">Update This Product</button>
                            <br />
                        </div>
                        <div class="col-6 d-grid">
                            <br />
                            <button type="button" class="btn btn-danger" onclick="window.location = 'myProduct.php'">Cancle</button>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Update product boady footer -->

            <!-- footer -->
            <div class="container-fluid col-12">
                <div class="row">
                    <?php include "footer.php" ?>
                </div>
            </div>
            <!-- footer -->

            <?php

            //}

            ?>

            <script src="script.js"></script>

</body>

</html>

<?php

        } else {

?>

    <script>
        alert("Please select a product.");
        window.location = "myProduct.php";
    </script>

<?php

        }
    } else {

?>

<script>
    alert("You have to log in first");
    window.location = "home.php";
</script>

<?php

    }

?>