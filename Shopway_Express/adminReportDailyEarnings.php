<?php
session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimeZone($tz);
    $date = $d->format("Y-m-d");

    $rs =  Database::search("SELECT `invoice`.`id`,`invoice`.`order_id`,`product`.`title`,`invoice`.`date`,`user`.`fname`,`user`.`lname`,`invoice`.`total`,`invoice`.`qty` FROM `invoice` INNER JOIN `product` ON
    `invoice`.`product_product_id` = `product`.`product_id`
    INNER JOIN `user` ON `user`.`email` = `invoice`.`user_email`
    WHERE `date` LIKE '" . $date . "%'
    ORDER BY `invoice`.`id` ASC");

    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Daily Earning Report | shopWay eXpress</title>
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
            <h2>Daily Earning Report</h2>

            <table class="table border border-2 border-dark table-hover mt-5">
                <thead class="text-center">
                    <tr>
                        <th class="border border-2 border-dark">Invoice ID</th>
                        <th class="border border-2 border-dark">Order Id</th>
                        <th class="border border-2 border-dark">Product Name</th>
                        <th class="border border-2 border-dark">Selling Date</th>
                        <th class="border border-2 border-dark">Buyer Name</th>
                        <th class="border border-2 border-dark">Quantity</th>
                        <th class="border border-2 border-dark">Amount</th>

                    </tr>
                </thead>

                <tbody>
                    <?php

                    $g_total = 0;

                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();

                        $g_total = $g_total + $d["total"];

                    ?>
                        <tr>
                            <td class="text-center border border-2 border-dark"><?php echo $d["id"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["order_id"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["title"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["date"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["fname"] . " " . $d["lname"]; ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["qty"] ?></td>
                            <td class="text-center border border-2 border-dark">Rs. <?php echo $d["total"] ?>.00</td>

                        </tr>
                    <?php
                    }
                    ?>

                    <tr>
                        <td class="text-center border border-2 border-dark fw-bold fs-5" colspan="6">Grand Total</td>
                        <td class="text-center border border-2 border-dark fw-bold fs-5">Rs. <?php echo $g_total; ?>.00</td>
                    </tr>

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