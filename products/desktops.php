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
        <h2>All Desktops</h2>
        <select class="selectbtn" id="sortDropdown">
  <option value="default">Default sorting</option>
  <option value="highest">Sort by highest price</option>
  <option value="lowest">Sort by lowest price</option>
  <option value="az">Sort A-Z</option>
  <option value="za">Sort Z-A</option>
</select>
      </div>
    </div>
    <div class="small-container row">
      <?php
      echo getProductDetails($conn, 1);
      echo getProductDetails($conn, 2);
      echo getProductDetails($conn, 3);
      echo getProductDetails($conn, 4);
      $conn->close();
      ?>
    </div>
  </main>

  <?php
  include("../footer/footer.php");
  ?>
    <script>
  document.getElementById('sortDropdown').addEventListener('change', function() {
  const sortValue = this.value;
  if (sortValue === 'az' || sortValue === 'za') {
    fetchSortedProducts(sortValue, 'name'); // Sort by name
  } else {
    fetchSortedProducts(sortValue, 'price'); // Sort by price
  }
});

function fetchSortedProducts(sortBy, orderBy) {
  fetch(`../products/sort_desktops.php?sort_by=${sortBy}&order_by=${orderBy}`)
    .then(response => response.text())
    .then(data => {
      document.querySelector('.small-container.row').innerHTML = data;
    })
    .catch(error => console.error('Error fetching sorted products:', error));
}
</script>
  <script src="../mainPage/index.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
