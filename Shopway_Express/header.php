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

            if (isset($_SESSION['u'])) {

                $d = $_SESSION["u"];

            ?>

                <span class="nav-link text-light d-lg-none">Welcome <?php echo $d["fname"]; ?></span>

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
                        <a class="nav-link link-light" aria-current="page" href="home.php"><i class="bi bi-house"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown px-2">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            shopWay eXpress
                        </a>
                        <ul class="dropdown-menu text-light">
                            <li><a class="dropdown-item" href="myProduct.php">My Products</a></li>
                            <li><a class="dropdown-item" href="mySelling.php">My Sellings</a></li>
                            <li><a class="dropdown-item" href="purchaseHistory.php">Purchase History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-light" href="cart.php"><i class="bi bi-cart3"></i> Cart</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link link-light" href="watchlist.php"><i class="bi bi-suit-heart"></i> Watchlist</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item px-lg-3">
                            <a class="nav-link link-light" href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                </svg> My Profile</a>
                        </li>
                        <?php

                        if (isset($_SESSION["u"])) {

                            $d = $_SESSION["u"];

                        ?>

                            <li class="d-none d-lg-block">
                                <span class="nav-link text-light">Welcome <?php echo $d["fname"]; ?> &nbsp;&nbsp;|</span>
                            </li>
                            <li class="">
                                <a class="nav-link active text-light" aria-current="page" onclick="signOut();" style="cursor: pointer;"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
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
                </div>
            </div>
        </div>
    </nav>
    <!-- nav bar -->

    <script src="resources/bootstrap_files/bootstrap.bundle.min.js"></script>
</body>

</html>