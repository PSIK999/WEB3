<?php
include "../signup/connect.php";
require_once '../signup/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Project</title>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />


  <link rel="stylesheet" href="../navbar/navbar.css" />
  <link rel="stylesheet" href="../footer/footer.css" />

</head>

<body loading="lazy">

  <?php
  include ("../navbar/navbar.php");
  ?>

  <main>
    <section class="bg-light py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <div class="card shadow-0 border">
              <div class="p-4">
                <h5 class="card-title mb-3">Guest checkout</h5>
                <form method="POST"  action="checkout.php">
                
              

            <?php
            // checkout.php
            
            // Check if user has entered address information in their profile
            $user_id = $_SESSION['user_id'];
            $stmt = $conn->prepare("SELECT address, phone_number, Street, City, Country, Postal_Code FROM users WHERE user_id =?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              if (!empty($row)) {
                if (!empty($row['address']) &&!empty($row['phone_number']) &&!empty($row['Street']) &&!empty($row['City']) &&!empty($row['Country']) &&!empty($row['Postal_Code'])) {

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
            <p class='mb-0'>address</p>
              <div class='form-outline'>
                <input type='text' id='typeText' placeholder='Type here' name='address' class='form-control' value='$address'/>
              </div>
          </div>

        <div class='col-sm-8 mb-3'>
            <p class='mb-0'>Street</p>
              <div class='form-outline'>
          <input type='text' id='street'  placeholder='Type here' name='street' value='$street' class='form-control' />
        </div>
        <div class='col-sm-8 mb-3'>
            <p class='mb-0'>City</p>
              <div class='form-outline'>
          <input type='text' id='typeText' placeholder='Type here' name='city' value='$city' class='form-control' />
        </div>
        <div class='col-sm-4 mb-3'>
          <label class='mb-0' for='country'>Country</label>
          <select class='form-select' name='country'>
            <option value='$country'>$country</option>
            <!-- other country options -->
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
              echo " <div class='row'>
              <div class='col-6 mb-3'>
                    <p class='mb-0'>Phone</p>
                    <div class='form-outline'>
                      <input type='tel' id='typePhone' name='phone_number' class='form-control' required />
                    </div>
                  </div>
                </div>  
          <div class='col-sm-8 mb-3'>
              <p class='mb-0'>Address</p>
                <div class='form-outline'>
            <input type='text' id='street'  placeholder='Type here' name='address' class='form-control' required />
          </div>
        </div>
        <div class='row'>
        <div class='col-sm-8 mb-3'>
          <label for='street'>Street</label>
          <input type='text' id='street'  placeholder='Type here' name='street' class='form-control' required />
        </div>
        <div class='col-sm-8 mb-3'>
          <label for='city'>City</label>
          <input  type='text' id='typeText' placeholder='Type here' name='city' class='form-control' required />
        </div>
         <div class='col-sm-8 mb-3'>
          <label class='mb-0' for='country'>Country</label>
          <select class='form-select' name='country' required>
            <!-- country options -->
            <option name='country'>Lebanon</option>
          </select>
        </div>
        <div class='col-sm-4 col-6 mb-3'>
          <label for='mb-0'>Postal Code</label>
              <div class='form-outline'>
                  <input type='text' id='postal_code' name='postal_code' class='form-control' required />
              </div>
        </div>
        </div>
        </div>";
            }
          }
        }
            // Process checkout form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Update user's address information in their profile
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
            ?>

            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" />
              <label class="form-check-label" for="flexCheckDefault1">Save this address</label>
            </div>

            <div class="mb-3">
              <p class="mb-0">Message to seller</p>
              <div class="form-outline">
                <textarea class="form-control" id="textAreaExample1" rows="2"></textarea>
              </div>
            </div>

            <div class="float-end">
              <a href="../cart/cart.php"><button class="btn btn-light border">Cancel</button></a>
              <input type="submit" class="btn btn-success shadow-0 border" value="Continue">
            </div>
        </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end">
        <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
          <h6 class="mb-3">Summary</h6>
          <div class="d-flex justify-content-between">
            <p class="mb-2">Total price:</p>
            <p class="mb-2">$<?php echo number_format($_SESSION['total'], 2); ?></p>
          </div>
          <div class="d-flex justify-content-between">
            <p class="mb-2">Discount:</p>
            <p class="mb-2 text-danger">$<?php echo number_format($_SESSION['total'], 2); ?></p>
          </div>
          <div class="d-flex justify-content-between">
            <p class="mb-2">tax:</p>
            <p class="mb-2 text-danger">$<?php echo number_format($_SESSION['tax'], 2); ?></p>
          </div>
          <div class="d-flex justify-content-between">
            <p class="mb-2">Shipping cost:</p>
            <p class="mb-2">0</p>
          </div>
          <hr />
          <div class="d-flex justify-content-between">
            <p class="mb-2">Total price:</p>
            <p class="mb-2 fw-bold">$<?php echo number_format($_SESSION['grand_total'], 2); ?></p>
          </div>

          <div class="input-group mt-3 mb-4">
            <input type="text" class="form-control border" name="" placeholder="Promo code" />
            <button class="btn btn-light text-primary border">Apply</button>
          </div>

          <hr />
          
          <h6 class="text-dark my-4">Items in cart</h6>

          <div class="d-flex align-items-center mb-4">
            <div class="me-3 position-relative">
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                1
              </span>
              <img
                src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_3.jpg"
                style="height: 96px; width: 96x;" class="img-sm rounded border" />
            </div>
            <div class="">
              <a href="#" class="nav-link">
                Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16

              </a>
              <div class="price text-muted">Total: $2199.99</div>
            </div>
          </div>

          <div class="d-flex align-items-center mb-4">
         <?php $_SESSION['cart_html'];?>
            <div class="">
              <a href="#" class="nav-link">
                AOC 27 C27G2Z 240hz 0.5ms Curved Gaming Monitor

              </a>
              <div class="price text-muted">Total: $199.99</div>
            </div>
          </div>

          <div class="d-flex align-items-center mb-4">
            <div class="me-3 position-relative">
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                3
              </span>
              <img
                src="../images/productsImages/desktops/Alienware Aurora Core i7-9700k Desktop Computers/AlienwareAurora_1_8e83c8aa-63b1-42f7-a20d-65c63b2f1c4b.jpg"
                style="height: 96px; width: 96x;" class="img-sm rounded border" />
            </div>
            <div class="">
              <a href="#" class="nav-link">Alienware Aurora Core i7-9700k Desktop Computers</a>
              <div class="price text-muted">Total: $1499.99</div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

  </main>

  <?php
  include ("../footer/footer.php");
  ?>

  <script src="../mainPage/index.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html> 

