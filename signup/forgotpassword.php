<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Forgot Password</title>
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../signup/styles.css" />
</head>

<body style="background-image:url(../images/laptop-murjp1nk4lp1idlt.jpg)">
  <div class="main">
    <section class="signup">
      <div class="container">
        <div class="signup-content">

          <?php
          require '../vendor/autoload.php'; // Load Composer's autoloader
          include("connect.php");
          session_start();
          $errors = array();

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if (empty($email)) {
              $errors['email'] = 'Email is required';
            }
            if (empty($new_password)) {
              $errors['new_password'] = 'New password is required';
            }
            if (empty($confirm_password)) {
              $errors['confirm_password'] = 'Confirm password is required';
            }
            if ($new_password !== $confirm_password) {
              $errors['password_mismatch'] = 'Passwords do not match';
            }

            if (empty($errors)) {
              $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
              $stmt->bind_param("s", $email);
              $stmt->execute();
              $result = $stmt->get_result();

              if ($result->num_rows > 0) {
                $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
                $stmt->bind_param("ss", $new_password_hashed, $email);
                if ($stmt->execute()) {
                  // Send email using PHPMailer
                  $mail = new PHPMailer\PHPMailer\PHPMailer();

                  try {
                    //Server settings
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.example.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'sicha1232020@gmail.com';                     // SMTP username
                    $mail->Password   = 'qajb jqll efys rncb';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;   
                    $mail->SMTPOptions = array(                               // TCP port to connect to
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                    //Recipients
                    $mail->setFrom('saheltronix@gmail.com', 'SahelTronix');
                    $mail->addAddress($email);     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Password Reset Successful';
                    $mail->Body    = 'Your password has been successfully reset.';

                    $mail->send();
                    echo '<div style="color: green;">Password reset successful. An email has been sent to you.</div>';
                    header("Location: login.php");
                    exit();
                  } catch (Exception $e) {
                    echo '<div style="color: red;">Password reset successful but failed to send email. Mailer Error: ', $mail->ErrorInfo, '</div>';
                  }
                } else {
                  echo '<div style="color: red;">Failed to reset password. Please try again.</div>';
                }
              } else {
                $errors['email_not_found'] = 'Email not found';
              }
            }
          }
          ?>

          <form method="POST" id="forgot-password-form" class="signup-form" action="forgotpassword.php">
            <h2 class="form-title">Forgot Password</h2>
            <div class="form-group">
              <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" />
              <?php if (!empty($errors['email'])) { ?>
                <div style="color: red;" class="alert alert-danger">
                  <?= htmlspecialchars($errors['email']) ?><br>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <input type="password" class="form-input" name="new_password" id="new_password" placeholder="New Password" />
              <?php if (!empty($errors['new_password'])) { ?>
                <div style="color: red;" class="alert alert-danger">
                  <?= htmlspecialchars($errors['new_password']) ?><br>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <input type="password" class="form-input" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" />
              <?php if (!empty($errors['confirm_password'])) { ?>
                <div style="color: red;" class="alert alert-danger">
                  <?= htmlspecialchars($errors['confirm_password']) ?><br>
                </div>
              <?php } ?>
              <?php if (!empty($errors['password_mismatch'])) { ?>
                <div style="color: red;" class="alert alert-danger">
                  <?= htmlspecialchars($errors['password_mismatch']) ?><br>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" id="submit" class="form-submit" value="Reset Password" />
            </div>
          </form>
          <p class="loginhere">
            Remember your password?
            <a href="login.php" class="loginhere-link">Log in here</a>
          </p>
        </div>
      </div>
    </section>
  </div>
  <script src="../signup/main.js"></script>
</body>

</html>
