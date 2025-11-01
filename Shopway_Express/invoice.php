<?php

session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Invoice | shopWay eXpress</title>
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

        <div class="col-12 mt-3 mb-3 btn-toolbar animation justify-content-end">
            <button class="btn btn-dark me-1" onclick="printInvoice();"><i class="bi bi-printer"></i> Print</button>
            <button class="btn btn-danger" onclick="printInvoice();"><i class="bi bi-filetype-pdf"></i> Save as PDF</button>
        </div>
        <div class="row bg-secondary-subtle" id="page">

            <?php

            require "connection.php";

            if (isset($_SESSION["u"])) {
                $umail = $_SESSION["u"]["email"];
                $oid = $_GET["id"];

            ?>

                <br />
                <div class="col-12 mt-3">
                    <hr />
                    <div class="col-12">
                        <p style="font-family: monospace;" class="text-end me-4">Shopway Express, <br /> Yatiyana Road, <br /> Matara, <br /> Sri Lanka</p>
                    </div>
                </div>
                <hr />
                <div class="row">

                    <?php

                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                    $invoice_data = $invoice_rs->fetch_assoc();

                    ?>

                    <div class="col-12">
                        <p style="font-family: monospace;" class="text-end"><?php echo $invoice_data["date"]; ?></p>
                    </div>
                    <div class="col-12">
                        <p style="font-family: monospace;" class="text-end">Receipt No: CORE0000<?php echo $invoice_data["id"]; ?></p>
                    </div>
                </div>
                <hr />
                <div class="col-12">

                    <?php

                    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
                    $address_data = $address_rs->fetch_assoc();

                    ?>

                    <h3 class="invoice">Invoice Details</h3>
                    <span style="font-family: monospace;"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span><br />
                    <span style="font-family: monospace;"><?php echo $address_data["address_line_1"] . " " . $address_data["address_line_2"]; ?></span><br />
                    <span style="font-family: monospace;"><?php echo $umail; ?></span><br /><br />
                </div>
                <hr />
                <div class="col-12">
                    <table class="text-center table-responsive col-12 table-bordered animation">
                        <tr>
                            <th class="bg-primary">#</th>
                            <th class="bg-primary">Referance_Number</th>
                            <th class="bg-primary">Product_Name</th>
                            <th class="bg-primary">Quantity</th>
                            <th class="bg-primary">Price</th>
                        </tr>
                        <?php

                        $product_rs = Database::search("SELECT * FROM `product` WHERE `product_id`='" . $invoice_data["product_product_id"] . "'");
                        $product_data = $product_rs->fetch_assoc();

                        $city_rs = Database::search("SELECT * FROM `city` WHERE `city_id`='" . $address_data["city_city_id"] . "'");
                        $city_data = $city_rs->fetch_assoc();

                        $in_rs = Database::search("SELECT `invoice`.`id`,`invoice`.`order_id`,`product`.`title`,`invoice`.`qty`,`product`.`price` FROM `invoice` INNER JOIN `product` ON
                        `invoice`.`product_product_id` = `product`.`product_id`
                        WHERE `order_id` = '" . $oid . "'");
                        $in_num = $in_rs->num_rows;

                        $delivery = 0;
                        $sub_total = 0;
                        $qty = 0;

                        for ($x = 0; $x < $in_num; $x++) {
                            $in_data = $in_rs->fetch_assoc();

                            if($city_data["district_district_id"] == 22){
                                $delivery = $delivery + 300;
                            }else{
                                $delivery = $delivery + 350;
                            }

                            $sub_total = $sub_total + ($in_data["price"] * $in_data["qty"]);

                        ?>

                            <tr>
                                <td><?php echo $in_data["id"]; ?></td>
                                <td><?php echo $oid ?></td>
                                <td><?php echo $in_data["title"]; ?></td>
                                <td><?php echo $in_data["qty"]; ?></td>
                                <td>Rs. <?php echo $in_data["price"]; ?>.00</td>
                            </tr>

                        <?php
                        }

                        ?>

                        <tr>
                            <?php

                            $total = $invoice_data["total"];

                            ?>
                            <td colspan="4" class="invoice">Sub_Total</td>
                            <td>Rs. <?php echo $sub_total; ?>.00</td>
                        </tr>
                        <?php

                        ?>
                        <tr>
                            <td colspan="4" class="invoice">Delivery_Cost</td>
                            <td>Rs. <?php echo $delivery; ?>.00</td>
                        </tr>
                        <tr>
                            <td colspan="4">Grand_Total</td>
                            <td class="text-light bg-danger fw-bold">Rs. <?php echo $total; ?>.00</td>
                        </tr>
                    </table>
                    <br />
                    <p class="text-center fw-bold">Thanks for your buying our product!</p>
                </div>
        </div>

        <!-- content -->

    <?php

            }

    ?>

    <!-- footer -->
    <div class="row">
        <?php include "footer.php" ?>
    </div>
    <!-- footer -->

    <script src="script.js"></script>
</body>

</html>