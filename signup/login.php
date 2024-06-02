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
          </div>
        </div>
      </section>
    </div>

    <script src="../signup/main.js"></script>
  </body>
</html>

<?php 

include "../signup/connect.php";

if(isset($_POST['submit']) && $_POST['submit'] == "Log in"){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: ../index.php");
    echo "zabatettttttttttttttttttt";
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>