<?php
include "../signup/connect.php";
include '../signup/regular_auth.php';
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
  <link rel="stylesheet" href="../aboutus/aboutus.css" />
</head>

<body loading="lazy">

  <?php
  include("../navbar/navbar.php");
  ?>

  <main>
    <div class="writing">
      <div class="section">
        <strong><em>Refund Policy</em></strong>
        <p>
          At Saheltronix, we understand that sometimes products may not meet
          your expectations, and we want to make sure you're fully satisfied
          with your purchase. If you find yourself in a situation where a
          refund is necessary, we're here to assist you through the process.
        </p>
        <p>
          Our refund policy is designed to be fair and straightforward. If
          you're unhappy with your purchase for any reason, please don't
          hesitate to reach out to our dedicated customer service team. We're
          committed to resolving any issues you may encounter promptly and
          professionally.
        </p>
        <p>
          Whether it's a defective product, an incorrect order, or simply a
          change of mind, we'll work with you to find the best solution. Our
          goal is to ensure that you're completely satisfied with every aspect
          of your shopping experience at Saheltronix.
        </p>
        <p>
          Please note that certain conditions may apply to refunds, such as
          the condition of the item and the time elapsed since the purchase.
          Our customer service representatives will provide you with all the
          necessary information and guide you through the refund process with
          ease.
        </p>
        <p>
          Thank you for choosing Saheltronix for your computer needs. We
          appreciate your trust and look forward to serving you again in the
          future.
        </p>
      </div>

      <div class="section">
        <strong><em>Contact Us</em></strong>
        <p>
          If you have any questions or concerns regarding our refund policy,
          please reach out to our dedicated customer service team. We're here
          to assist you with any inquiries you may have. You can contact us
          via email at SahelTronix@gmail.com
        </p>
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
</body>

</html>
