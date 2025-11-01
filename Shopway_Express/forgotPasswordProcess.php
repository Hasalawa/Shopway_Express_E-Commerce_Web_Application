<?php

session_start();
require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];
    $_SESSION["e"] = $email;

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        $code = uniqid();

        Database::iud("UPDATE `user` SET `varification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'genixesoft@gmail.com';
        $mail->Password = 'smdihpljbxfftese';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('genixesoft@gmail.com', 'shopWay eXpress Reset Password');
        $mail->addReplyTo('genixesoft@gmail.com', 'shopWay eXpress Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'shopWay eXpress Forgot password Verification Code';
        $bodyContent = '<div style="width: 90%; height: 60vh; background-color: #faf0e6; text-align: justify;">
        <div style="background-color: black; opacity: 85%; text-align: center; color: white; letter-spacing: 1px; height: 10vh; padding-top:1rem;">
        <h1><span style="font-size: 25px; font-family: "aligarhdemo"; color: white;">shopWay eXpress Verification Code</span></h1></div>
        <p style="color: black; padding-right: 3rem; padding-left: 3rem;">Hi User,</p><p style="color: black; padding-right: 3rem; padding-left: 3rem;">
        We received a request to access your shopWay express Account '. $email .' through your email address. Your shopWay express verification code is:
        </p><div style="text-align: center;"><h1 style="color: #d1a885;"> ' . $code . '</h1>
        </div><p style="color: black; padding-right: 3rem; padding-left: 3rem;">If you did not request this code, it is possible that someone else is trying to access the Google Account '. $email .'.<b> Do not forward or give this code to anyone.</b>
        </p><p style="color: black; padding-right: 3rem; padding-left: 3rem;">Sincerely yours,</p>
        <p style="color: black; padding-right: 3rem; padding-left: 3rem;">The shopWay eXpress team</p>
        </div><span style="color: black;"><br/>This email can not receive replies. For more information, contact the shopWay eXpress Admin.</span><br/><span style="color: black;">© shopWay eXpress.</span>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("Verification Code Sending Failed");
        } else {
?>

            <div class="col-12 text-center text-light pt-2 px-5 pb-2">
                <h1>Forgot Password</h1>
            </div>
            <div class="col-12 text-center d-none px-5" id="msgbox2">
                <div class="text-danger text-center" role="alert" id="message1"></div>
            </div>
            <div class="col-6 mt-2 ps-5">
                <label for="">New Password</label>
                <div class="input-group">
                    <input type="password" class="form-control mt-1" id="newP" placeholder="Ex: ********" style="box-shadow: 0px 1px 10px 0px;" />
                    <button class="button mt-1" type="button" id="npb" onclick="showPassword();"><i class="bi bi-eye-slash-fill"></i></button>
                </div>
            </div>
            <div class="col-6 mt-2 pe-5">
                <label for="">Retype Password</label>
                <div class="input-group">
                    <input type="password" class="form-control mt-1" id="rP" placeholder="Ex: ********" style="box-shadow: 0px 1px 10px 0px;" />
                    <button class="button mt-1" type="button" id="rnpb" onclick="showPassword1();"><i class="bi bi-eye-slash-fill"></i></button>
                </div>
            </div>
            <div class="col-12 text-center d-none px-5" id="alertdiv4">
                <div class="col-12 text-center text-danger" role="alert" id="alert5"></div>
            </div>
            <div class="col-12 mt-2 px-5">
                <label for="">Varification Code</label>
                <input type="password" class="form-control mt-1" id="vCode" placeholder="Ex: ********" style="box-shadow: 0px 1px 10px 0px;" />
            </div>
            <div class="col-12 d-grid mt-4 px-5">
                <button class="button" onclick="resetpwd();">Reset Password</button>
            </div>
            <div class="col-12 d-grid mt-4 mb-5 px-5">
                <button class="button" style="opacity: 43%;" onclick="cancel();">Cancel</button>
            </div>

<?php
        }
    } else {
        echo ("Invalid Email Address.");
    }
}

?>