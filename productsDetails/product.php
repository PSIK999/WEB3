<?php
session_start();
include "../signup/connect.php";

?>


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

    <link rel="stylesheet" href="../styles.css" />
    <link rel="stylesheet" href="../navbar.css" />
    <link rel="stylesheet" href="../footer.css" />
    <link rel="stylesheet" href="./products.css" />
    <link rel="stylesheet" href="../productsDetails/product.css" />
  </head>

  <body loading="lazy">
    
  <nav>
          <div class="main-navbar shadow-sm sticky-top">
            <div class="top-navbar">
              <div class="container-fluid">
                <div class="row">
                  <div
                    class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <div class="logo">
                      <img src="../images/20240524_162618.png" class="ke">
                    </div>
                  </div>
                  <div class="col-md-5 my-auto">
                    <form role="search">
                      <div class="input-group">
                        <input
                          type="search"
                          placeholder="Search your product"
                          class="form-control"
                        />
                        <button class="btn bg-white" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">
                      <li class="nav-item">
                        <a class="nav-link" href="./signup/signup.php">
                          <i class="fa fa-heart"></i> Sign Up
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./cart/cart.php">
                          <i class="fa fa-shopping-cart"></i> Cart (0)
                        </a>
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link dropdown-toggle"
                          href="#"
                          id="navbarDropdown"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          <i class="fa fa-user"></i>
                          <?php 
                            if(isset($_SESSION['email'])){
                              $email=$_SESSION['email'];
                              $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                            while($row=mysqli_fetch_array($query)){
                              echo $row['first_name'].' '.$row['last_name'];
                              }
                            }
                          ?>
                        </a>
                        <ul
                          class="dropdown-menu"
                          aria-labelledby="navbarDropdown"
                        >
                          <li>
                            <a
                              class="dropdown-item"
                              href="./profile/profile.php"
                              ><i class="fa fa-user"></i> Profile</a
                            >
                          </li>

                          <li>
                            <a class="dropdown-item" href="#"
                              ><i class="fa fa-list"></i> My Orders</a
                            >
                          </li>
                          <li>
                            <a class="dropdown-item" href="#"
                              ><i class="fa fa-heart"></i> My Wishlist</a
                            >
                          </li>
                          <li>
                            <a class="dropdown-item" href="./cart/cart.php"
                              ><i class="fa fa-shopping-cart"></i> My Cart</a
                            >
                          </li>
                          <li>
                            <a class="dropdown-item" href="signup/logout.php"
                              ><i class="fa fa-sign-out"></i> Logout</a
                            >
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid">
                <a
                  class="navbar-brand d-block d-sm-block d-md-none d-lg-none"
                  href="#"
                >
                  𝔖𝔞𝔥𝔢𝔩𝔗𝔯𝔬𝔫𝔦𝔵
                </a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div
                  class="collapse navbar-collapse"
                  id="navbarSupportedContent"
                >
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../allproducts/allproducts.php"
                        >All Products</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../laptops.php">Laptops</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../desktops.php">Desktops</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../accessories.php"
                        >Accessories</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../monitors.php">Monitors</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../aboutus/aboutus.php"
                        >About Us</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../contactus/contactus.php"
                        >Contact Us</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </nav>
    <main>
      <div class="small-container single-product">
        <div class="row">
          <div class="col-2">
            <img
              src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_3.jpg"
              width="100%"
              id="ProductImg"
            />

            <div class="small-img-row">
              <div class="small-img-col">
                <img
                  src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_11.jpg"
                  width="100%"
                  class="small-img"
                />
              </div>
              <div class="small-img-col">
                <img
                  src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_10.jpg"
                  width="100%"
                  class="small-img"
                />
              </div>
              <div class="small-img-col">
                <img
                  src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_5.jpg"
                  width="100%"
                  class="small-img"
                />
              </div>
              <div class="small-img-col">
                <img
                  src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_6.jpg"
                  width="100%"
                  class="small-img"
                />
              </div>
            </div>
          </div>
          <div class="col-2">
            <p>Home / laptop</p>
            <h1>Asus ROG STRIX G18 I9 G14(Brand New)</h1>
            <h4>2099.00$</h4>
            <select>
              <option>Select Ram</option>
              <option>16 GB</option>
              <option>32 GB</option>
              <option>64 GB</option>
            </select>
            <input type="number" min="0" max="10" value="1" />
            <a href="../cart/cart.php" class="bton">Add To Cart</a>
            <a href="../checkout/checkout.php" class="bton">Buy Now</a>
            <a href="../review/review.php" class="bton">Add a Review</a>

            <h3>Product Details <i class="fa fa-indent"></i></h3>
            <br />
            <p>
              ASUS ROG Strix G18 18” Gaming Laptop - Intel Core i9-13980HX -
              16GB RAM - 1TB SSD - GeForce RTX 4070 | G814JI-CS94 Processor:
              13th Gen Intel Core™ i9-13980HX Processor 2.2 GHz (36M Cache, up
              to 5.6 GHz, 24 cores: 8 P-cores and 16 E-cores) Memory: 8GB
              DDR5-4800 SO-DIMM x 2 Storage: 1TB PCIe® 4.0 NVMe™ M.2 SSD Graphic
              Card: NVIDIA GeForce RTX™ 4070 Laptop GPU 8GB GDDR6
              Display:18-inch QHD+ 16:10 (2560 x 1600, WQXGA) Anti-glare display
              240Hz Refresh Rate Operating System: Windows 11 Home I/O Ports:1x
              3.5mm Combo Audio Jack, 1x HDMI 2.1 FRL, 2x USB 3.2 Gen 2 Type-A,
              1x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery /
              G-SYNC, 1x RJ45 LAN port, 1x Thunderbolt™ 4 support DisplayPort™
              Wireless Connectivity: Wi-Fi 6E(802.11ax) (Triple band) 2*2 +
              Bluetooth 5.3 Battery: 90WHrs, 4S1P, 4-cell Li-ion
            </p>
          </div>
        </div>
      </div>

      <div class="small-container">
        <div class="row row-2">
          <h2>Related Products</h2>
          <p class="Viewmore">
            <a href="../allproducts/allproducts.html">View more</a>
          </p>
        </div>
      </div>
      <div class="small-container">
        <div class="row">
          <div class="col-4">
            <img
              src="../images/productsImages/keyboards/Genesis RX85 NKG-0959 Mechanical Gaming Keyboard/Z23287_90546.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Genesis RX85 NKG-0959 Mechanical Gaming Keyboard</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>$750.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/desktops/Alienware Aurora Core i7-9700k Desktop Computers/AlienwareAurora_3_-C.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Alienware Aurora Core i7-9700k Desktop Computer</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <p>$1500.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/graphics cards/Vga Msi Ventus 3x Rtx 3090 24gb GDDR6X OC Edition/MsiGeForceRTX3090VENTUS3X24GOC_2.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Vga Msi Ventus 3x Rtx 3090 24gb GDDR6X OC Edition</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <p>$875.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/keyboards/Hyperx Alloy Elite 2 Rgb Mechanical Gaming Keyboard/HyperxElite2_4.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Hyperx Alloy Elite 2 Rgb Mechanical Gaming Keyboard</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <p>$150.00</p>
            </a>
          </div>
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
    <script src="./product.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>