<?php
session_start();
include "./signup/connect.php";

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

    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="./navbar.css" />
    <link rel="stylesheet" href="./footer.css" />
    <link rel="stylesheet" href="./products.css" />
  </head>

  <body loading="lazy">
    <header style="background-image:url(./images/laptop-murjp1nk4lp1idlt.jpg)">
                
      <div class="mainimage">
        <nav>
          <div class="main-navbar shadow-sm sticky-top">
            <div class="top-navbar">
              <div class="container-fluid">
                <div class="row">
                  <div
                    class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block"
                  >
                    <div class="logo">
                      <h1 class="ke">𝔖𝔞𝔥𝔢𝔩𝔗𝔯𝔬𝔫𝔦𝔵</h1>
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
                        <a class="nav-link" href="./signup/signup.html">
                          <i class="fa fa-heart"></i> Sign Up
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./cart/cart.html">
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
                              href="./profile/profile.html"
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
                            <a class="dropdown-item" href="./cart/cart.html"
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
                      <a class="nav-link" href="./index.html">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./allproducts/allproducts.html"
                        >All Products</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./laptops.html">Laptops</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./desktops.html">Desktops</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./accessories.html"
                        >Accessories</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./monitors.html">Monitors</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./aboutus/aboutus.html"
                        >About Us</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./contactus/contactus.html"
                        >Contact Us</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>

          <div class="imagetext">
            <h3>We Offer Our Customers</h3>
            <h3>The Best Products</h3>
            <h5>With Affordable Prices</h5>
          </div>
          <div class="viewbtn">
            <a href="./allproducts/allproducts.html">
              <button class="viewbtnedit">Shop Now</button>
            </a>
          </div>
        </nav>
      </div>
    </header>

    <main>
      <div class="small-container">
        <h2 class="title">Today's Best Deals</h2>
        <div class="row">
          <div class="col-4">
            <a href="../productsDetails/product.html"
              ><img
                src="./images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_3.jpg"
                alt="..."
              />
            </a>
            <a href="/productsDetails/product.html">
              <h4>Asus ROG STRIX G16 G164JI-N3169
                (Brand New)</h4>
            </a>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <a href="./checkout/checkout.html">
                <button type="submit" class="buybtn">Buy Now</button>
              </a>
            </div>
            <p>$2999.99</p>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/headphones/HyperX Cloud Alpha Gaming Headset/HyperXCloudAlpha_1.jpg"
                alt="..."
            /></a>
            <a href="#">
              <h4>HyperX Cloud Alpha Gaming Headset (Brand New)</h4>
            </a>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <a href="./checkout/checkout.html">
                <button type="submit" class="buybtn">Buy Now</button>
              </a>
            </div>
            <p>$90.00</p>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/mouses/Genesis GX85 NMG-0711 MMO Laser Gaming Mouse/NMG-09663v1.jpg"
                alt="..."
            /></a>
            <a href="#">
              <h4>Genesis GX85 NMG-0711 MMO Laser Gaming Mouse</h4>
            </a>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half"></i>
              <a href="./checkout/checkout.html">
                <button type="submit" class="buybtn">Buy Now</button>
              </a>
            </div>
            <p>$40.00</p>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/keyboards/Hyperx Alloy Origins 60 Rgb Mechanical Gaming Keyboard/HyperxOrigins60_3.jpg"
                alt="..."
            /></a>
            <a href="#">
              <h4>HyperX Alloy Origins 60 RGB Mechanical Gaming Keyboard</h4>
            </a>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <a href="./checkout/checkout.html">
                <button type="submit" class="buybtn">Buy Now</button>
              </a>
            </div>
            <p>$95.00</p>
          </div>
        </div>
        <br />
        <br />
      </div>

      <div
        id="carouselExampleAutoplaying"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="./images/offers/1920x660_sm (1).jpg"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="./images/offers/1920x660_sm (2).jpg"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="./images/offers/1920x660_sm (3).jpg"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="./images/offers/1920x660_sm.jpg"
              class="d-block w-100"
              alt="..."
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/hard drives/internal hard drives/Seagate Exos X16 14tb Hdd Internal Hard Disk/SeagateEXOSX1614TB_1.jpg"
                alt="..."
            /></a>
            <a href="#">
              <h4>Seagate Exos X16 14tb HDD Internal Hard Disk</h4>
            </a>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half"></i>
              <a href="./checkout/checkout.htmll">
                <button type="submit" class="buybtn">Buy Now</button>
              </a>
            </div>
            <p>$290.00</p>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/graphics cards/Vga Amd Radeon RX 6950 XT 16gb Gddr6 Pcie 4.0/AMDRADEONRX6950XT_6.jpg"
                alt="..."
            /></a>
            <a href="#">
              <h4>Vga Amd Radeon Rx 6950 XT 16gb Gddr6 Pcie 4.0</h4>
            </a>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <a href="./checkout/checkout.html">
                <button type="submit" class="buybtn">Buy Now</button>
              </a>
            </div>
            <p>$399.00</p>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/keyboards/Genesis RX85 NKG-0959 Mechanical Gaming Keyboard/Z23287_90546.jpg"
                alt="..."
            /></a>
            <a href="#">
              <h4>Genesis RX85 NKG-0959 Mechanical Gaming Keyboard</h4>
            </a>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <a href="./checkout/checkout.html">
                <button type="submit" class="buybtn">Buy Now</button>
              </a>
            </div>
            <p>$90.00</p>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/monitors/Dell P3421W 34” Ips 3.4k Type C Curved Professional Monitor/Dell34P3421WMonitor_8.jpg"
                alt="..."
            /></a>
            <a href="#">
              <h4>Dell P3421W 34" Ips 3.4k Type C (Brand New)</h4>
            </a>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <a href="./checkout/checkout.html">
                <button type="submit" class="buybtn">Buy Now</button>
              </a>
            </div>
            <p>$599.00</p>
          </div>
        </div>

        <div class="small-container"></div>
        <h2 class="title">Categories</h2>

        <div class="row">
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/desktops/Acer Veriton M4650G Core i5 6th Gen Desktop Computers/AcerVeritonM4650Gdesktop_1.jpg"
            /></a>
            <a href="/desktops.html">
              <h4>DESKTOPS ></h4>
            </a>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/laptops/Hp Zbook Firefly 14 G9 Core i7-1265u Iris Xe 14 Fhd+ Mobile Workstation Laptop/HpZBookFirefly14G9_4.jpg"
            /></a>
            <a href="./laptops.html">
              <h4>LAPTOPS ></h4>
            </a>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/mousepads/Hyperx Fury S X-Large Size Pro Gaming Mouse Pad/HyperxFurySX-Large_2.jpg"
            /></a>
            <a href="/accessories.html">
              <h4>ACCESSORIES ></h4>
            </a>
          </div>
          <div class="col-4">
            <a href="#"
              ><img
                src="./images/productsImages/monitors/AOC 27 C27G2Z 240hz 0.5ms 1500r Curved Gaming Monitor/AOCC27G2Z_2.jpg"
            /></a>
            <a href="./monitors.html">
              <h4>MONITORS ></h4>
            </a>
          </div>
        </div>
      </div>
      <div class="testimonial">
        <div class="small-container">
          <div class="row">
            <div class="col-3">
              <i class="fa fa-quote-left"></i>
              <p>
                High quality products , and the prices are so affordable. Also
                the store's website is very flexible and beautiful!
              </p>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <img src="./images/offers/hindi.jpg" />
              <h3>Imran Khan</h3>
            </div>
            <div class="col-3">
              <i class="fa fa-quote-left"></i>
              <p>
                I recommend everyone to buy their electronics at SahelTronix
                Shop. You'll never find any better ! Amazing Products
              </p>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <img src="./images/offers/profile2.jpg" />
              <h3>Anthony Jackson</h3>
            </div>
            <div class="col-3">
              <i class="fa fa-quote-left"></i>
              <p>
                Good prices, awesome quality compared to other stores.
                Definitely would shop here again next time !
                <i class="fa fa-heart"></i>
              </p>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <img src="./images/offers/saddam hsein.jpg" />
              <h3>Elijah Parkinson</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="textfooter">
        <p>
          Make SahelTronix your one-stop electronics store for technology,
          consumer electronics, gaming components, and more! SahelTronix is an
          online electronics store based in Lebanon. Its global reach as a go-to
          tech store expands into Europe, South America, Asia Pacific, and the
          North America. With competitive pricing and frequent promotions,
          SahelTronix features a diverse range of in-demand electronics and tech
          products. Online electronics shopping can be tricky, but SahelTronix
          spotlights products from well-known, quality, reliable brands. Whether
          you are buying electronics to outfit your home office, upgrading your
          mobile device or home entertainment system, or searching for tech
          accessories, SahelTronix has a comprehensive selection of the
          electronics and tech products that consumers want. Choose
          SahelTronix’s online tech store as your ultimate shopping destination
          for buying electronics.
        </p>
        <p>
          SahelTronix offers user-friendly tools to simplify electronics
          shopping. Use our Laptop Finder for tailored laptop recommendations,
          our Gaming PC Finder for custom gaming rigs, and our Power Supply
          Calculator for PC builds. With our PC Builder, compare components and
          save builds. Explore our configurators for NAS solutions and custom
          Server Systems. Simplify RAM selection with our Memory Finder. Explore
          the ease and convenience of electronics shopping in our online
          technology store with SahelTronix's comprehensive suite of tools.
        </p>
        <p>
          SahelTronix proudly boasts a vibrant community of over 4 million tech
          enthusiasts worldwide! Driven by customer engagement and a shared
          passion for technology, we've built an industry-leading reputation for
          reliability and excellence. Discover an expansive selection of PC
          components, consumer electronics, smart home devices, and gaming
          products on our trusted online platform. Immerse yourself in hands-on
          demos and expert video reviews at SahelTronix Studios, where we offer
          valuable insights into the latest tech trends. Join our community
          today and embark on a journey to explore the world of tech with
          confidence.
        </p>
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