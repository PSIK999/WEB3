<!DOCTYPE html>
<html lang="en">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Project</title>

  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="./navbar.css" />
    <link rel="stylesheet" href="./footer.css" />
    <link rel="stylesheet" href="./products.css" />
  </head>

  <body loading="lazy">
  <?php
        include ("navbar.php");
    ?>
    <main>
      <div class="small-container">
        <div class="row row-2">
          <h2>All Desktops</h2>
          <select class="selectbtn">
            <option>Default sorting</option>
            <option>Sort by price</option>
            <option>Sort by popularity</option>
            <option>Sort by rating</option>
            <option>Sort by sale</option>
          </select>
        </div>
      </div>
      <div class="small-container">
        <div class="row">
          <div class="col-4">
            <img
              src="./images/productsImages/graphics cards/Vga Amd Radeon RX 6950 XT 16gb Gddr6 Pcie 4.0/AMDRADEONRX6950XT_5.jpg"
            />
            <a href="./productsDetails/product.html"
              ><h4>Vga Amd Radeon RX 6950 XT 16gb Gddr6 Pcie 4.0</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <a href="#">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$399.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/keyboards/Genesis RX85 NKG-0959 Mechanical Gaming Keyboard/Z23287_90546.jpg"
            />
            <a href="./productsDetails/product.html"
              ><h4>Genesis RX85 NKG-0959 Mechanical Gaming Keyboard</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="#">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$39.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/headphones/Hyperx Cloud Mix Bluetooth Gaming Headset/HyperxCloudMix_2_a.jpg"
            />
            <a href="./productsDetails/product.html"
              ><h4>Hyperx Cloud Mix Bluetooth Gaming Headset</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="#">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$179.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/mouses/Hyperx Pulsefire Dart Wireless Rgb Gaming Mouse/HyperxPulsefireDartWireless_6.jpg"
            />
            <a href="./productsDetails/product.html"
              ><h4>Hyperx Pulsefire Dart Wireless Rgb Gaming Mouse</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="#">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$99.99</p>
            </a>
          </div>
        </div>
      </div>
    </main>
    <footer class="footer">
      <div class="box">
        <h2>Links</h2>
        <ul class="links">
          <li><a href="./links/privacyPolicy.html"> Privacy Policy </a></li>
          <li>
            <a href="./links/shippingPolicy.html"> Shipping Policy </a>
          </li>
          <li>
            <a href="./links/termsOfService.html"> Terms of Services </a>
          </li>
          <li><a href="./links/refundPolicy.html"> Refund Policy </a></li>
        </ul>
      </div>
      <div class="box">
        <h2 class="footertitle">𝔖𝔞𝔥𝔢𝔩𝔗𝔯𝔬𝔫𝔦𝔵</h2>
        <form action="./signup/signup.html" class="registration">
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
    <script src="./index.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
