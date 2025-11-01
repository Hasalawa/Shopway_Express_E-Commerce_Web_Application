<?php

session_start();
require "connection.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Advanced Search | shopWay eXpress</title>
    <link rel="icon" href="resources/logo.png" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />
    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.min.css" />

</head>

<body class="bg-secondary-subtle">

    <!-- nav bar -->
    <?php include "header.php" ?>
    <!-- nav bar -->

    <div class="container-fluid">
        <div class="row">

            <!-- Search content -->
            <div class="offset-1 col-10 col-lg-12 offset-lg-0 mt-3 bg-light shadow rounded mb-3">
                <div class="row">

                    <div class="col-12 mt-3 text-center">
                        <h1 class="fw-bold"><i class="bi bi-search"></i> Advanced Search</h1>
                    </div>

                    <div class="offset-0 col-12 offset-lg-2 col-lg-8">
                        <hr class="text-success" />
                    </div>

                    <div class="offset-lg-2 col-12 col-lg-8">
                        <div class="row">

                            <div class="offset-lg-1 col-12 col-lg-10 ">
                                <div class="row">
                                    <div class="col-12 input-group input-group-default col-lg-9 mt-2 mb-1">
                                        <input type="text" class="form-control shadow" placeholder="Advanced Search" id="t" aria-label="Username" aria-describedby="inputGroup-sizing-default">
                                        <button class="input-group-text shadow btn btn-primary" id="inputGroup-sizing-default" onclick="advancedSearch(0);"><i class="bi bi-search"></i> Search</button>
                                    </div>
                                    <div class="col-12">
                                        <hr class="border border-3 border-dark" />
                                    </div>
                                </div>
                            </div>

                            <div class="offset-1 col-12 col-lg-10">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 fw-bold mb-2">
                                                <label class="form-lable text-black">Select Field</label>
                                            </div>
                                            <div class="col-9 col-lg-4 mb-3">
                                                <select class="form-select" id="c1">
                                                    <option value="0">Select Category</option>
                                                    <?php

                                                    $category_rs = Database::search("Select * From `category`");
                                                    $category_num = $category_rs->num_rows;

                                                    for ($x = 0; $x < $category_num; $x++) {
                                                        $category_data = $category_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $category_data["category_id"]; ?>"><?php echo $category_data["category_name"]; ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-9 col-lg-4 mb-2">
                                                <select class="form-select" id="b1">
                                                    <option value="0">Select Brand</option>
                                                    <?php
                                                    $brand_rs = Database::search("Select * From `brand`");
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

                                            <div class="col-9 col-lg-4 mb-2">
                                                <select class="form-select" id="m">
                                                    <option value="0">Select Model</option>
                                                    <?php
                                                    $model_rs = Database::search("Select * From `model`");
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

                                            <div class="col-9 col-lg-6 mb-2">
                                                <select class="form-select" id="c2">
                                                    <option value="0">Select condition</option>
                                                    <?php
                                                    $condition_rs = Database::search("Select * From `condition`");
                                                    $condition_num = $condition_rs->num_rows;
        
                                                    for($x = 0;$x < $condition_num;$x++){
                                                        $condition_data = $condition_rs->fetch_assoc();
                                                        ?>
                                                        <option value="<?php echo $condition_data["condition_id"]; ?>"><?php echo $condition_data["condition_name"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-9 col-lg-6 mb-2">
                                                <select class="form-select" id="c3">
                                                    <option value="0">Select colour</option>
                                                    <?php
                                                    $color_rs = Database::search("Select * From `color`");
                                                    $color_num = $color_rs->num_rows;
        
                                                    for($x = 0;$x < $color_num;$x++){
                                                        $color_data = $color_rs->fetch_assoc();
                                                        ?>
                                                        <option value="<?php echo $color_data["color_id"]; ?>"><?php echo $color_data["color_name"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-12 fw-bold mb-1">
                                                <label class="form-lable text-black">Enter Price Range</label>
                                            </div>

                                            <div class="col-9 col-lg-6 mb-3">
                                                <input type="text" class="form-control bg-light" id="pf" placeholder="Price From" />
                                            </div>

                                            <div class="col-9 col-lg-6 mb-3">
                                                <input type="text" class="form-control bg-light" id="pt" placeholder="Price To" />
                                            </div>

                                            <div class="col-9 col-lg-12 mb-2 mt-3">
                                                <select class="form-select border border-1" id="sort">
                                                    <option value="0">Sort By Price</option>
                                                    <option value="1">Price Low To High</option>
                                                    <option value="2">Price High To Low</option>
                                                    <option value="3">Quantity Low TO High</option>
                                                    <option value="4">Quantity High To Low</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="offset-0 col-12 offset-lg-2 col-lg-8">
                        <hr class="text-success" />
                    </div>

                </div>
            </div>
            <!-- Search content -->

            <!-- Products -->
            <div class="col-12 mb-2">
                <div class="row" id="advancedSearchResult">

                    <!-- No items -->

                </div>
            </div>
            <!-- Products -->

        </div>
    </div>

    <!-- footer -->
    <div class="container-fluid col-12 mt-2">
        <div class="row">
            <?php include "footer.php" ?>
        </div>
    </div>
    <!-- footer -->

    <script src="script.js"></script>
</body>

</html>