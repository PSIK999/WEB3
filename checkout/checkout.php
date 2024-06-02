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
      crossorigin="anonymous" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet" />


    <link rel="stylesheet" href="../navbar.css" />
    <link rel="stylesheet" href="../footer.css" />

  </head>

  <body loading="lazy">

    <header>
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

    </header>

    <main>
      <section class="bg-light py-5">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-8 mb-4">
              <div class="card mb-4 border shadow-0">
                <div class="p-4 d-flex justify-content-between">
                  <div class="">
                    <h5>Have an account?</h5>
                    <p class="mb-0 text-wrap ">Create An Account If You Don't Have One</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-center flex-column flex-md-row">
                     <a href="#" id="register-btn" class="btn btn-outline-primary me-0 me-md-2 mb-2 mb-md-0 w-100">Register</a>
                    <a href="#" id="sign-in" class="btn btn-primary shadow-0 text-nowrap w-100">Sign in</a>
                  </div>
                </div>
              </div>
      
              <div class="card shadow-0 border">
                <div class="p-4">
                  <h5 class="card-title mb-3">Guest checkout</h5>
                  <div class="row">
                    <div class="col-6 mb-3">
                      <p class="mb-0">First name</p>
                      <div class="form-outline">
                        <input type="text" id="typeText" placeholder="Type here" class="form-control" />
                      </div>
                    </div>
      
                    <div class="col-6">
                      <p class="mb-0">Last name</p>
                      <div class="form-outline">
                        <input type="text" id="typeText" placeholder="Type here" class="form-control" />
                      </div>
                    </div>
      
                    <div class="col-6 mb-3">
                      <p class="mb-0">Phone</p>
                      <div class="form-outline">
                        <input type="tel" id="typePhone" value="+48 " class="form-control" />
                      </div>
                    </div>
      
                    <div class="col-6 mb-3">
                      <p class="mb-0">Email</p>
                      <div class="form-outline">
                        <input type="email" id="typeEmail" placeholder="example@gmail.com" class="form-control" />
                      </div>
                    </div>
                  </div>
      
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">Keep me up to date on news</label>
                  </div>
      
                  <hr class="my-4" />
      
                  <h5 class="card-title mb-3">Shipping info</h5>
      
                  <div class="row mb-3">
                    <div class="col-lg-4 mb-3">
                      <div class="form-check h-100 border rounded-3">
                        <div class="p-3">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked />
                          <label class="form-check-label" for="flexRadioDefault1">
                            Express delivery <br />
                            <small class="text-muted">3-4 days via Fedex </small>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                      <div class="form-check h-100 border rounded-3">
                        <div class="p-3">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                          <label class="form-check-label" for="flexRadioDefault2">
                            Post office <br />
                            <small class="text-muted">20-30 days via post </small>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                      <div class="form-check h-100 border rounded-3">
                        <div class="p-3">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" />
                          <label class="form-check-label" for="flexRadioDefault3">
                            Self pick-up <br />
                            <small class="text-muted">Come to our shop </small>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <div class="row">
                    <div class="col-sm-8 mb-3">
                      <p class="mb-0">Address</p>
                      <div class="form-outline">
                        <input type="text" id="typeText" placeholder="Type here" class="form-control" />
                      </div>
                    </div>
      
                    <div class="col-sm-4 mb-3">
                      <p class="mb-0">City</p>
                      <select class="form-select">
                        <option value="1">New York</option>
                        <option value="2">Moscow</option>
                        <option value="3">Samarqand</option>
                      </select>
                    </div>
      
                    <div class="col-sm-4 mb-3">
                      <p class="mb-0">House</p>
                      <div class="form-outline">
                        <input type="text" id="typeText" placeholder="Type here" class="form-control" />
                      </div>
                    </div>
      
                    <div class="col-sm-4 col-6 mb-3">
                      <p class="mb-0">Postal code</p>
                      <div class="form-outline">
                        <input type="text" id="typeText" class="form-control" />
                      </div>
                    </div>
      
                    <div class="col-sm-4 col-6 mb-3">
                      <p class="mb-0">Zip</p>
                      <div class="form-outline">
                        <input type="text" id="typeText" class="form-control" />
                      </div>
                    </div>
                  </div>
      
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
                    <button class="btn btn-light border">Cancel</button>
                    <button class="btn btn-success shadow-0 border">Continue</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
              <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
                <h6 class="mb-3">Summary</h6>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Total price:</p>
                  <p class="mb-2">$195.90</p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Discount:</p>
                  <p class="mb-2 text-danger">- $60.00</p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Shipping cost:</p>
                  <p class="mb-2">+ $14.00</p>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Total price:</p>
                  <p class="mb-2 fw-bold">$149.90</p>
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
                    <img src="../images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_3.jpg" style="height: 96px; width: 96x;" class="img-sm rounded border" />
                  </div>
                  <div class="">
                    <a href="#" class="nav-link">
                      Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16 
            
                    </a>
                    <div class="price text-muted">Total: $2199.99</div>
                  </div>
                </div>
      
                <div class="d-flex align-items-center mb-4">
                  <div class="me-3 position-relative">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                      1
                    </span>
                    <img src="../images/productsImages/monitors/AOC 27 C27G2Z 240hz 0.5ms 1500r Curved Gaming Monitor/AOCC27G2Z_1.jpg" style="height: 96px; width: 96x;" class="img-sm rounded border" />
                  </div>
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
                    <img src="../images/productsImages/desktops/Alienware Aurora Core i7-9700k Desktop Computers/AlienwareAurora_1_8e83c8aa-63b1-42f7-a20d-65c63b2f1c4b.jpg" style="height: 96px; width: 96x;" class="img-sm rounded border" />
                  </div>
                  <div class="">
                    <a href="#" class="nav-link">Alienware Aurora Core i7-9700k Desktop Computers</a>
                    <div class="price text-muted">Total: $1499.99</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

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
  
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </body>
  </html>
  