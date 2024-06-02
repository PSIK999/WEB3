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
  <link rel="stylesheet" href="../aboutus/aboutus.css" />
</head>

<body loading="lazy">

  <?php
  include("../navbar/navbar.php");
  ?>

  <main>
    <div class="writing">
      <div class="section">
        <strong><em>Terms of Service</em></strong>
        <p>
          Welcome to Saheltronix! These Terms of Service ("Terms") govern your
          access to and use of Saheltronix.com (the "Site") and any products
          or services offered by Saheltronix.
        </p>
      </div>

      <div class="section">
        <strong><em>1. Acceptance of Terms</em></strong>
        <p>
          By accessing or using the Site, you agree to be bound by these Terms
          and our Privacy Policy. If you do not agree to these Terms or our
          Privacy Policy, please do not use the Site.
        </p>
      </div>

      <div class="section">
        <strong><em>2. Use of the Site </em></strong>
        <p>
          You may use the Site for your personal, non-commercial use only. You
          agree not to use the Site for any unlawful purpose or in any way
          that violates these Terms or any applicable laws or regulations.
        </p>
      </div>

      <div class="section">
        <strong><em>3. Products and Services</em></strong>
        <p>
          Saheltronix offers a variety of computer products and services for
          sale on the Site. All purchases made through the Site are subject to
          our Refund Policy and Shipping Policy.
        </p>
      </div>
      <div class="section">
        <strong><em>4. Intellectual Property </em></strong>
        <p>
          The content, trademarks, logos, and other intellectual property
          displayed on the Site are owned by Saheltronix or its licensors and
          are protected by copyright and other laws. You may not use,
          reproduce, or distribute any content from the Site without our prior
          written permission.
        </p>
      </div>
      <div class="section">
        <strong><em>6. Limitation of Liability</em></strong>
        <p>
          To the fullest extent permitted by law, Saheltronix shall not be
          liable for any indirect, incidental, special, consequential, or
          punitive damages arising out of or in connection with your use of
          the Site or any products or services provided by Saheltronix.
        </p>
      </div>
      <div class="section">
        <strong><em>7. Indemnification</em></strong>
        <p>
          You agree to indemnify and hold Saheltronix harmless from any
          claims, losses, liabilities, damages, costs, and expenses (including
          attorney's fees) arising out of or in connection with your use of
          the Site or any violation of these Terms.
        </p>
      </div>
      <div class="section">
        <strong><em>8. Changes to Terms</em></strong>
        <p>
          Saheltronix reserves the right to modify or update these Terms at
          any time without prior notice. It is your responsibility to review
          these Terms periodically for changes. Your continued use of the Site
          following the posting of any changes constitutes acceptance of those
          changes.
        </p>
      </div>
      <div class="section">
        <strong><em>9. Governing Law</em></strong>
        <p>
          These Terms shall be governed by and construed in accordance with
          the laws of Lebanon, without regard to its conflict of law
          principles.
        </p>
      </div>
      <div class="section">
        <strong><em>10. Contact Us</em></strong>
        <p>
          If you have any questions or concerns about these Terms, please
          contact us at SahelTronix@gmail.com
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