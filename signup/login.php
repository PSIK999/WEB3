<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Log in</title>
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

  <body  style="background-image:url(../images/laptop-murjp1nk4lp1idlt.jpg)">
    <div class="main">
      <section class="signup">
        <div class="container">
          <div class="signup-content">
            <form method="POST" id="signup-form" class="signup-form" action="login.php">
              <h2 class="form-title">Log in</h2>
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
                <label class="label-agree-term"
                  ><span><span></span></span>Forgot your
                  <a href="#" class="term-service">Password?</a></label
                >
              </div>
              <div class="form-group">
                <input
                  type="submit"
                  name="submit"
                  id="submit"
                  class="form-submit"
                  value="Log in"
                  
                />
              </div>
            </form>
            <p class="loginhere">
              Don't have an account ?
              <a href="../signup/signup.php" class="loginhere-link"
                >Signup here</a
              >
            </p>
             <p class="loginhere">
              Don't have an account ?
              <a href="../signup/signup.php" class="loginhere-link"
                >Signup here</a
              >
            </p>
          </div>
        </div>
      </section>
    </div>

    <script src="../signup/main.js"></script>
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

// Define the expected token
$expectedToken = 'your_secret_token_here';

// Check if the token is valid
if (!isset($_SESSION['token']) || $_SESSION['token']!== $expectedToken) {
    // Token is invalid, generate a new one
    $token = bin2hex(random_bytes(16));
    $_SESSION['token'] = $token;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']) && $_POST['submit'] == "Log in") {
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate the input data
        $errors = array();
        if (empty($email)) {
            $errors[] = 'Email is required';
        }
        if (empty($password)) {
            $errors[] = 'Password is required';
        }

        // Check if there are any errors
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo '<p style="color: red;">'. $error. '</p>';
            }
        } else {
            // Check if email and password match
            $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Password is correct, store user data in the session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['log'] = true; 

                    // Generate a token for the user session
                    $token = bin2hex(random_bytes(16));
                    $_SESSION['token'] = $token;
                    $_SESSION['token_expiration'] = time() + 3600; // 1 hour expiration

                    // Redirect the user to the index page
                    header("location: ../mainpage/index.php");
                    exit();
                } else {
                    echo "Incorrect password";
                }
            } else {
                echo "Email not found";
            }
        }
    }
}



/*include "connect.php";

session_start();

if (isset($_POST['submit']) && $_POST['submit'] == "Log in") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $hashed_password = $row['password'];

      if (password_verify($password, $hashed_password)) {
          session_start();
          $_SESSION['user_id'] = $row['user_id']; // assuming 'id' is the primary key column in your 'users' table
          $_SESSION['email'] = $row['email'];

          // Regenerate session ID to prevent session fixation
          session_regenerate_id(true);

          // Generate a token for the user session
          $token = bin2hex(random_bytes(16));
          $_SESSION['token'] = $token;
          $_SESSION['token_expiration'] = time() + 3600; // 1 hour expiration

          header("Location:../index.php");
          exit();
      } else {
          echo "Not Found, Incorrect Email or Password";
      }
  } else {
      echo "Not Found, Incorrect Email or Password";
  }

  $stmt->close();
}



include ("connect.php");

// On each page load, add HTTP headers to control caching
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Start the session
session_start();

// Regenerate session ID to prevent session fixation
session_regenerate_id(true);

// Define the expected token
$expectedToken = 'your_secret_token_here';

// Check if the token is valid
if (!isset($_SESSION['token']) || $_SESSION['token']!== $expectedToken) {
    // Token is invalid, generate a new one
    $token = bin2hex(random_bytes(16));
    $_SESSION['token'] = $token;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']) && $_POST['submit'] == "Log in") {
        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate the input data
        $errors = array();
        if (empty($email)) {
            $errors[] = 'Email is required';
        }
        if (empty($password)) {
            $errors[] = 'Password is required';
        }

        // Check if there are any errors
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo '<p style="color: red;">'. $error. '</p>';
            }
        } else {
            // Check if email and password match
            $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Password is correct, store user data in the session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];

                    // Generate a token for the user session
                    $token = bin2hex(random_bytes(16));
                    $_SESSION['token'] = $token;
                    $_SESSION['token_expiration'] = time() + 3600; // 1 hour expiration

                    header("location: ../index.php");
                } else {
                    echo "Incorrect password";
                }
            } else {
                echo "Email not found";
            }
        }
    }
}

*/
?>
