<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

?>

    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Admin Panel | shopWay eXpress</title>
        <link rel="icon" href="resources/logo.png" />

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />

    </head>

    <body class="bg-secondary-subtle">

        <div class="container-fluid">
            <div class="row">

                <!-- Nav Bar -->
                <?php include "adminNavbar.php"; ?>
                <!-- Nav Bar -->

                <div class="col-12 bg-light text-center">
                    <label class="form-label text-black fw-bold fs-1">Manage All Users</label>
                </div>

                <div class="col-12 mt-1">
                    <div class="row bg-secondary">
                        <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                            <div class="row">
                                <div class="col-9">
                                    <br />
                                    <input type="text" class="form-control" id="user" />
                                </div>
                                <div class="col-3 d-grid">
                                    <br />
                                    <button class="btn btn-primary fw-bold" onclick="userSearch();">Search User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-primary py-2 text-center">
                            <span class="fw-bold text-white">#</span>
                        </div>
                        <div class="col-2 d-none d-lg-block text-center bg-primary py-2">
                            <span class="fw-bold text-white">Profile Image</span>
                        </div>
                        <div class="col-4 col-lg-2 text-center bg-primary py-2">
                            <span class="fw-bold text-white">User Name</span>
                        </div>
                        <div class="col-4 col-lg-2 text-center d-lg-block bg-primary py-2">
                            <span class="fw-bold text-white">Email</span>
                        </div>
                        <div class="col-2 d-none d-lg-block text-center bg-primary py-2">
                            <span class="fw-bold text-white">Mobile</span>
                        </div>
                        <div class="col-2 d-none d-lg-block text-center bg-primary py-2">
                            <span class="fw-bold text-white">Registered Date</span>
                        </div>
                        <div class="col-2 col-lg-1 d-none text-center d-lg-block bg-primary py-2">
                            <span class="fw-bold text-white">status</span>
                        </div>
                    </div>
                </div>
                <div class="col-12" id="userSearch">
                    <div class="row">
                        <?php

                        $query = "SELECT * FROM `user` ";
                        $pageno;


                        if (isset($_GET["page"])) {
                            $pageno = $_GET["page"];
                        } else {
                            $pageno = 1;
                        }

                        $user_rs = Database::search($query);
                        $user_num = $user_rs->num_rows;

                        $results_per_page = 20;
                        $number_of_pages = ceil($user_num / $results_per_page);

                        $page_results = ($pageno - 1) * $results_per_page;
                        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                        $selected_num = $selected_rs->num_rows;

                        for ($x = 0; $x < $selected_num; $x++) {
                            $selected_data = $selected_rs->fetch_assoc();
                        ?>



                            <div class="col-12 mt-3 mb-3">
                                <div class="row">
                                    <div class="col-2 col-lg-1 text-center bg-secondary py-2">
                                        <span class="fw-bold text-light"><?php echo $x + 1; ?></span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-secondary py-2">
                                        <?php
                                        $image_rs = Database::search("SELECT * FROM `profile_image`  WHERE `user_email`='" . $selected_data['email'] . "'");
                                        $image_data = $image_rs->fetch_assoc();
                                        if (isset($image_data["path"])) {
                                        ?>

                                            <img src="<?php echo $image_data["path"] ?>" class="rounded-circle" style="height: 40px;margin-left: 80px;" />

                                        <?php
                                        } else {
                                        ?>

                                            <img src="resources/user.png" style="height: 40px;margin-left: 80px;" />

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-4 col-lg-2 text-center bg-secondary py-2">
                                        <span class="fw-bold text-white"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                                    </div>
                                    <div class="col-4 col-lg-2 d-lg-block text-center bg-secondary py-2">
                                        <span class="text-white fw-bold"><?php echo $selected_data["email"]; ?></span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-secondary text-center py-2">
                                        <span class="fw-bold text-white"><?php echo $selected_data["mobile"]; ?></span>
                                    </div>
                                    <div class="col-2 d-none d-lg-block bg-secondary text-center py-2">
                                        <span class="text-white fw-bold"><?php echo $selected_data["joined_date"]; ?></span>
                                    </div>

                                    <?php
                                    if ($selected_data["status"] == 1) {
                                    ?>
                                        <div class="col-2 col-lg-1 bg-secondary text-center py-2 d-grid">
                                            <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-danger fw-bold" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Block</button>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-2 col-lg-1 bg-secondary text-center py-2 d-grid">
                                            <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-success fw-bold" onclick="blockUser('<?php echo $selected_data['email']; ?>');">UnBlock</button>
                                        </div>
                                    <?php

                                    }
                                    ?>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- Paginition -->
                        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mt-3 mb-2">
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
                        <!-- Paginition -->

                    </div>
                </div>

                <?php include "footer.php"; ?>

            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php

}

?>