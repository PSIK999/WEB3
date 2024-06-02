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
              src="./images/productsImages/desktops/Acer Veriton M4650G Core i5 6th Gen Desktop Computers/AcerVeritonM4650Gdesktop_3.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>Acer Veriton M4650G Core i5 Desktop Computers</h4>
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
              <p>$654.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/desktops/Alienware Aurora Core i7-9700k Desktop Computers/AlienwareAurora_1_8e83c8aa-63b1-42f7-a20d-65c63b2f1c4b.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>Alienware Aurora Core i7-9700k Desktop Computers</h4>
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
              <p>$1,499.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/desktops/ASUS ExpertCenter D500SC Desktop Core I3-10105/download_7.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>ASUS ExpertCenter D500SC Desktop Core I3-10105</h4>
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
              <p>$439.99</p>
            </a>
          </div>
          <div class="col-4">
            <img
              src="./images/productsImages/desktops/Dell Optiplex XE4 Core i7-12700 Desktop Computer/DellOptiPlexXE4i7-12700Desktop_3.jpg"
            />
            <a href="./productsDetails/product.php"
              ><h4>Dell Optiplex XE4 Core i7-12700 Desktop Computer</h4>
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
              <p>$899.99</p>
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
