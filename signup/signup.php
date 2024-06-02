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
                <input type="checkbox"  required/>
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
              <a href="../login.php" class="loginhere-link">Login here</a>
            </p>
          </div>
        </div>
      </section>
    </div>
    <script src="../signup/main.js"></script>
  </body>
</html>


<?php

include ("../signup/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']) && $_POST['submit'] == "Sign up") {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);
        $checkEmail = "SELECT * From users where email='$email'";
        $result = $conn->query($checkEmail);
        
        if ($result->num_rows > 0) {
            echo "Email Address Already Exists !";
        } else {
            $insertQuery = "INSERT INTO users(first_name,last_name,email,password)
                       VALUES ('$firstName','$lastName','$email','$password')";
            if ($conn->query($insertQuery) == TRUE) {
                header("location: ../index.php");
            } else {
                echo "Error:" . $conn->error;
            }
        }
    }
}
