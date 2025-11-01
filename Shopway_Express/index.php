<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>shopWay eXpress</title>
    <link rel="icon" href="resources/logo.png" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="resources/bootstrap_files/bootstrap.css" />

</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <div class="offset-1 col-10">
                <div class="row main-content rounded-5">

                    <!-- welcome box -->
                    <div class="col-6 content-1 d-none d-lg-block">
                        <div class="row">
                            <div class="col-12 px-5 pb-3 pt-5">
                                <h1><img src="resources/logo.png" width="8%" height="auto" />&nbsp;<span class="title-1">shopWay eXpress</span></h1>
                            </div>
                            <div class="col-12 pt-5 px-5">
                                <h2 class="title-2">Welcome!<br /><span class="auto-type"></span></h2>
                                <p class="text">Where your unique taste matches your needs in fashion to electronics, we are here 24/7 to guide you with our user friendly interface for a comfortable shopping spree!</p>
                                <p class="text">Join us today!</p>
                            </div>
                            <div class="col-12 social-icon text-center px-5 pb-5">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-whatsapp"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                <a href="#"><i class="bi bi-envelope-fill"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- welcome box -->

                    <div class="col-12 col-lg-6 content-2">

                        <div class="text-end">
                            <span style="cursor: pointer;" onclick="adminLogin();"><svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                            </svg></span>
                        </div>

                        <!-- signUp box -->
                        <div class="row" id="signUpBox">
                            <div class="col-12 text-center text-light px-5 pt-5 pb-3">
                                <h1>SIGN UP</h1>
                            </div>
                            <div class="col-12 text-center d-none px-5" id="msgdiv1">
                                <div class="text-danger text-center" role="alert" id="msg1"></div>
                            </div>
                            <div class="col-6 ps-5">
                                <label for="">First Name</label>
                                <input type="text" class="form-control mt-1" id="fname" placeholder="Ex: John" style="box-shadow: 0px 1px 10px 0px;" />
                                <div class="col-12 d-none" id="msgdiv">
                                    <div class="text-danger" role="alert" id="msg"></div>
                                </div>
                            </div>
                            <div class="col-6 pe-5">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control mt-1" id="lname" placeholder="Ex: Doe" style="box-shadow: 0px 1px 10px 0px;" />
                                <div class="col-12 d-none" id="alertdiv">
                                    <div class="text-danger" role="alert" id="alert1"></div>
                                </div>
                            </div>
                            <div class="col-12 mt-2 px-5">
                                <label for="">Email</label>
                                <input type="email" class="form-control mt-1" id="email" placeholder="Ex: john@gmail.com" style="box-shadow: 0px 1px 10px 0px;" />
                                <div class="col-12 d-none" id="alertdiv1">
                                    <div class="text-danger" role="alert" id="alert2"></div>
                                </div>
                            </div>
                            <div class="col-6 mt-2 ps-5">
                                <label for="">Password</label>
                                <input type="password" class="form-control mt-1" id="password" placeholder="Ex: ********" style="box-shadow: 0px 1px 10px 0px;" />
                                <div class="col-12 d-none" id="alertdiv2">
                                    <div class="text-danger" role="alert" id="alert3"></div>
                                </div>
                            </div>
                            <div class="col-6 mt-2 pe-5">
                                <label for="">Retype Password</label>
                                <input type="password" class="form-control mt-1" id="password-1" placeholder="Ex: ********" style="box-shadow: 0px 1px 10px 0px;" />
                                <div class="col-12 d-none" id="alertdiv3">
                                    <div class="text-danger" role="alert" id="alert4"></div>
                                </div>
                            </div>
                            <div class="col-12 text-center d-none px-5" id="alertdiv4">
                                <div class="col-12 text-center text-danger" role="alert" id="alert5"></div>
                            </div>
                            <div class="col-6 mt-2 ps-5">
                                <label for="">Contact Number</label>
                                <input type="text" class="form-control mt-1" id="mobile" placeholder="Ex: 071*******" style="box-shadow: 0px 1px 10px 0px;" />
                                <div class="col-12 d-none" id="alertdiv5">
                                    <div class="text-danger" role="alert" id="alert6"></div>
                                </div>
                            </div>
                            <div class="col-6 mt-2 pe-5">
                                <label>Gender</label>
                                <select class="form-select mt-1" id="gender" style="box-shadow: 0px 1px 10px 0px;">

                                    <option value="0">Select Your Gender</option>

                                    <?php

                                    require "connection.php";
                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {
                                        $d = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $d["gender_id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                                    <?php

                                    }

                                    ?>

                                </select>

                                <div class="col-12 d-none" id="alertdiv6">
                                    <div class="text-danger" role="alert" id="alert7"></div>
                                </div>

                            </div>
                            <div class="col-12 d-grid mt-4 px-5">
                                <button class="button" onclick="signUp();">SIGN UP</button>
                            </div>
                            <div class="col-12 d-grid mt-2 px-5 pb-5 text-center">
                                <span class="text-dark fw-semibold text-opacity-75">Do you have an account? <a href="#" class="text-light" style="text-decoration: none;" onclick="change();">Sign In</a></span>
                            </div>
                        </div>
                        <!-- signUp box -->

                        <!-- signIn box -->
                        <div class="row d-none mt-5" id="signInBox">
                            <div class="col-12 text-center text-light pt-5 pb-3">
                                <h1>SIGN IN</h1>
                            </div>
                            <div class="col-12 text-center d-none px-5" id="msgdiv4">
                                <div class="text-danger text-center" role="alert" id="msg4"></div>
                            </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12 offset-lg-1 col-lg-10 mt-2">
                                <label for="">Email</label>
                                <input type="email" class="form-control mt-1" placeholder="john@gmail.com" style="box-shadow: 0px 1px 10px 0px;" id="email1" value="<?php echo $email; ?>" />
                                <div class="col-12 d-none" id="msgdiv2">
                                    <div class="text-danger" role="alert" id="msg2"></div>
                                </div>
                            </div>
                            <div class="col-12 offset-lg-1 col-lg-10 mt-2">
                                <label for="">Password</label>
                                <input type="password" class="form-control mt-1" placeholder="********" style="box-shadow: 0px 1px 10px 0px;" id="pwd" value="<?php echo $password; ?>" />
                                <div class="col-12 d-none" id="msgdiv3">
                                    <div class="text-danger" role="alert" id="msg3"></div>
                                </div>
                            </div>
                            <div class="col-6 offset-lg-1 col-lg-4 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" />
                                    <span class="text-light">Remember Me</span>
                                </div>
                            </div>
                            <div class="col-6 mt-2 text-end">
                                <a href="#" class="link-dark" style="text-decoration: none;" onclick="forgotPassword();">Forgot Password?</a>
                            </div>
                            <div class="offset-lg-1 col-lg-10 d-grid mt-4">
                                <button class="button" onclick="signIn();">SIGN IN</button>
                            </div>
                            <div class="col-12 offset-lg-1 col-lg-10 d-grid mt-2 mb-5 text-center pb-5">
                                <span class="text-dark fw-semibold text-opacity-75">New to shopWay eXpress? <a href="#" class="text-light" style="text-decoration: none;" onclick="change();">Join Now</a></span>
                            </div>
                        </div>
                        <!-- signIn box -->

                    </div>

                </div>
            </div>

            <!-- Admin Verification Model -->
            <div class="modal" tabindex="-1" id="verificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <label class="form-label text-black">Enter Your Verification Code</label>
                            <input type="text" class="form-control" id="vcode"/>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn text-light" style="background-color: black;" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Admin Verification Model -->

            <!-- footer -->
            <div class="col-12 fixed-bottom">
                <p class="text-center">&copy; 2024 shopWay_eXpress.lk || All Rights Reserved</p>
            </div>
            <!-- footer -->

        </div>
    </div>

    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="script.js"></script>
    <script src="resources/bootstrap_files/bootstrap.bundle.js"></script>
</body>

</html>