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

    // Calculate shipping cost
    $shipping_cost = ($country === 'Lebanon') ? 3 : 50;
    $total_price += $shipping_cost;

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

    header("Location: my_orders.php");
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
                                            <div class='col-sm-4 mb-3'>
                                                <label class='mb-0' for='country'>Country</label>
                                                <select class='form-select' name='country'>";
                                                
                                                // List of countries
                                                $countries = ["Select a country", "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"];

                                                foreach ($countries as $option_country) {
                                                    $selected = ($country === $option_country) ? "selected" : "";
                                                    echo "<option value='$option_country' $selected>$option_country</option>";
                                                }

                                                echo "</select>
                                            </div>
                                            <div class='col-sm-4 mb-3'>
                                                <p class='mb-0'>Postal Code</p>
                                                <div class='form-outline'>
                                                    <input type='text' id='typeText' placeholder='Type here' name='postal_code' value='$postal_code' class='form-control' />
                                                </div>
                                            </div>
                                            <div class='form-check'>
                                                <input class='form-check-input' type='checkbox' id='editAddressCheckbox' name='edit_address'>
                                                <label class='form-check-label' for='editAddressCheckbox'>Edit Address</label>
                                            </div>
                                            <button type='submit' class='btn btn-primary btn-lg btn-block mt-3'>Place Order</button>
                                        </div>";
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-3 shadow-0 border">
                            <div class="card-body">
                                <h5 class="card-title">Order Summary</h5>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total price:</p>
                                    <p class="mb-2">$<?= number_format($total_price, 2) ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Shipping cost:</p>
                                    <p class="mb-2">$<?= ($country === 'Lebanon') ? 3 : 50 ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total:</p>
                                    <p class="mb-2"><strong>$<?= number_format($total_price + (($country === 'Lebanon') ? 3 : 50), 2) ?></strong></p>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <div class="card shadow-0 border">
                            <div class="card-body">
                                <h5 class="card-title">Items in your cart</h5>
                                <?php
                                if (!empty($cart_items)) {
                                    foreach ($cart_items as $item) {
                                        echo "<div class='d-flex align-items-center mb-4'>
                                        <img src='../products/{$item['image_url_1']}' class='img-fluid' style='width: 70px;' />
                                        <div class='ms-3'>
                                            <h6>{$item['product_id']}</h6>
                                            <p class='small mb-0'>Quantity: {$item['quantity']}</p>
                                            <p class='small mb-0'>Price: {$item['price']}</p>
                                        </div>
                                    </div>";
                                    }
                                } else {
                                    echo "<p class='text-muted'>Your cart is empty.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include ("../footer/footer.php"); ?>
</body>
</html>
