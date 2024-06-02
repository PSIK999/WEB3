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
          <h2>All Laptops</h2>
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
              src="./images/productsImages/laptops/Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz 16/ROGStrixG16G614_3.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>
                Asus Rog Strix G16 G614JI-N3169 Core i9-13980hx Rtx 4070 165hz
                16
              </h4>
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
              <p>$2,199.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/laptops/Asus Tuf F15 FX507VI-LP129 Core i7-13620h Rtx 4070 144hz 15.6/AsusTufFX507VI_3.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>
                Asus Tuf F15 FX507VI-LP129 Core i7-13620h Rtx 4070 144hz 15.6
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
              <p>$1,449.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/laptops/Hp Omen 17-CK2002 Core i7-13700hx Rtx 4080 240hz 17.3” Qhd Gaming Laptop/HPOMEN17-CK2002Corei7-13700HXRTX4080240HzQHDGamingLaptop_4.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>
                Hp Omen 17 Core i7-13700hx Rtx 4080 240hz 17.3” Gaming Laptop
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
              <p>$1,799.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/laptops/Hp Zbook Firefly 14 G9 Core i7-1265u Iris Xe 14 Fhd+ Mobile Workstation Laptop/HpZBookFirefly14G9_5.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>
                Hp Zbook Firefly 14 G9 Core i7-1265u Iris Xe 14 Mobile
                Workstation Laptop
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
              <p>$1,199.99</p>
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
