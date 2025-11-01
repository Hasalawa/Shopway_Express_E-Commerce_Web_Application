<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

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

    <body onload="chartLoad();" class="bg-secondary-subtle">
        <!-- nav bar  -->
        <?php
        include "adminNavbar.php";
        ?>
        <!-- nav bar  -->

        <div class="container-fluid">
            <div class="btn-group dropend mt-4 mb-4">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Reports
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="adminReportProduct.php">Product Report</a></li>
                    <li><a class="dropdown-item" href="adminReportUser.php">User Report</a></li>
                    <li><a class="dropdown-item" href="adminReportSellig.php">Selling Report</a></li>
                    <li><a class="dropdown-item" href="adminReportDailyEarnings.php">Daily Earning Report</a></li>
                </ul>
            </div>
        </div>

        <!-- Chart -->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Most Sold Products</h1>
                </div>
                <div class="col-12 d-flex justify-content-center bg-dark-subtle rounded-2 mb-3">
                    <canvas id="myChart">
                </div>
            </div>
        </div>

        <!-- Chart -->

        <!-- footer  -->
        <?php include "footer.php"; ?>
        <!-- footer  -->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>

    </html>


<?php

} else {
    ?>
    
    <script>
        alert ("You are not a valid admin");
        window.location = "index.php";
    </script>
    
    <?php
}


?>