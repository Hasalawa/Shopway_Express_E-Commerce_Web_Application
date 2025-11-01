<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["e"])) {
    $email = $_POST["e"];
    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");
    $admin_num = $admin_rs->num_rows;

    if ($admin_num > 0) {
        $code = uniqid();
        Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'genixesoft@gmail.com';
        $mail->Password = 'smdihpljbxfftese';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('genixesoft@gmail.com', 'Admin Verification');
        $mail->addReplyTo('genixesoft@gmail.com', 'Admin Verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'shopWay eXpress Admin Verification Code';
        $bodyContent = '<div style="width: 90%; height: 60vh; background-color: #faf0e6; text-align: justify;">
        <div style="background-color: black; opacity: 85%; text-align: center; color: white; letter-spacing: 1px; height: 10vh; padding-top:1rem;">
        <h1><span style="font-size: 25px; font-family: "aligarhdemo"; color: white;">shopWay eXpress Admin Verification Code</span></h1></div>
        <p style="color: black; padding-right: 3rem; padding-left: 3rem;">Hi Admin,</p><p style="color: black; padding-right: 3rem; padding-left: 3rem;">
        We received a request to access your shopWay express Account '. $email .' through your email address. Your shopWay express Admin verification code is:
        </p><div style="text-align: center;"><h1 style="color: #d1a885;"> ' . $code . '</h1>
        </div><p style="color: black; padding-right: 3rem; padding-left: 3rem;">If you did not request this code, it is possible that someone else is trying to access the Google Account '. $email .'.<b> Do not forward or give this code to anyone.</b>
        </p><p style="color: black; padding-right: 3rem; padding-left: 3rem;">Sincerely yours,</p>
        <p style="color: black; padding-right: 3rem; padding-left: 3rem;">The shopWay eXpress team</p>
        </div><span style="color: black;"><br/>This email can not receive replies.</span><br/><span style="color: black;">© shopWay eXpress.</span>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ('Verification Code Sending failed');
        } else {
            echo ('Success');
        }
    } else {
        echo ("You Are Not a Valid User.");
    }
} else {
    echo ("Email Field should Not Be Empty.");
}
