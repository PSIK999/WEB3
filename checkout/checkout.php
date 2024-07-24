<?php
include "../signup/connect.php";
require_once '../signup/auth.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

require '../vendor/autoload.php';

$user_id = $_SESSION['user_id'];

// Calculate the total price
$total_price = 0;
$stmt = $conn->prepare("SELECT SUM(price * quantity) AS total FROM shoppingcart WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$total_price = $row['total'];
$_SESSION['total_price'] = $total_price;

// Get cart items
$cart_items = [];
$stmt = $conn->prepare("SELECT sc.product_id, sc.quantity, sc.price, p.image_url_1, p.name FROM shoppingcart sc JOIN products p ON sc.product_id = p.product_id WHERE sc.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

// Process checkout form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sender"])) {
    $user_id = $_SESSION['user_id'];
    $total_price = $_SESSION['total_price'];

    // Update user's address information if 'edit_address' is checked
    if (isset($_POST['edit_address'])) {
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postal_code = $_POST['postal_code'];

        $stmt = $conn->prepare("UPDATE users SET address = ?, Country = ?, Street = ?, City = ?, phone_number = ?, Postal_Code = ? WHERE user_id = ?");
        $stmt->bind_param("ssssiii", $address, $country, $street, $city, $phone_number, $postal_code, $user_id);
        $stmt->execute();
    }

    // Store country in session for shipping cost calculation
    $_SESSION['country'] = $country;

    $stmt = $conn->prepare("INSERT INTO orders (user_id, total_price, order_date) VALUES (?, ?, NOW())");
    $stmt->bind_param("id", $user_id, $total_price);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) SELECT ?, product_id, quantity, price FROM shoppingcart WHERE user_id = ?");
    $stmt->bind_param("ii", $order_id, $user_id);
    $stmt->execute();

    $stmt = $conn->prepare("DELETE FROM shoppingcart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Send confirmation email
    $name = $_SESSION['username'];
    $email = $_SESSION['email'];
    $message = "<h1>Order Confirmation</h1>";
    $message .= "<p>Thank you for your order. Here are the details:</p>";
    $message .= "<p>Total Price: $" . number_format($total_price, 2) . "</p>";
    $message .= "<p>Items:</p><ul>";
    foreach ($cart_items as $item) {
        $message .= "<li>" . $item['name'] . " (Quantity: " . $item['quantity'] . ", Price: $" . $item['price'] . ")</li>";
    }
    $message .= "</ul>";

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sicha1232020@gmail.com';
        $mail->Password   = 'qajb jqll efys rncb'; // Use your App Password here not your password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->setFrom('saheltronix@gmail.com' , $name);
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Order Confirmation';
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


    // Redirect to orders.php after successful order placement
    header("Location: ../orders/orders.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../navbar/navbar.css" />
    <link rel="stylesheet" href="../footer/footer.css" />
</head>
<body loading="lazy">
    <?php include ("../navbar/navbar.php"); ?>

    <main>
        <section class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow-0 border">
                            <div class="p-4">
                                <h5 class="card-title mb-3">Guest checkout</h5>
                                <form method="POST" action="checkout.php">
                                    <?php
                                    $stmt = $conn->prepare("SELECT address, phone_number, Street, City, Country, Postal_Code FROM users WHERE user_id = ?");
                                    $stmt->bind_param("i", $user_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        if (!empty($row)) {
                                            $phone_number = htmlspecialchars($row['phone_number']);
                                            $address = htmlspecialchars($row['address']);
                                            $street = htmlspecialchars($row['Street']);
                                            $city = htmlspecialchars($row['City']);
                                            $country = htmlspecialchars($row['Country']);
                                            $postal_code = htmlspecialchars($row['Postal_Code']);

                                            // Display address information in the checkout form
                                            echo "<div class='row'>
                                            <div class='col-6 mb-3'>
                                                <p class='mb-0'>Phone</p>
                                                <div class='form-outline'>
                                                    <input type='tel' id='typePhone' name='phone_number' value='$phone_number' class='form-control' />
                                                </div>
                                            </div>
                                            <div class='col-sm-8 mb-3'>
                                                <p class='mb-0'>Address</p>
                                                <div class='form-outline'>
                                                    <input type='text' id='typeText' placeholder='Type here' name='address' class='form-control' value='$address' />
                                                </div>
                                            </div>
                                            <div class='col-sm-8 mb-3'>
                                                <p class='mb-0'>Street</p>
                                                <div class='form-outline'>
                                                    <input type='text' id='street' placeholder='Type here' name='street' value='$street' class='form-control' />
                                                </div>
                                            </div>
                                            <div class='col-sm-8 mb-3'>
                                                <p class='mb-0'>City</p>
                                                <div class='form-outline'>
                                                    <input type='text' id='typeText' placeholder='Type here' name='city' value='$city' class='form-control' />
                                                </div>
                                            </div>
                                            <div class='col-sm-8 mb-3'>
                                                <p class='mb-0'>Country</p>
                                                <div class='form-outline'>
                                                    <input type='text' id='typeText' placeholder='Type here' name='country' value='$country' class='form-control' />
                                                </div>
                                            </div>
                                            <div class='col-sm-8 mb-3'>
                                                <p class='mb-0'>Postal Code</p>
                                                <div class='form-outline'>
                                                    <input type='text' id='typeText' placeholder='Type here' name='postal_code' value='$postal_code' class='form-control' />
                                                </div>
                                            </div>
                                            </div>";
                                        }
                                    }
                                    ?>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="edit_address" id="edit_address">
                                        <label class="form-check-label" for="edit_address">
                                            Edit address
                                        </label>
                                    </div>
                                    
                                    <button type="submit" name="sender" class="btn btn-primary w-100">Place Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="card mb-4 w-100 shadow-0 border">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Summary</h5>
                                <span>Total price: $<?php echo number_format($total_price, 2); ?></span>
                                <div class="d-flex justify-content-between mt-3 mb-3">
                                    <span>Tax:</span>
                                    <span>$0.00</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span>Shipping:</span>
                                    <span>$0.00</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span>Total price:</span>
                                    <strong class="price">$<?php echo number_format($total_price, 2); ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include ("../footer/footer.php"); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-t5oFbNnNQaUbwGA2rtEIzKzED3b6A9l1Shf0tRk1R9+fyKxjDE+H86ttt8AuDLa/" crossorigin="anonymous"></script>
</body>
</html>

