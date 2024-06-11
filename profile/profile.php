<?php
include "../signup/connect.php";
require_once '../signup/auth.php';

// Retrieve user's email from the session
$email = $_SESSION['email'];

// Fetch user information from the database
$query = $conn->prepare("SELECT first_name, last_name, email, address, Street, City, Country, Postal_Code, phone_number FROM users WHERE email=?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_assoc();

// Set session variables
$_SESSION['first_name'] = $row['first_name'];
$_SESSION['last_name'] = $row['last_name'];
$current_email = $row['email'];
$address = $row['address'];
$street = $row['Street'];
$city = $row['City'];
$country = $row['Country'];
$postal_code = $row['Postal_Code'];
$phone = $row['phone_number'];

$new_first_name = $_SESSION['first_name'] ?? '';
$new_last_name = $_SESSION['last_name'] ?? '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"]) && $_POST["submit"] == "Save") {
        // Retrieve submitted data
        $new_email = $_POST["email"];
        $new_first_name = $_POST["first_name"];
        $new_last_name = $_POST["last_name"];
        $new_address = $_POST["address"];
        $new_street = $_POST["street"];
        $new_city = $_POST["city"];
        $new_country = $_POST["country"];
        $new_postal_code = $_POST["postal_code"];
        $new_phone = $_POST["phone"];

        // Validate email
        if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $errors1['email'][] = "Invalid email format";
        }

        // Update user information if valid
        if (empty($errors1)) {
            $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, address=?, Street=?, City=?, Country=?, Postal_Code=?, phone_number=? WHERE email=?");
            $stmt->bind_param("sssssssiis", $new_first_name, $new_last_name, $new_email, $new_address, $new_street, $new_city, $new_country, $new_postal_code, $new_phone, $email);
            $stmt->execute();
            $stmt->close();
            
            // Update session variables
            $_SESSION['email'] = $new_email;
            $_SESSION['first_name'] = $new_first_name;
            $_SESSION['last_name'] = $new_last_name;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="profile.css" />
</head>

<body>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="font-weight-bold">Account Settings</h4>
            </div>
            <div class="card-body">
                <form method="POST" class="form-group" action="profile.php">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo isset($new_first_name) ? $new_first_name : ''; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo isset($new_last_name) ? $new_last_name : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">E-mail</label>
                        <input type="text" name="email" class="form-control mb-1" value="<?php echo htmlspecialchars($current_email); ?>">
                        <?php if (!empty($errors1['email'])) { ?>
                            <div class="alert alert-danger mt-2">
                                <?php foreach ($errors1['email'] as $error) {
                                    echo $error;
                                } ?>
                            </div>
                        <?php } ?>
                        <div class="alert alert-warning mt-3">
                            Your email is not confirmed. Please check your inbox.<br />
                            <a href="javascript:void(0)">Resend confirmation</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3"><?php echo htmlspecialchars($address); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Street</label>
                        <input type="text" name="street" class="form-control" value="<?php echo htmlspecialchars($street); ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control" value="<?php echo htmlspecialchars($city); ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Country</label>
                        <select name="country" class="custom-select">
                            <option>USA</option>
                            <option>Canada</option>
                            <option>UK</option>
                            <option>Germany</option>
                            <option>France</option>
                            <option selected>Lebanon</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" value="<?php echo htmlspecialchars($postal_code); ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" />
                </form>
            </div>
        </div>

        <!-- Change Password Section -->
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="font-weight-bold">Change Password</h4>
            </div>
            <div class="card-body">
                <?php
                $errors = array(
                    'current_password' => array(),
                    'password' => array(),
                    're_password' => array(),
                    'general' => array()
                );

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["submit"]) && $_POST["submit"] == "Save changes") {
                        $current_password = $_POST["current_password"];
                        $password = $_POST["password"];
                        $re_password = $_POST["re_password"];

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
                        if ($password !== $re_password) {
                            $errors['general'][] = 'Passwords do not match';
                        }

                        if (count($errors) == 0) {
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
                                    echo "Your password has been successfully changed!";
                                } else {
                                    echo "Error:" . $conn->error;
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
                    <?php if (!empty($errors['current_password'])) { ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors['current_password'] as $error) { ?>
                                <?= htmlspecialchars($error) ?><br>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label class="form-label">New password</label>
                        <input type="password" name="password" class="form-control" />
                        <?php if (!empty($errors['password'])) { ?>
                            <div class="alert alert-danger">
                                <?php foreach ($errors['password'] as $error) { ?>
                                    <?= htmlspecialchars($error) ?><br>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Repeat new password</label>
                        <input type="password" name="re_password" class="form-control" />
                        <?php if (!empty($errors['re_password'])) { ?>
                            <div class="alert alert-danger">
                                <?php foreach ($errors['re_password'] as $error) { ?>
                                    <?= htmlspecialchars($error) ?><br>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>

                    <?php if (!empty($errors['general'])) { ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors['general'] as $error) { ?>
                                <?= htmlspecialchars($error) ?><br>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
                </form>
            </div>
        </div>

        <!-- Order Tracking Section -->
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="font-weight-bold">Track My Order</h4>
            </div>
            <div class="card-body" id="order-tracking">
                <p>Enter your order ID to track the status of your order.</p>
                <input type="text" id="order-id" class="form-control" placeholder="Enter your order ID" />
                <button id="track-btn" class="btn btn-primary mt-3">
                    Track Order
                </button>

                <div id="order-details" class="hidden mt-3">
                    <h2>Order Details</h2>
                    <p>Order ID: <span id="order-id-display"></span></p>
                    <p>Status: <span id="order-status"></span></p>
                    <p>Estimated Delivery Date: <span id="delivery-date"></span></p>
                    <p>Tracking Number: <span id="tracking-number"></span></p>
                    <p>Shipping Carrier: <span id="shipping-carrier"></span></p>
                </div>
            </div>
        </div>

        <!-- Notifications Section -->
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="font-weight-bold">Notifications</h4>
            </div>
            <div class="card-body">
                <h6 class="mb-4">Activity</h6>
                <div class="form-group">
                    <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label">Email me when products are back on stock.</span>
                    </label>
                </div>
                <div class="form-group">
                    <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label">Email me when special products drop.</span>
                    </label>
                </div>
                <div class="form-group">
                    <label class="switcher">
                        <input type="checkbox" class="switcher-input" />
                        <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label">Email me when products are on sale.</span>
                    </label>
                </div>
                <hr class="border-light m-0" />
                <h6 class="mb-4">Application</h6>
                <div class="form-group">
                    <label class="switcher">
                        <input type="checkbox" class="switcher-input" checked />
                        <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label">News and announcements</span>
                    </label>
                </div>
                <div class="form-group">
                    <label class="switcher">
                        <input type="checkbox" class="switcher-input" />
                        <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                        </span>
                        <span class="switcher-label">Weekly product updates</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="text-right mt-3">
            <a href="../mainPage/index.php"><button type="button" class="btn btn-danger">Back</button></a>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="profile.js"></script>
</body>

</html>
