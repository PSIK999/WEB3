<?php
include "../signup/connect.php";
include '../signup/regular_auth.php';
include "../products/productFetcher.php";
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Project</title>

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

  <?php
  include("../navbar/navbar.php");
  ?>

  <main>
    <div class="small-container">
      <div class="row row-2">
        <h2>All Accessories</h2>
        <select class="selectbtn">
          <option>Default sorting</option>
          <option>Sort by price</option>
          <option>Sort by popularity</option>
          <option>Sort by rating</option>
          <option>Sort by sale</option>
        </select>
      </div>
    </div>
    <div class="small-container row">
      <?php
      echo getProductDetails($conn, 13);
      echo getProductDetails($conn, 14);
      echo getProductDetails($conn, 15);
      echo getProductDetails($conn, 16);
      echo getProductDetails($conn, 17);
      echo getProductDetails($conn, 18);
      echo getProductDetails($conn, 19);
      echo getProductDetails($conn, 20);
      echo getProductDetails($conn, 21);
      echo getProductDetails($conn, 22);
      echo getProductDetails($conn, 23);
      $conn->close();
      ?>
    </div>
  </main>

  <?php
  include("../footer/footer.php");
  ?>

  <script src="../mainPage/index.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
