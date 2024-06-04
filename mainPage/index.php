<?php
include "../signup/connect.php";
include '../signup/regular_auth.php';
include "../products/productFetcher.php";
?>



<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SahelTronix</title>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="../mainPage/styles.css" />
  <link rel="stylesheet" href="../navbar/navbar.css" />
  <link rel="stylesheet" href="../footer/footer.css" />
  <link rel="stylesheet" href="../products/products.css" />
</head>

<body loading="lazy">

  <div class="mainimage">
    <?php
    include("../navbar/navbar.php");
    ?>
    <div class="textimage">
      <h3>We Offer Our Customers</h3>
      <h3>The Best Products</h3>
      <h5>With Affordable Prices</h5>
    </div>
    <div class="viewbtn">
      <a href="../allproducts/allproducts.php">
        <button class="viewbtnedit">Shop Now</button>
      </a>
    </div>
  </div>

  <main>
    <div class="small-container">
      <h2 class="title">Today's Best Deals</h2>
      <div class="row">
        <?php
        echo getProductDetails($conn, 5);
        echo getProductDetails($conn, 13);
        echo getProductDetails($conn, 16);
        echo getProductDetails($conn, 23);
        ?>
      </div>
      <br />
      <br />
    </div>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../images/offers/1920x660_sm (1).jpg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="../images/offers/1920x660_sm (2).jpg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="../images/offers/1920x660_sm (3).jpg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="../images/offers/1920x660_sm.jpg" class="d-block w-100" alt="..." />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="small-container">
      <h2 class="title">Featured Products</h2>
      <div class="row">
        <?php
        echo getProductDetails($conn, 22);
        echo getProductDetails($conn, 14);
        echo getProductDetails($conn, 18);
        echo getProductDetails($conn, 10);
        $conn->close();
        ?>
      </div>
    </div>

    <div class="small-container">
      <h2 class="title">Categories</h2>
  
      <div class="row">
          <div class="col-4">
            <a href="#"><img src="../images/productsImages/desktops/Acer Veriton M4650G Core i5 6th Gen Desktop Computers/AcerVeritonM4650Gdesktop_1.jpg" /></a>
            <a href="../products/desktops.php">
              <h4>DESKTOPS ></h4>
            </a>
          </div>
          <div class="col-4">
            <a href="#"><img src="../images/productsImages/laptops/Hp Zbook Firefly 14 G9 Core i7-1265u Iris Xe 14 Fhd+ Mobile Workstation Laptop/HpZBookFirefly14G9_4.jpg" /></a>
            <a href="../products/laptops.php">
              <h4>LAPTOPS ></h4>
            </a>
          </div>
          <div class="col-4">
            <a href="#"><img src="../images/productsImages/mousepads/Hyperx Fury S X-Large Size Pro Gaming Mouse Pad/HyperxFurySX-Large_2.jpg" /></a>
            <a href="../products/accessories.php">
              <h4>ACCESSORIES ></h4>
            </a>
          </div>
          <div class="col-4">
            <a href="#"><img src="../images/productsImages/monitors/AOC 27 C27G2Z 240hz 0.5ms 1500r Curved Gaming Monitor/AOCC27G2Z_2.jpg" /></a>
            <a href="../products/monitors.php">
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
            <img src="../images/offers/hindi.jpg" />
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
            <img src="../images/offers/profile2.jpg" />
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
            <img src="../images/offers/saddam hsein.jpg" />
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

  <?php
  include("../footer/footer.php")
  ?>

  <script src="../mainPage/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
