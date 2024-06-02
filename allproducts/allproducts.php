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
    <link rel="stylesheet" href="../products.css" />
 
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
                        <a class="nav-link" href="../signup/signup.php">
                          <i class="fa fa-heart"></i> Sign Up
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../cart/cart.php">
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
                              href="../profile/profile.php"
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
                            <a class="dropdown-item" href="../cart/cart.php"
                              ><i class="fa fa-shopping-cart"></i> My Cart</a
                            >
                          </li>
                          <li>
                            <a class="dropdown-item" href="../signup/logout.php"
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
      <div class="small-container">
        <div class="row row-2">
          <h2>All Products</h2>
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
              src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_3.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>ASUS-ROG-STRIX-G18</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$800.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/headphones/HyperX Cloud Alpha Gaming Headset/HyperXCloudAlpha_1.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>HyperX Cloud Alpha Gaming Headset</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$90.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/graphics cards/Vga Amd Radeon RX 6950 XT 16gb Gddr6 Pcie 4.0/AMDRADEONRX6950XT_4.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Vga Amd Radeon RX 6950 XT 16gb Gddr6 Pcie 4.0</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$750.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/mouses/Hyperx Pulsefire Dart Wireless Rgb Gaming Mouse/HyperxPulsefireDartWireless_6.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Hyperx Pulsefire Dart Wireless Rgb Gaming Mouse</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$199.99</p>
            </a>
          </div>
        </div>
      </div>
      <div class="small-container">
        <div class="row">
          <div class="col-4">
            <img
              src="../images/productsImages/mouses/Genesis GX85 NMG-0711 MMO Laser Gaming Mouse/NMG-09663v1.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Genesis GX85 NMG-0711 MMO Laser Gaming Mouse</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$70.00</p>
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
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$999.99</p>
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
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
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
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$124.99</p>
            </a>
          </div>
        </div>
      </div>
      <div class="small-container">
        <div class="row">
          <div class="col-4">
            <img
              src="../images/productsImages/monitors/Samsung Odyssey G5 LC27G55TQBMXUE 27 144hz 2k 1ms Hdr10 Curved Gaming Monitor/SAMSUNGODYSSEYG5LC27G55TQBMXUE_5.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>
                Samsung Odyssey G5 27" 144hz 2k 1ms Hdr10 Curved Gaming Monitor
              </h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$399.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/headphones/Hyperx Cloud Mix Bluetooth Gaming Headset/HyperxCloudMix_1.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Hyperx Cloud Mix Bluetooth Gaming Headset</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$199.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/mousepads/Hyperx Fury S X-Large Size Pro Gaming Mouse Pad/HyperxFurySX-Large_2.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Hyperx Fury S X-Large Size Pro Gaming Mouse Pad</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$35.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/monitors/AOC 27 C27G2Z 240hz 0.5ms 1500r Curved Gaming Monitor/AOCC27G2Z_2.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>AOC 27 C27G2Z 240hz 0.5ms 1500r Curved Gaming Monitor</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$499.99</p>
            </a>
          </div>
        </div>
      </div>
      <div class="small-container">
        <div class="row">
          <div class="col-4">
            <img
              src="../images/productsImages/headphones/Hyperx Cloud X Chat Gaming Headset/HyperxCloudxChat_3.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Hyperx Cloud X Chat Gaming Headset</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$120.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/hard drives/internal hard drives/Seagate Exos X16 14tb Hdd Internal Hard Disk/SeagateEXOSX1614TB.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Seagate Exos X16 14tb Hdd Internal Hard Disk</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$150.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/desktops/Acer Veriton M4650G Core i5 6th Gen Desktop Computers/AcerVeritonM4650Gdesktop_1.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Acer Veriton M4650G Core i5 6th Gen Desktop Computer</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$375.00</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="../images/productsImages/keyboards/Genesis RX85 NKG-0959 Mechanical Gaming Keyboard/Z23287_90547.jpg"
            />
            <a href="../productsDetails/product.html"
              ><h4>Genesis RX85 NKG-0959 Mechanical Gaming Keyboard</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <a href="../checkout/checkout.html">
                  <button type="submit" class="buybtn">Buy Now</button>
                </a>
              </div>
              <p>$150.00</p>
            </a>
          </div>
        </div>
        <div class="page-btn">
          <a href="#"><span>1</span></a>
          <a href="#"><span>2</span></a>
          <a href="#"><span>3</span></a>
          <a href="#"><span>4</span></a>
          <a href="#"><span>&#8594;</span></a>
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
    <script src="../allproducts.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>