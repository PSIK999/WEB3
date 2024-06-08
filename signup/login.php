<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Log in</title>
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
          
          include ("connect.php");

          // On each page load, add HTTP headers to control caching
          header('Cache-Control: no-cache, no-store, must-revalidate');
          header('Pragma: no-cache');
          header('Expires: 0');

          // Start the session
          session_start();

          // Regenerate session ID to prevent session fixation
          session_regenerate_id(true);

          // Check if the token is valid
          if (!isset($_SESSION['token'])) {
            // Token is invalid, generate a new one
            $token = bin2hex(random_bytes(16));
            $_SESSION['token'] = $token;
          }
          $errors = array(
            'email' => array(),
            'password' => array(),
          );
          $password_errors = true;
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit']) && $_POST['submit'] == "Log in") {
              // Regenerate session ID to prevent session fixation
              session_regenerate_id(true);

              $email = $_POST['email'];
              $password = $_POST['password'];

              // Validate the input data
             
              if (empty($email)) {
                $errors['email'][] = 'Email is required';
              }
              if (empty($password)) {
                $errors['password'][] = 'Password is required';
              }
              
              // Check if there are any errors
              if (empty($errors['email']) && empty($errors['password'])) {
                // Check if email and password match as an user
                $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  $user = $result->fetch_assoc();
                 
                  // Verify the password
                  if (password_verify($password, $user['password'])) {
                    // Password is correct, store user data in the session
                    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND user_role = 0");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                      $stmt = $conn->prepare("SELECT user_id FROM users WHERE email=?");
                      $stmt->bind_param("s", $email);
                      $stmt->execute();
                      $result = $stmt->get_result();
                      $row = $result->fetch_assoc(); // Fetch the result row as an associative array
                      $_SESSION['user_id'] = $row['user_id']; // Access the user_id column value
                      $_SESSION['email'] = $user['email'];
                      //$_SESSION['log'] = true;
                      $SQL = "UPDATE users SET is_active = 1 WHERE user_id = '" . $_SESSION['user_id'] . "' OR email = '" . $_SESSION['email'] . "'";
                      $result = $conn->query($SQL);
                      // Generate a token for the user session
                      $token = bin2hex(random_bytes(16));
                      $_SESSION['token'] = $token;
                      $_SESSION['token_expiration'] = time() + 3600; // 1 hour expiration
          
                      // Redirect the user to the index page
                      header("location: ../mainpage/index.php");
                      exit();
                    } else {
                      $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND user_role = 1");
                      $stmt->bind_param("s", $email);
                      $stmt->execute();
                      $result = $stmt->get_result();

                      if ($result->num_rows > 0) {
                        $admin_email = $_POST['email'];
                        $admin_password = $_POST['password'];
                        $admin_token_name = 'admin_token$589jydu567rjedny';
                        $admin_token_expiration = 3600; // 1 hour expiration time
          
                        // Set the admin token and expiration time
                        $_SESSION[$admin_token_name] = $admin_token_name;
                        $_SESSION[$admin_token_name . '_expiration'] = time() + $admin_token_expiration;
                        $stmt = $conn->prepare("SELECT user_id FROM users WHERE email=? AND user_role = 1");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        // Set the admin ID and username
                        $_SESSION['admin_id'] = $row['user_id'];
                        $_SESSION['admin_email'] = $admin_email;
                        $SQL = "UPDATE users SET is_active = 1 WHERE user_id = '" . $_SESSION['admin_id'] . "'OR email = '" . $_SESSION['email'] . "'";
                        $result = $conn->query($SQL);

                        // Redirect to the admin panel
                        header("location: ../adminpanel/admin.php");
                        exit();

                      } 
                    }
                  } else{
                    $password_errors = false;
                  }
                }else {
                  $errors['email'][] = "Email not found";
                }
              }
            }
          }
          ?>



          <form method="POST" id="signup-form" class="signup-form" action="login.php">
            <h2 class="form-title">Log in</h2>
            <div class="form-group">
              <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" />
              <?php if (!empty($errors['email'])) { ?>
                <div style="color: red;" class="alert alert-danger">
                  <?php foreach ($errors['email'] as $error) { ?>
                    <?= htmlspecialchars($error) ?><br>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>

            <div class="form-group">
              <input type="password" class="form-input" name="password" id="password" placeholder="Password" />
              <i toggle="#password" class="fa-regular fa-eye-slash field-icon toggle-password">
              </i>
              <?php
                  
                  if (!empty($errors['password']) || $password_errors == false) { ?>
                    <div style="color: red;" class="alert alert-danger">
                      <?php foreach ($errors['password'] as $error) { ?>
                        <?= htmlspecialchars($error) ?><br>
                      <?php } ?>             
                      <?php if ($password_errors == false) {?>
                        <div style="color: red;"><?php echo "Incorrect password";?></div>
                      <?php }?>
                    </div>
                  <?php } ?>
            </div>

            <div class="form-group">
              <label class="label-agree-term"><span><span></span></span>Forgot your
                <a href="#" class="term-service">Password?</a></label>
              <span></span><span></span>
              <label class="label-guest-term">
                Continue as a
                <a href="../mainPage/index.php" class="loginhere-link">Guest</a>
              </label>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" id="submit" class="form-submit" value="Log in" />
            </div>
          </form>
          <p class="loginhere">
            Don't have an account ?
            <a href="../signup/signup.php" class="loginhere-link">Signup here</a>
          </p>
        </div>
      </div>
    </section>
  </div>

  <script src="../signup/main.js"></script>
</body>

</html>



</html>

