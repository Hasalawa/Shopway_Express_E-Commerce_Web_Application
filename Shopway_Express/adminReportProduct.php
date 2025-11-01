<?php
session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

    $rs =  Database::search("SELECT * FROM `product` INNER JOIN `model_has_brand` ON
    `product`.`model_has_brand_id` = `model_has_brand`.`id`
    INNER JOIN `brand` ON `model_has_brand`.`brand_brand_id` = `brand`.`brand_id`
    INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id`
    INNER JOIN `category` ON `product`.`category_category_id` = `category`.`category_id`
    INNER JOIN `model` ON `model_has_brand`.`model_model_id` = `model`.`model_id`
    INNER JOIN `product_image` ON `product_image`.`product_product_id` = `product`.`product_id`
    ORDER BY `product`.`product_id` ASC");

    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Product Report | shopWay eXpress</title>
        <link rel="icon" href="resources/logo.png" />

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />
        <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.min.css" />

    </head>

    <body class="bg-secondary-subtle">

        <!-- nav bar  -->
        <?php
        include "adminNavbar.php";
        ?>
        <!-- nav bar  -->

        <div class="col-12 mt-3 mb-3 btn-toolbar animation justify-content-end">
            <button class="btn btn-dark me-1" onclick="printInvoice();"><i class="bi bi-printer"></i> Print</button>
            <button class="btn btn-danger" onclick="printInvoice();"><i class="bi bi-filetype-pdf"></i> Save as PDF</button>
        </div>

        <div class="container mt-3" id="page">
            <h2><img src="resources/logo.png" alt="" style="width: 5%;"> shopWay eXpress</h2>
            <h2>Product Report</h2>

            <table class="table border border-2 border-dark table-hover mt-5">
                <thead class="text-center">
                    <tr>
                        <th class="border border-2 border-dark">Product Id</th>
                        <th class="border border-2 border-dark">Product Name</th>
                        <th class="border border-2 border-dark">Category</th>
                        <th class="border border-2 border-dark">Brand Name</th>
                        <th class="border border-2 border-dark">Model</th>
                        <th class="border border-2 border-dark">Colour</th>
                        <th class="border border-2 border-dark">Discription</th>
                        <th class="border border-2 border-dark">Image</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <tr>
                            <td class="text-center border border-2 border-dark"><?php echo $d["product_id"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["title"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["category_name"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["brand_name"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["model_name"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["color_name"] ?></td>
                            <td><?php echo $d["description"] ?></td>
                            <td class="text-center border border-2 border-dark"><img src="<?php echo $d["product_image_path"] ?>" height="100"></td>

                        </tr>
                    <?php
                    }
                    ?>

                </tbody>


            </table>
        </div>

        <?php include "footer.php"; ?>

        <script src="script.js"></script>
    </body>

    </html>


<?php
} else {
    echo ("You are not a Valid Admin");
}


?>