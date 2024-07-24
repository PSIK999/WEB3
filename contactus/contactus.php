<?php
include "../signup/connect.php";
include '../signup/regular_auth.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

require '../vendor/autoload.php';

if (isset($_POST["Send"])){
    // Validate inputs
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP(); 
        $mail->SMTPDebug = 2;
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;   
        $mail->Username   = 'sicha1232020@gmail.com';
        $mail->Password   = 'qajb jqll efys rncb'; // Use your App Password here not your password
        $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
        $mail->Port       = 587; // Port for TLS encryption
        $mail->SMTPOptions = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
          )
      );
        // Set the user's email and name as the sender
        $mail->setFrom($email, $name);
        $mail->addAddress('sicha1232020@gmail.com');

        $mail->isHTML(true); 
        $mail->Subject = 'Contact Form: ' . $name;
        $mail->Body    = $message;
        $mail->send();
        echo "
        <script>
            alert('Email Sent');
            document.location.href='contactus.php';
        </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../contactus/contactus.css" />
</head>
<body>
    <div class="container" style="background-image:url(../images/laptop-murjp1nk4lp1idlt.jpg);">
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">
                    To contact us, please fill the form with the required information.
                </p>
                <div class="info">
                    <div class="social-information">
                        <i class="fa fa-map-marker"></i>
                        <p class="Jamil">
                            <a href="https://www.google.com/maps/place/Jamil+Market/@34.003528,35.6511832,142m/data=!3m1!1e3!4m6!3m5!1s0x151f412c922638db:0xbc2a4f23c1b1c0ba!8m2!3d34.0036795!4d35.6514565!16s%2Fg%2F1tfdg_rz?entry=ttu">SahelTronix</a>
                        </p>
                    </div>
                    <div class="social-information">
                        <i class="fa fa-envelope-o"></i>
                        <p>
                            <a href="#">karl.khoury@isae.edu.lb</a><br />
                            <a href="#">simon.khalil@isae.edu.lb</a><br />
                            <a href="#">sergio.njeim@isae.edu.lb</a>
                        </p>
                    </div>
                    <div class="social-information">
                        <i class="fa fa-mobile-phone"></i>
                        <p>
                            <a href="#">+961 81 509 874</a><br />
                            <a href="#">+961 81 381 666</a><br />
                            <a href="#">+961 70 078 198</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="contact-info-form">
                <form action="" method="post" onsubmit="return validateForm()">
                    <h3 class="title">Contact Us</h3>
                    <div class="social-input-containers">
                        <input type="text" name="name" class="input" placeholder="Name" /><br />
                        <p id="inname"></p>
                    </div>
                    <div class="social-input-containers">
                        <input type="text" name="email" class="input" placeholder="Email" /><br />
                        <p id="inemail"></p>
                    </div>
                    <div class="social-input-containers">
                        <input type="tel" name="phone" class="input" placeholder="Phone" /><br />
                        <p id="inphone"></p>
                    </div>
                    <div class="social-input-containers textarea">
                        <textarea name="message" class="input" placeholder="Message"></textarea>
                    </div>
                    <input type="submit" name="Send" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>
    <script src="../contactus/contactus.js"></script>
</body>
</html>
