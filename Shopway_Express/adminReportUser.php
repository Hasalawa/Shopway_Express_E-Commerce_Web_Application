<?php
session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

    $rs =  Database::search("SELECT * FROM `user`
    INNER JOIN `gender` ON `gender`.`gender_id` = `user`.`gender_gender_id`
    ORDER BY `user`.`email` ASC");

    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>User Report | shopWay eXpress</title>
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
            <h2>User Report</h2>

            <table class="table border border-2 border-dark table-hover mt-5">
                <thead class="text-center">
                    <tr>
                        <th class="border border-2 border-dark">Email</th>
                        <th class="border border-2 border-dark">First Name</th>
                        <th class="border border-2 border-dark">Last Name</th>
                        <th class="border border-2 border-dark">Mobile</th>
                        <th class="border border-2 border-dark">Joined Date</th>
                        <th class="border border-2 border-dark">Status</th>
                        <th class="border border-2 border-dark">Gender</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <tr>
                            <td class="text-center border border-2 border-dark"><?php echo $d["email"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["fname"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["lname"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["mobile"] ?></td>
                            <td class="text-center border border-2 border-dark"><?php echo $d["joined_date"] ?></td>

                            <?php

                            if ($d["status"] == 1) {
                            ?>

                                <td class="text-center border border-2 border-dark">Active User</td>

                            <?php
                            }else{
                                ?>
                                
                                <td class="text-center border border-2 border-dark">Inactive User</td>
                                
                                <?php
                            }

                            ?>

                            <td class="text-center border border-2 border-dark"><?php echo $d["gender_name"] ?></td>
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