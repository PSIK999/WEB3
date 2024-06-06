<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign Up</title>
    <link
      rel="stylesheet"
      href="fonts/material-icon/css/material-design-iconic-font.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../signup/styles.css" />
  </head>
  <body style="background-image:url(../images/laptop-murjp1nk4lp1idlt.jpg)">
    <div class="main">
      <section class="signup">
        <div class="container">
          <div class="signup-content">
            <form method="POST" id="signup-form" class="signup-form" action="signup.php">
              <h2 class="form-title">Create account</h2>
              <div class="form-group">
                <input
                  type="text"
                  class="form-input"
                  name="firstname"
                  id="name"
                  placeholder="Your First-Name"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-input"
                  name="lastname"
                  id="name"
                  placeholder="Your Last-Name"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  class="form-input"
                  name="email"
                  id="email"
                  placeholder="Your Email"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-input"
                  name="password"
                  id="password"
                  placeholder="Password"
                  required
                />
                <i
                  toggle="#password"
                  class="fa-regular fa-eye field-icon toggle-password"
                >
                </i>
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-input"
                  name="re_password"
                  id="re_password"
                  placeholder="Repeat your password"
                  required
                />
                <i
                  toggle="#re_password"
                  class="fa-regular fa-eye field-icon toggle-password"
                >
                </i>
              </div>
              <div class="form-group">
                <input class="checkbox" type="checkbox"  required/>
                <label for="agree-term" class="label-agree-term"
                  ><span><span></span></span>I agree all statements in
                  <a href="../links/termsOfService.html" class="term-service"
                    >Terms of service</a
                  ></label
                >
              </div>
              <div class="form-group">
                <input
                  type="submit"
                  name="submit"
                  id="submit"
                  class="form-submit"
                  value="Sign up"
                />
              </div>
            </form>
            <p class="loginhere">
              Already have an account ?
              <a href="./login.php" class="loginhere-link">Login here</a>
            </p>
          </div>
        </div>
      </section>
    </div>
    <script src="./main.js"></script>
  </body>
</html>


<?php
include ("connect.php");

// On each page load, add HTTP headers to control caching
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Start the session
session_start();

// Regenerate session ID to prevent session fixation
session_regenerate_id(true);

// Generate a token for the user session
$token = bin2hex(random_bytes(16));
$_SESSION['token'] = $token;
$_SESSION['token_expiration'] = time() + 3600; // 1 hour expiration


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']) && $_POST['submit'] == "Sign up") {
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];

        // Validate the input data
        $errors = array();
        if (empty($firstName)) {
            $errors[] = 'First name is required';
        }
        if (empty($lastName)) {
            $errors[] = 'Last name is required';
        }
        if (empty($email)) {
            $errors[] = 'Email is required';
        }
        if (empty($password)) {
            $errors[] = 'Password is required';
        }
        if (empty($re_password)) {
            $errors[] = 'Re-enter password is required';
        }
        if ($password!== $re_password) {
            $errors[] = 'Passwords do not match';
        }

        // Check if there are any errors
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo '<p style="color: red;">'. $error. '</p>';
            }
        } else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "Email Address Already Exists!";
            } else {
                // Hash the password using password_hash()
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user data into the database
                $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)");
                $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashed_password);
                if ($stmt->execute()) {
                    // Generate a token for the user session
                    //$token = bin2hex(random_bytes(16));
                    //$_SESSION['token'] = $token;
                    //$_SESSION['token_expiration'] = time() + 3600; // 1 hour expiration

                    header("location: login.php");
                } else {
                    echo "Error:". $conn->error;
                }
            }
        }
    }
}


?>
