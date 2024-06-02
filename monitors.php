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
    <?php
        include ("navbar.php");
    ?>

    <main>
      <div class="small-container">
        <div class="row row-2">
          <h2>All Monitors</h2>
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
              src="./images/productsImages/monitors/AOC 27 C27G2Z 240hz 0.5ms 1500r Curved Gaming Monitor/AOCC27G2Z_1.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>AOC 27 C27G2Z 240hz 0.5ms Curved Gaming Monitor</h4>
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
              <p>$199.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/monitors/Dell P3421W 34” Ips 3.4k Type C Curved Professional Monitor/Dell34P3421WMonitor_8.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>
                Dell P3421W 34” Ips 3.4k Type C Curved Professional Monitor
              </h4>
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
              <p>$449.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/monitors/Msi C27C4X  27 9S6-3CA91T-098 250hz 1ms 1500r True Color Curved Gaming Monitor/MSIC27C4X9S6-3CA91T-098_2.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>Msi C27C4X 250hz 1ms Curved Gaming Monitor</h4>
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
              <p>$339.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/monitors/Samsung Odyssey G5 LC27G55TQBMXUE 27 144hz 2k 1ms Hdr10 Curved Gaming Monitor/SAMSUNGODYSSEYG5LC27G55TQBMXUE_5.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>Samsung Odyssey 144hz 1ms Curved Gaming Monitor</h4>
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
              <p>$254.99</p>
            </a>
          </div>
        </div>
      </div>
    </main>

   <?php
    include("footer.php");
   ?>


    <script src="./index.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>