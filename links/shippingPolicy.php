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
        <strong><em>Shipping Policy</em></strong>
        <p>
          Welcome to Saheltronix! We're excited to provide you with
          top-quality computer products and exceptional service. To ensure a
          smooth shopping experience, please review our shipping policy below:
        </p>
      </div>

      <div class="section">
        <strong><em>Processing Time</em></strong>
        <p>
          Orders are typically processed and shipped within 3-5 business days
          after payment confirmation. Please note that processing times may
          vary depending on product availability, order volume, and other
          factors.
        </p>
      </div>

      <div class="section">
        <strong><em>Shipping Costs</em></strong>
        <p>
          Shipping costs are calculated based on the selected shipping method,
          destination, and the weight and dimensions of the items in your
          order. You can view the shipping cost for your order during the
          checkout process.
        </p>
      </div>

      <div class="section">
        <strong><em>Delivery Time</em></strong>
        <p>
          Delivery times vary depending on the shipping method selected and
          the destination. Standard shipping typically takes [number] to
          [number] business days, while expedited shipping may arrive sooner.
          International orders may take longer due to customs processing and
          other factors.
        </p>
      </div>
      <div class="section">
        <strong><em>Order Tracking</em></strong>
        <p>
          Once your order has been shipped, you will receive a shipping
          confirmation email containing tracking information. You can use this
          information to track the status of your order and estimated delivery
          date.
        </p>
      </div>
      <div class="section">
        <strong><em>Shipping Restrictions</em></strong>
        <p>
          Please note that we currently only ship to addresses within [list of
          countries or regions where shipping is available]. We are unable to
          deliver to P.O. boxes or APO/FPO addresses at this time.
        </p>
      </div>
      <div class="section">
        <strong><em>Damaged or Lost Shipments</em></strong>
        <p>
          In the rare event that your order is damaged or lost during transit,
          please contact our customer service team immediately. We will work
          with the shipping carrier to resolve the issue and ensure that you
          receive a replacement or refund as quickly as possible.
        </p>
      </div>
      <div class="section">
        <strong><em>Contact Us</em></strong>
        <p>
          If you have any questions or concerns about our shipping policy,
          please don't hesitate to contact us at SahelTronix@gmail.com, Our
          friendly customer service team is here to assist you with any
          inquiries you may have.
        </p>
        <p>
          Thank you for choosing Saheltronix for your computer needs. We
          appreciate your business and look forward to serving you again in
          the future!
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
