<?php

include "../signup/connect.php";
include '../signup/regular_auth.php';



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
  <link rel="stylesheet" href="../productsDetails/product.css" />
</head>

<body loading="lazy">

  <?php
  include("../navbar/navbar.php");

  ?>

  <main>
    <?php
    if (isset($_GET['product_id'])) {
      $product_id = intval($_GET['product_id']);
      $sql = "SELECT name, description, image_url_1, image_url_2, image_url_3, image_url_4, price FROM products WHERE product_id = $product_id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "
              <div class='small-container single-product'>
              <div class='row'>
                      <div class='col-2'>

              <img src='" . htmlspecialchars($row['image_url_1']) .  "' alt= '" . htmlspecialchars($row['description']) . "' width='100%' id='ProductImg'   />
              <div class='small-img-row'>
              <div class='small-img-col'>
              <img src='" . htmlspecialchars($row['image_url_1']) .  "' alt= '" . htmlspecialchars($row['description']) . "' width='100%' id='ProductImg' />
              </div>
              <div class='small-img-col'>
              <img src='" . htmlspecialchars($row['image_url_2']) .  "' alt= '" . htmlspecialchars($row['description']) . "' width='100%' id='ProductImg'/>
              </div>
              <div class='small-img-col'>
              <img src='" . htmlspecialchars($row['image_url_3']) .  "' alt= '" . htmlspecialchars($row['description']) . "' width='100%' id='ProductImg' />
              </div>
              <div class='small-img-col'>
              <img src='" . htmlspecialchars($row['image_url_4']) .  "' alt= '" . htmlspecialchars($row['description']) . "' width='100%' id='ProductImg' />
              </div>
              </div>
              </div>
            <div class='col-2'>
                 <p>Home / laptop</p>
                 <h1> " . htmlspecialchars($row['name']) . "</h1>
                 <h4> " . htmlspecialchars($row['price']) . "$</h4>
                 <select>
                   <option>Select Ram</option>
                   <option>16 GB</option>
                   <option>32 GB</option>
                   <option>64 GB</option>
                 </select>
                 ";
      }
    }
    ?>

      <input type="number" min="0" max="10" value="1" />

      <?php if (isset($_SESSION['log']) && $_SESSION['log']) { ?>
        <a href="../checkout/checkout.php"><button class="bton">Buy Now</button></a>
        <a href="../cart/cart.php"><button class="bton">Add To Cart</button></a>
        <a href="../cart/cart.php"><button class="bton">Add a Review</button></a>
      <?php } else { ?>
        <a href="../signup/login.php"><button class="bton">Buy Now</button></a>
        <a href="../signup/login.php"><button class="bton">Add To Cart</button></a>
        <a href="../signup/login.php"><button class="bton">Add a Review</button></a>

      <?php } ?>
    <?php
    $categorie_id = $row['categorie_id'];

    // Fetch relevant option groups and values
    $sql = "SELECT og.option_group_id, og.name AS group_name, ov.option_value_id, ov.name AS value_name, ov.price_adjustment 
                        FROM option_groups og
                        JOIN option_values ov ON og.option_group_id = ov.option_group_id
                        WHERE og.categorie_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $categorie_id);
    $stmt->execute();
    $option_groups = $stmt->get_result();

    // Prepare data for displaying
    $options_data = [];
    while ($row = $option_groups->fetch_assoc()) {
      $options_data[$row['group_name']][] = $row;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
    ?>


    <script>
      function updatePrice() {
        let basePrice = parseFloat(document.getElementById('base-price').innerText);
        let totalPrice = basePrice;

        let selectElements = document.querySelectorAll('select.option-group');
        selectElements.forEach(select => {
          let priceAdjustment = parseFloat(select.selectedOptions[0].dataset.priceAdjustment);
          totalPrice += priceAdjustment;
        });

        document.getElementById('total-price').innerText = totalPrice.toFixed(2);
      }
    </script>

      <h1><?php echo htmlspecialchars($product['name']); ?></h1>
      <p><?php echo htmlspecialchars($product['description']); ?></p>
      <p>Price: $<span id="base-price"><?php echo htmlspecialchars($product['price']); ?></span></p>

      <!-- Display option groups -->
      <?php foreach ($options_data as $group_name => $options) : ?>
        <label for="<?php echo htmlspecialchars($group_name); ?>"><?php echo htmlspecialchars($group_name); ?>:</label>
        <select class="option-group" name="<?php echo htmlspecialchars($group_name); ?>" onchange="updatePrice()">
          <?php foreach ($options as $option) : ?>
            <option value="<?php echo htmlspecialchars($option['option_value_id']); ?>" data-price-adjustment="<?php echo htmlspecialchars($option['price_adjustment']); ?>">
              <?php echo htmlspecialchars($option['value_name']); ?> (<?php echo $option['price_adjustment'] >= 0 ? '+' : '-'; ?>$<?php echo abs($option['price_adjustment']); ?>)
            </option>
          <?php endforeach; ?>
        </select>
        <br>
      <?php endforeach; ?>

      <p>Total Price: $<span id="total-price"><?php echo htmlspecialchars($product['price']); ?></span></p>




    
      <h3>Product Details <i class="fa fa-indent"></i></h3>
      <br />
      <p>description</p>
      </div>
      </div>
      </div>


      <div class="small-container">
        <div class="row row-2">
          <h2>Related Products</h2>
          <p class="Viewmore">
            <a href="../allproducts/allproducts.html">View more</a>
          </p>
        </div>
      </div>
      <div class="small-container">
        <div class="row">
          <div class="col-4">
            <img src="../images/productsImages/keyboards/Genesis RX85 NKG-0959 Mechanical Gaming Keyboard/Z23287_90546.jpg" />
            <a href="../productsDetails/product.html">
              <h4>Genesis RX85 NKG-0959 Mechanical Gaming Keyboard</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>$750.00</p>
            </a>
          </div>
          <div class="col-4">
            <img src="../images/productsImages/desktops/Alienware Aurora Core i7-9700k Desktop Computers/AlienwareAurora_3_-C.jpg" />
            <a href="../productsDetails/product.html">
              <h4>Alienware Aurora Core i7-9700k Desktop Computer</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <p>$1500.00</p>
            </a>
          </div>
          <div class="col-4">
            <img src="../images/productsImages/graphics cards/Vga Msi Ventus 3x Rtx 3090 24gb GDDR6X OC Edition/MsiGeForceRTX3090VENTUS3X24GOC_2.jpg" />
            <a href="../productsDetails/product.html">
              <h4>Vga Msi Ventus 3x Rtx 3090 24gb GDDR6X OC Edition</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <p>$875.00</p>
            </a>
          </div>
          <div class="col-4">
            <img src="../images/productsImages/keyboards/Hyperx Alloy Elite 2 Rgb Mechanical Gaming Keyboard/HyperxElite2_4.jpg" />
            <a href="../productsDetails/product.html">
              <h4>Hyperx Alloy Elite 2 Rgb Mechanical Gaming Keyboard</h4>
              <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <p>$150.00</p>
            </a>
          </div>
        </div>
      </div>
  </main>
  <?php
  include("../footer/footer.php");
  ?>

  <script src="../productsDetails/product.js"></script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
