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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="../mainPage/styles.css" />
  <link rel="stylesheet" href="../navbar/navbar.css" />
  <link rel="stylesheet" href="../footer/footer.css" />
  <link rel="stylesheet" href="../products/products.css" />
  <link rel="stylesheet" href="../cart/cart.css" />
</head>

<body loading="lazy">

  <?php
  include("../navbar/navbar.php");
  ?>

  <main>
    <div class="small-container cart-page">
      <table>
        <tr>
          <th>Products</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <tr>
          <td>
            <div class="cart-info">
              <img src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_3.jpg" alt="" />
              <div>
                <p>
                  Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070
                  165hz 16
                </p>
                <small>Price: $2,199.99</small><br />
                <a href="">Remove</a>
              </div>
            </div>
          </td>
          <td><input type="number" value="1" /></td>
          <td><label>$2,199.99</label></td>
        </tr>
        <tr>
          <td>
            <div class="cart-info">
              <img src="../images/productsImages/monitors/AOC 27 C27G2Z 240hz 0.5ms 1500r Curved Gaming Monitor/AOCC27G2Z_1.jpg" alt="" />
              <div>
                <p>AOC 27 C27G2Z 240hz 0.5ms Curved Gaming Monitor</p>
                <small>Price: $199.99</small><br />
                <a href="">Remove</a>
              </div>
            </div>
          </td>
          <td><input type="number" value="1" /></td>
          <td><label>$199.99</label></td>
        </tr>
        <tr>
          <td>
            <div class="cart-info">
              <img src="../images/productsImages/desktops/Alienware Aurora Core i7-9700k Desktop Computers/AlienwareAurora_1_8e83c8aa-63b1-42f7-a20d-65c63b2f1c4b.jpg" alt="" />
              <div>
                <p>Alienware Aurora Core i7-9700k Desktop Computers</p>
                <small>Price: $1,499.99</small><br />
                <a href="">Remove</a>
              </div>
            </div>
          </td>
          <td><input type="number" value="1" min="0" /></td>
          <td><label>$1,499.99</label></td>
        </tr>
      </table>

      <div class="total-price">
        <table>
          <tr>
            <td>Subtotal</td>
            <td>$3900.00</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>$35.00</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>$3935.00</td>
          </tr>
          <tr>
            <td>
              <a href="../checkout/checkout.html">
                <button class="checkout-btn">Checkout</button>
              </a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </main>
  <footer class="footer">
    <div class="box">
      <h2>Links</h2>
      <ul class="links">
        <li><a href="../links/privacyPolicy.php"> Privacy Policy </a></li>
        <li>
          <a href="../links/shippingPolicy.php"> Shipping Policy </a>
        </li>
        <li>
          <a href="../links/termsOfService.php"> Terms of Services </a>
        </li>
        <li><a href="../links/refundPolicy.php"> Refund Policy </a></li>
      </ul>
    </div>
    <div class="box">
      <h2 class="footertitle">𝔖𝔞𝔥𝔢𝔩𝔗𝔯𝔬𝔫𝔦𝔵</h2>
      <form action="../signup/signup.php" class="registration">
        <button type="submit" class="btn-signin">Sign Up Now</button>
      </form>
    </div>
    <div class="box">
      <h2>Address</h2>
      <p class="address">
        <br />
        Sahel Alma , Lebanon<br />
        Next To Jamil Market<br />
      </p>
      <ul class="social">
        <li><i class="fa-brands fa-facebook"></i></li>
        <li><i class="fa-brands fa-twitter"></i></li>
        <li><i class="fa-brands fa-instagram"></i></li>
        <li><i class="fa-brands fa-youtube"></i></li>
      </ul>
    </div>
  </footer>
  <script src="../index.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script src="cart.js"></script>
</body>

</html>