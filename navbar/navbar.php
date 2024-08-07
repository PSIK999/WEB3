<?php
include "../signup/connect.php";
//session_start()
?>
<style>
  .navbar .nav-link {
    color: #000;
    text-decoration: none;
    padding: 10px 15px;
    display: block;
  }

  .navbar .nav-link.active {
    color: yellow;
    font-weight: bold;
    border-bottom: 2px solid yellow;
  }

  .navbar {
    background-color: #333;
    padding: 10px 0;
  }

  .navbar .nav-link:hover {

    text-decoration: underline;
    color: rgb(255, 196, 0);
  }
</style>
<nav>
  <div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
            <div class="logo">
            <h1 class="ke">𝔖𝔞𝔥𝔢𝔩𝔗𝔯𝔬𝔫𝔦𝔵</h1>
            </div>
          </div>
          <div class="col-md-5 my-auto">
            <form role="search" id="searchForm">
              <div class="input-group">
                <input type="search" id="searchInput" placeholder="Search your product" class="form-control" />
                <button class="btn bg-white" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </form>

          </div>
          <?php if (isset($_SESSION['log']) && $_SESSION['log']) { ?>
            <div class="col-md-5 my-auto">
              <ul class="nav justify-content-end">
                <li class="nav-item">
                  <a class="nav-link" href="../cart/cart.php">
                    <i class="fa fa-shopping-cart"></i> Cart <span id="cart-count">(<?php
                                                                                    $stmt = $conn->prepare("SELECT COUNT(*) AS num_rows FROM shoppingcart WHERE user_id =?");
                                                                                    $stmt->bind_param("i", $_SESSION['user_id']);
                                                                                    $stmt->execute();
                                                                                    $result = $stmt->get_result();
                                                                                    $row = $result->fetch_assoc();
                                                                                    $num_rows = $row['num_rows'];
                                                                                    //navbar.php
                                                                                    echo $num_rows;
                                                                                    ?>)</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <?php
                    $email = $_SESSION['email'];
                    $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                    while ($row = mysqli_fetch_array($query)) {
                      echo $row['first_name'] . ' ' . $row['last_name'];
                    }

                    ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                      <a class="dropdown-item" href="../profile/profile.php"><i class="fa fa-user"></i> Profile</a>
                    </li>

                    <li>
                      <a class="dropdown-item" href="../orders/orders.php"><i class="fa fa-list"></i> My Orders</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../cart/cart.php"><i class="fa fa-shopping-cart"></i> My Cart</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../signup/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="col-md-5 my-auto">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="../signup/signup.php">
            <i class="fa fa-heart"></i> Sign Up
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../signup/login.php">
            <i class="fa fa-shopping-cart"></i> Cart (0)
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i>
            User Name
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="../signup/login.php"><i class="fa fa-user"></i> Profile</a>
            </li>

            <li>
              <a class="dropdown-item" href="../signup/login.php"><i class="fa fa-list"></i> My Orders</a>
            </li>
            <li>
              <a class="dropdown-item" href="../signup/login.php"><i class="fa fa-shopping-cart"></i> My Cart</a>
            </li>
            <li>
              <a class="dropdown-item" href="../signup/login.php"><i class="fa fa-sign-out"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  </div>
  </div>

<?php } ?>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
      𝔖𝔞𝔥𝔢𝔩𝔗𝔯𝔬𝔫𝔦𝔵
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../mainPage/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../allproducts/allproducts.php">All Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../products/laptops.php">Laptops</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../products/desktops.php">Desktops</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../products/accessories.php">Accessories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../products/monitors.php">Monitors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../aboutus/aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contactus/contactus.php">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
</nav>
<script>
  document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the default way
    const searchQuery = document.getElementById('searchInput').value;
    window.location.href = `../allproducts/allproducts.php?search=${encodeURIComponent(searchQuery)}`;
  });
</script>