<?php
include "../signup/connect.php";
require_once '../signup/auth.php';


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Profile </title>
    <link rel="stylesheet" href="profile.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    <main>
      <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>
        <div class="card overflow-hidden">
          <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
              <div class="list-group list-group-flush account-settings-links">
                <a
                  class="list-group-item list-group-item-action active"
                  data-toggle="list"
                  href="#account-general"
                  >General</a
                >
                <a
                  class="list-group-item list-group-item-action"
                  data-toggle="list"
                  href="#account-change-password"
                  >Change password</a
                >
                <a
                  class="list-group-item list-group-item-action"
                  data-toggle="list"
                  href="#account-info"
                  >Info</a
                >
                <a
                  class="list-group-item list-group-item-action"
                  data-toggle="list"
                  href="#Orders-history"
                  >Orders history</a
                >
                <a
                  class="list-group-item list-group-item-action"
                  data-toggle="list"
                  href="#account-notifications"
                  >Notifications</a
                >
              </div>
            </div>
            <div class="col-md-9">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="account-general">
                  <hr class="border-light m-0" />
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <label class="form-label">First Name</label>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="<?php  $email = $_SESSION['email'];
                                              $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                                              while ($row = mysqli_fetch_array($query)) {
                                              echo $row['first_name'] ; } ?>">
                      </div>
                      <div class="col-md-6">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="<?php  $email = $_SESSION['email'];
                                              $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                                              while ($row = mysqli_fetch_array($query)) {
                                              echo $row['last_name'] ; } ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">E-mail</label>
                      <input
                        type="text"
                        class="form-control mb-1"
                        placeholder="<?php  $email = $_SESSION['email'];
                                              $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                                              while ($row = mysqli_fetch_array($query)) {
                                              echo $row['email'] ; } ?>">
                      <div class="alert alert-warning mt-3">
                        Your email is not confirmed. Please check your inbox.<br />
                        <a href="javascript:void(0)">Resend confirmation</a>
                      </div>
                    </div>
                    <div>
                      <section id="order-tracking">
                        <h1>Track My Order</h1>
                        <p>
                          Enter your order ID to track the status of your order.
                        </p>
                        <input
                          type="text"
                          id="order-id"
                          placeholder="Enter your order ID"
                        />
                        <button id="track-btn">
                          Track Order<span class="arrow"></span>
                        </button>

                        <div id="order-details" class="hidden">
                          <h2>Order Details</h2>
                          <p>Order ID: <span id="order-id-display"></span></p>
                          <p>Status: <span id="order-status"></span></p>
                          <p>
                            Estimated Delivery Date:
                            <span id="delivery-date"></span>
                          </p>
                          <p>
                            Tracking Number: <span id="tracking-number"></span>
                          </p>
                          <p>
                            Shipping Carrier:
                            <span id="shipping-carrier"></span>
                          </p>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>


                <div class="tab-pane fade" id="account-change-password">
                  <div class="card-body pb-2">
                    <?php
                    $errors = array(
                      'current_password' => array(),
                      'password' => array(),
                      'e_password' => array(),
                      'general' => array()
                    );

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      if (isset($_POST["submit"]) && $_POST["submit"] == "Save changes") {
                        $current_password = $_POST["current_password"];
                        $password = $_POST["password"];
                        $re_password = $_POST["re_password"];

                        //Check if user is logged in
                        if (!isset($_SESSION['email'])) {
                          $errors['general'][] = 'You must be logged in to change your password';
                        }

                        // Validate current password
                        if (empty($current_password)) {
                          $errors['current_password'][] = 'Current password is required ';
                        } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/', $current_password)) {
                          $errors['current_password'][] = 'Your Current password must be at least 12 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character';
                        }

                        // Validate new password
                        if (empty($password)) {
                          $errors['password'][] = 'New password is required';
                        } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/', $password)) {
                          $errors['password'][] = 'Your New password must be at least 12 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character';
                        }

                        // Validate re-entered password
                        if (empty($re_password)) {
                          $errors['re_password'][] = 'Re-entered password is required';
                        } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/', $re_password)) {
                          $errors['re_password'][] = 'Your Re-entered password must be at least 12 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character';
                        }

                        // Check if passwords match
                        if ($password!== $re_password) {
                          $errors['general'][] = 'Passwords do not match';
                        }

                        if (count($errors) == 0) {
                          $email = $_SESSION['email'];
                          $stmt = $conn->prepare("SELECT password FROM users WHERE email=?");
                          $stmt->bind_param("s", $email);
                          $stmt->execute();
                          $result = $stmt->get_result();
                          $row = $result->fetch_assoc();

                          // Get the stored password hash from the database
                          $stored_password_hash = $row['password'];

                          // Verify the password hash using password_verify()
                          if (password_verify($current_password, $stored_password_hash)) {
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            $stmt = $conn->prepare("UPDATE users SET password =? WHERE email =?");
                            $stmt->bind_param("ss", $hashed_password, $email);

                            if ($stmt->execute()) {
                              echo "Your password has been succesfully changed!";
                            } else {
                              echo "Error:". $conn->error;
                            }
                          } else {
                            echo "The password you entered is not your current password.";
                          }
                        }
                      }
                    }
                  ?>

                    <form method="POST" class="form-group" action="profile.php">
                      <label class="form-label">Current password</label>
                      <input type="password" name="current_password" class="form-control" />             
                      <?php if (!empty($errors['current_password'])) {?>
                        <div class="alert alert-danger">
                          <?php foreach ($errors['current_password'] as $error) {?>
                            <?= htmlspecialchars($error)?><br>
                          <?php }?>
                        </div>
                      <?php }?>

                      <div class="form-group">
                        <label class="form-label">New password</label>
                        <input type="password" name="password" class="form-control" />
                        <?php if (!empty($errors['password'])) {?>
                          <div class="alert alert-danger">
                            <?php foreach ($errors['password'] as $error) {?>
                              <?= htmlspecialchars($error)?><br>
                            <?php }?>
                          </div>
                        <?php }?>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Repeat new password</label>
                        <input type="password" name="re_password" class="form-control" />
                        <?php if (!empty($errors['re_password'])) {?>
                          <div class="alert alert-danger">
                            <?php foreach ($errors['re_password'] as $error) {?>
                              <?= htmlspecialchars($error)?><br>
                            <?php }?>
                          </div>
                        <?php }?>
                      </div>

                      <?php if (!empty($errors['general'])) {?>
                        <div class="alert alert-danger">
                          <?php foreach ($errors['general'] as $error) {?>
                            <?= htmlspecialchars($error)?><br>
                          <?php }?>
                        </div>
                      <?php }?>

                      <input type="submit" name="submit" class="btn btn-primary" value="Save changes"/>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="account-info">
                  <div class="card-body pb-2">
                    <div class="form-group">
                      <label class="form-label">Adresse</label>
                      <textarea
                        class="form-control"
                        rows="5"
                        style="resize: none"
                      >
 Mount lebanon , sahel alma , next to jamil market.</textarea
                      >
                    </div>
                    <div class="form-group">
                      <label class="form-label">Street</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="next to jamil market"
                      />
                    </div>
                    <div class="form-group">
                      <label class="form-label">City</label>
                      <input type="text" class="form-control" placeholder="sahel alma" />
                    </div>
                    <div class="form-group">
                      <label class="form-label">Country</label>
                      <select class="custom-select">
                        <option>USA</option>
                        <option>Canada</option>
                        <option>UK</option>
                        <option>Germany</option>
                        <option>France</option>
                        <option selected>lebanon</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Postal Code</label>
                      <input type="text" class="form-control" placeholder="1200" />
                    </div>
                  </div>
                  <hr class="border-light m-0" />
                  <div class="card-body pb-2">
                    <h6 class="mb-4">Contacts</h6>
                    <div class="form-group">
                      <label class="form-label">Phone</label>
                      <input
                        type="text"
                        class="form-control"
                        value="+961 81 381 666"
                      />
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="Orders-history">
                  <div class="card-body pb-2">
                    <div class="row">
                      <div class="col-md-6">
                        <h4>Orders</h4>
                        <table>
                          <tr>
                            <th>Order Date</th>
                            <th>Order Number</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Shipping</th>
                          </tr>
                          <tr>
                            <td>5/5/2024</td>
                            <td>1234567890</td>
                            <td>$350.50</td>
                            <td>Order Shipped</td>
                            <td>Track Shipping</td>
                          </tr>
                          <tr>
                            <td>4/5/2024</td>
                            <td>7546473756</td>
                            <td>$200.00</td>
                            <td>Order Shipped</td>
                            <td>Track Shipping</td>
                          </tr>
                          <tr>
                            <td>19/4/2022</td>
                            <td>0103554775</td>
                            <td>$750.00</td>
                            <td>Order Recived</td>
                            <td>--</td>
                          </tr>
                          <tr>
                            <td>15/11/2019</td>
                            <td>0016358936</td>
                            <td>$455.55</td>
                            <td>Order Recived</td>
                            <td>--</td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <div class="order"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="account-notifications">
                  <div class="card-body pb-2">
                    <h6 class="mb-4">Activity</h6>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >Email me when products are back on stock.</span
                        >
                      </label>
                    </div>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >Email me when special products drops.</span
                        >
                      </label>
                    </div>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >Email me when products are on sale.</span
                        >
                      </label>
                    </div>
                  </div>
                  <hr class="border-light m-0" />
                  <div class="card-body pb-2">
                    <h6 class="mb-4">Application</h6>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >News and announcements</span
                        >
                      </label>
                    </div>
                    <div class="form-group">
                      <label class="switcher">
                        <input type="checkbox" class="switcher-input" />
                        <span class="switcher-indicator">
                          <span class="switcher-yes"></span>
                          <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label"
                          >Weekly product updates</span
                        >
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-right mt-3">
          <!-- <input type="submit" class="btn btn-primary" value="Save changes"/>-->
           &nbsp;
          <a href="../mainPage/index.php" ><button type="button"  class="btn btn-danger">Back</button></a>
        </div>
      </div>
      <script src="profile.js"></script>
      <script
        data-cfasync="false"
        src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
      ></script>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript"></script>
    </main>
  </body>
</html>






