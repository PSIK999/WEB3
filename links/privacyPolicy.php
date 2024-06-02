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
        <strong><em>Privacy Policy</em></strong>
        <p>
          This Privacy Policy describes how SahelTronix.com (the “Site” or
          “we”) collects, uses, and discloses your Personal Information when
          you visit or make a purchase from the Site.
        </p>
      </div>

      <div class="section">
        <strong><em>Information We Collect</em></strong>
        <p>
          When you visit Saheltronix, we may collect personal information such
          as your name, email address, shipping address, and payment
          information. We also gather non-personal information, including your
          IP address, browser type, language preference, referring site, and
          the date and time of each visitor request. This information is used
          to analyze trends, administer the site, track user movements, and
          gather demographic information for internal use.
        </p>
      </div>

      <div class="section">
        <strong><em>How We Use Your Information</em></strong>
        <p>
          We use the information we collect to operate and improve
          Saheltronix, fulfill your orders, communicate with you, customize
          your shopping experience, and comply with legal obligations. We may
          also use your information to send promotional offers, newsletters,
          and other communications about our products and services. You can
          opt out of these communications at any time by following the
          instructions provided in the messages.
        </p>
      </div>

      <div class="section">
        <strong><em>Disclosure of Your Information</em></strong>
        <p>
          Saheltronix does not sell, rent, or lease your personal information
          to third parties. However, we may share your information with
          trusted partners and service providers who assist us in operating
          our website, conducting our business, or servicing you. These third
          parties are contractually obligated to keep your information
          confidential and use it only for the purposes specified by
          Saheltronix. We may also disclose your personal information when
          required by law or in response to lawful requests by public
          authorities, including to meet national security or law enforcement
          requirements.
        </p>
      </div>
      <div class="section">
        <strong><em>Security of Your Information</em></strong>
        <p>
          Saheltronix does not sell, rent, or lease your personal information
          to third parties. However, we may share your information with
          trusted partners and service providers who assist us in operating
          our website, conducting our business, or servicing you. These third
          parties are contractually obligated to keep your information
          confidential and use it only for the purposes specified by
          Saheltronix. We may also disclose your personal information when
          required by law or in response to lawful requests by public
          authorities, including to meet national security or law enforcement
          requirements.
        </p>
      </div>
      <div class="section">
        <strong><em>Changes to This Privacy Policy</em></strong>
        <p>
          Saheltronix reserves the right to update or change this Privacy
          Policy at any time. Any changes will be effective immediately upon
          posting on this page. We encourage you to review this Privacy Policy
          periodically for updates.
        </p>
      </div>
      <div class="section">
        <strong><em>Contact Us</em></strong>
        <p>
          If you have any questions or concerns about this Privacy Policy or
          our data practices, please contact us at SahelTronix@gmail.com
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