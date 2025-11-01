<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

</head>

<body>

    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary col-12 bg-black" style="opacity: 85%;">
        <div class="container-fluid">
            <img src="resources/logo.png" class="navbar-brand" style="height: 40px;" />
            <?php

            if (isset($_SESSION['au'])) {

                $d = $_SESSION["au"];

            ?>

                <span class="nav-link text-light d-lg-none">Welcome <?php echo $d["fname"] . ' ' . $d["lname"]; ?></span>

            <?php

            } else {

            ?>

                <span class="nav-link text-light"></span>

            <?php

            }

            ?>

            <button class="btn d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" color="white" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link link-light" aria-current="page" href="adminPanel.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                            </svg> Admin Dashboard</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-light" aria-current="page" href="adminReport.php"><i class="bi bi-file-earmark-fill"></i> Reports</a>
                    </li>
                </ul>
                <!-- <div class="d-flex"> -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php

                    if (isset($_SESSION["au"])) {

                        $d = $_SESSION["au"];

                    ?>

                        <li class="d-none d-lg-block">
                            <span class="nav-link text-light">Welcome <?php echo $d["fname"] . ' ' . $d["lname"]; ?> &nbsp;&nbsp;|</span>
                        </li>
                        <li class="">
                            <a class="nav-link active text-light" aria-current="page" onclick="logOut();" style="cursor: pointer;"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
                        </li>

                    <?php

                    } else {

                    ?>

                        <li>
                            <a class="nav-link active text-light" aria-current="page" href="index.php"><i class="bi bi-box-arrow-right"></i> Sign In or Sign Up</a>
                        </li>

                    <?php

                    }

                    ?>

                </ul>
                <!-- </div> -->
            </div>
        </div>
    </nav>
    <!-- nav bar -->

    <script src="resources/bootstrap_files/bootstrap.bundle.min.js"></script>
</body>

</html>