<?php
include "../signup/connect.php";
require_once '../signup/auth.php';

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
$stmt = $conn->prepare("SELECT sc.product_id, sc.quantity, sc.price, p.image_url_1 FROM shoppingcart sc JOIN products p ON sc.product_id = p.product_id WHERE sc.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

// Process checkout form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $stmt = $conn->prepare("INSERT INTO orders (user_id, total_price) VALUES (?, ?)");
    $stmt->bind_param("id", $user_id, $total_price);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) SELECT ?, product_id, quantity, price FROM shoppingcart WHERE user_id = ?");
    $stmt->bind_param("ii", $order_id, $user_id);
    $stmt->execute();

    $stmt = $conn->prepare("DELETE FROM shoppingcart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    header("Location: order_confirmation.php?order_id=" . $order_id);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Checkout</title>

<head>
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
                                    $stmt = $conn->prepare("SELECT address, phone_number, Street, City, Country, Postal_Code FROM users WHERE user_id =?");
                                    $stmt->bind_param("i", $user_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        if (!empty($row)) {
                                            if (!empty($row['address']) && !empty($row['phone_number']) && !empty($row['Street']) && !empty($row['City']) && !empty($row['Country']) && !empty($row['Postal_Code'])) {

                                                // User has entered address information, display it in the checkout form
                                                $phone_number = $row['phone_number'];
                                                $address = $row['address'];
                                                $street = $row['Street'];
                                                $city = $row['City'];
                                                $country = $row['Country'];
                                                $postal_code = $row['Postal_Code'];

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
                                                <div class='col-sm-4 mb-3'>
                                                    <label class='mb-0' for='country'>Country</label>
                                                    <select class='form-select' name='country'>
                                                        <option value='$country'>$country</option>
                                                        <!-- add other country options dynamically here -->
                                                    </select>
                                                </div>
                                                <div class='col-sm-4 col-6 mb-3'>
                                                    <label for='mb-0'>Postal Code</label>
                                                    <div class='form-outline'>
                                                        <input type='text' id='postal_code' name='postal_code' value='$postal_code' class='form-control' />
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <input type='checkbox' id='edit_address' name='edit_address' value='1' />
                                                    <label for='edit_address'>Edit Address</label>
                                                </div>
                                                </div>";
                                            } else {
                                                // User has not entered address information, display a message
                                                echo "<p>You need to enter your address information to complete the checkout process.</p>";
                                                // Display address form fields
                                                echo "<div class='row'>
                                                <div class='col-6 mb-3'>
                                                    <p class='mb-0'>Phone</p>
                                                    <div class='form-outline'>
                                                        <input type='tel' id='typePhone' name='phone_number' class='form-control' required />
                                                    </div>
                                                </div>
                                                <div class='col-sm-8 mb-3'>
                                                    <p class='mb-0'>Address</p>
                                                    <div class='form-outline'>
                                                        <input type='text' id='typeText' placeholder='Type here' name='address' class='form-control' required />
                                                    </div>
                                                </div>
                                                <div class='col-sm-8 mb-3'>
                                                    <p class='mb-0'>Street</p>
                                                    <div class='form-outline'>
                                                        <input type='text' id='street' placeholder='Type here' name='street' class='form-control' required />
                                                    </div>
                                                </div>
                                                <div class='col-sm-8 mb-3'>
                                                    <p class='mb-0'>City</p>
                                                    <div class='form-outline'>
                                                        <input type='text' id='typeText' placeholder='Type here' name='city' class='form-control' required />
                                                    </div>
                                                </div>
                                                <div class='col-sm-4 mb-3'>
                                                    <label class='mb-0' for='country'>Country</label>
                                                    <select class='form-select' name='country' required>
                                                        <option value=''>Select a country</option>
                                                        <!-- add other country options dynamically here -->
                                                    </select>
                                                </div>
                                                <div class='col-sm-4 col-6 mb-3'>
                                                    <label for='mb-0'>Postal Code</label>
                                                    <div class='form-outline'>
                                                        <input type='text' id='postal_code' name='postal_code' class='form-control' required />
                                                    </div>
                                                </div>
                                                </div>";
                                            }
                                        }
                                    } else {
                                        echo "<p>Error fetching address information.</p>";
                                    }
                                    ?>
                                    <hr class="my-4" />
                                    <h5 class="card-title mb-3">Payment</h5>
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <p class="mb-0">Name on card</p>
                                            <div class="form-outline">
                                                <input type="text" id="typeName" class="form-control" placeholder="John Smith" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <p class="mb-0">Card number</p>
                                            <div class="form-outline">
                                                <input type="text" id="typeText" class="form-control" placeholder="0000 0000 0000 0000" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <p class="mb-0">Expiration</p>
                                            <div class="form-outline">
                                                <input type="text" id="typeExp" class="form-control" placeholder="MM/YYYY" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <p class="mb-0">Cvv</p>
                                            <div class="form-outline">
                                                <input type="password" id="typeText" class="form-control" placeholder="&#9679;&#9679;&#9679;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 mb-3">
                                        <label class="mb-0" for="payment_method">Payment Method</label>
                                        <select class="form-select" name="payment_method" required>
                                            <option value="">Select a payment method</option>
                                            <option value="visa">Visa</option>
                                            <option value="mastercard">MasterCard</option>
                                            <option value="paypal">PayPal</option>
                                            <option value="cod">Cash on Delivery</option>
                                            <!-- add other payment methods dynamically here -->
                                        </select>
                                    </div>
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-primary">Checkout</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 d-flex justify-content-center mb-4">
                        <div class="ms-lg-4 mt-4 mt-lg-0">
                            <h6 class="mb-3">Items in cart</h6>
                            <?php
                            foreach ($cart_items as $item) {
                                $product_id = $item['product_id'];
                                $quantity = $item['quantity'];
                                $price = $item['price'];
                                $image = $item['image_url_1'];
                                $subtotal = $quantity * $price;
                                echo "<div class='d-flex justify-content-between mb-2'>
                                <img src='$image' alt='Product Image' style='width: 50px; height: 50px;' />
                                <p>Product ID: $product_id</p>
                                <p>Quantity: $quantity</p>
                               
                                <p>Price: $$price</p>
                                <p>Subtotal: $$subtotal</p>
                                </div>";
                            }
                            ?>
                            <hr />
                            <h6 class="mb-3">Summary</h6>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2">$<?php echo number_format($total_price, 2); ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Shipping:</p>
                                <p class="mb-2">Free</p>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total:</p>
                                <p class="mb-2 fw-bold">$<?php echo number_format($total_price, 2); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybAq4K7fkQbzeVVp4FL8hFndO/UgJJkBxFQYTB5p2HUFI2zK" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QFh6iPtN95mX5Wm0daWvuzRrnE+j1Q4ix1q0EjxD6ljlQoTu45+2wp17/Q4t7T2e" crossorigin="anonymous"></script>
</body>

</html>


