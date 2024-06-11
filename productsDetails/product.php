<?php
include "../signup/connect.php";
include '../signup/regular_auth.php';
//productdetails.php
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

  if (isset($_GET['product_id'])) {
      $product_id = intval($_GET['product_id']);
      $sql = "SELECT * FROM products WHERE product_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $product_id);
      $stmt->execute();
      $result = $stmt->get_result();
      $product = $result->fetch_assoc();
      $stmt->close();

      $categorie_id = $product['categorie_id'];

      // Define Option Groups for Each Category
      $category_option_groups = [
          1 => ['Graphics Cards', 'Processors', 'RAM', 'Storage'], // Desktop
          2 => ['RAM', 'Storage'], // Laptop
          3 => ['Refresh Rate', 'Resolution'], // Monitor
          // Add more categories if needed
      ];

      $option_groups_to_fetch = $category_option_groups[$categorie_id] ?? [];

      $options_data = [];
      if (!empty($option_groups_to_fetch)) {
          // Convert the option groups to a string of comma-separated quoted values
          $option_groups_to_fetch_str = "'" . implode("','", $option_groups_to_fetch) . "'";

          // Fetch relevant option groups and values
          $sql = "SELECT og.option_group_id, og.name AS group_name, ov.option_value_id, ov.name AS value_name, ov.price_adjustment 
                  FROM option_groups og
                  JOIN option_values ov ON og.option_group_id = ov.option_group_id
                  WHERE og.name IN ($option_groups_to_fetch_str)";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $option_groups = $stmt->get_result();

          while ($row = $option_groups->fetch_assoc()) {
              $options_data[$row['group_name']][] = $row;
          }
          $_SESSION['PRODUCTT'] = $product['product_id'];
          
          $stmt->close();
      }

      $conn->close();
  }
  ?>

  <main>
    <?php
    if ($product) {
        echo "
        <div class='small-container single-product'>
          <div class='row'>
            <div class='col-2'>
              <img src='" . htmlspecialchars($product['image_url_1']) . "' alt='" . htmlspecialchars($product['description']) . "' width='100%' id='ProductImg'  class='small-img' />
              <div class='small-img-row'>
                <div class='small-img-col'>
                  <img src='" . htmlspecialchars($product['image_url_1']) . "' alt='" . htmlspecialchars($product['description']) . "' width='100%'   class='small-img' />
                </div>
                <div class='small-img-col'>
                  <img src='" . htmlspecialchars($product['image_url_2']) . "' alt='" . htmlspecialchars($product['description']) . "' width='100%' class='small-img' />
                </div>
                <div class='small-img-col'>
                   <img src='" . htmlspecialchars($product['image_url_4']) . "' alt='" . htmlspecialchars($product['description']) . "' width='100%'  class='small-img' />                  
                </div>
                <div class='small-img-col'>
                 <img src='" . htmlspecialchars($product['image_url_3']) . "' alt='" . htmlspecialchars($product['description']) . "' width='100%'  class='small-img' />
                </div>
              </div>
            </div>
            <div class='col-2'>
              <p>Home / " . htmlspecialchars($product['name']) . "</p>
              <h1>" . htmlspecialchars($product['name']) . "</h1>
              <h4>Price: $<span id='base-price'>" . htmlspecialchars($product['price']) . "</span></h4>
              <h4>Total Price: $<span id='total-price'>" . htmlspecialchars($product['price']) . "</span></h4>
              
              <!-- Display option groups -->
              ";

              foreach ($options_data as $group_name => $options) {
                  echo "<label for='" . htmlspecialchars($group_name) . "'>" . htmlspecialchars($group_name) . ":</label>
                  <select class='option-group' name='" . htmlspecialchars($group_name) . "' onchange='updatePrice()'>";
                  foreach ($options as $option) {
                      echo "<option value='" . htmlspecialchars($option['option_value_id']) . "' data-price-adjustment='" . htmlspecialchars($option['price_adjustment']) . "'>" . htmlspecialchars($option['value_name']) . " (" . ($option['price_adjustment'] >= 0 ? '+' : '-') . "$" . abs($option['price_adjustment']) . ")</option>";
                  }
                  echo "</select><br>";
              }
        
              echo "
              <input type='number' min='0' max='10' value='1' />
              ";
        
              
              if (isset($_SESSION['log']) && $_SESSION['log']) {
                  echo "<button class='bton' id='add-to-cart-button' data-product-id='" . htmlspecialchars($product['product_id']) . "' onclick='addToCart(this)'>Add to Cart</button>
                  <button onclick='addreview(this)' class='bton'>Add a Review</button>";
              } else {
                  echo "<a href='../signup/login.php'><button class='bton'>Buy Now</button></a>
                  <a href='../signup/login.php'><button class='bton'>Add To Cart</button></a>
                  <a href='../signup/login.php'><button class='bton'>Add a Review</button></a>";
              }
              
              
              echo "<form id='review-form' method='post' action='submit_review.php'>
               <input type='hidden' name='product_id' value='<?php echo $product_id; ?>'>
                  <div class='star-rating'>
                      <span class='fa fa-star' data-rating='1'></span>
                      <span class='fa fa-star' data-rating='2'></span>
                      <span class='fa fa-star' data-rating='3'></span>
                      <span class='fa fa-star' data-rating='4'></span>
                      <span class='fa fa-star' data-rating='5'></span>
                      <input type='hidden' name='rating' id='rating' value='1'>
                  </div>
                  <textarea name='review' placeholder='Write your review here...' required></textarea>
                  <button type='submit' class='bton'>Submit Review</button>
              </form>";
              echo "<h3>Product Details <i class='fa fa-indent'></i></h3><br><p>" . htmlspecialchars($product['description']) . "</p></div></div></div>";
    } else {
        echo "<p>Product not found.</p>";
    }
    ?>
    <?php
        // Fetch random related products
       /* $sql = "SELECT * FROM products WHERE categorie_id = ? ORDER BY RAND() LIMIT 4";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $categorie_id);
        $stmt->execute();
        $related_products = $stmt->get_result();
        $stmt->close();*/
    ?>
   <div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <?php echo var_dump($product['product_id']); ?>
        <p class="Viewmore"><a href="../allproducts/allproducts.html">View more</a></p>
    </div>
</div><!-- 
<div class="small-container">
    <div class="row">
        <?php // while ($related_product = $related_products->fetch_assoc()): ?>
        <div class="col-4">
            <img src="<?php // echo htmlspecialchars($related_product['image_url_1']); ?>" />
            <a href="../productsDetails/product.php?product_id=<?php // echo $related_product['product_id']; ?>">
                <h4><?php // echo htmlspecialchars($related_product['name']); ?></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$<?php // echo number_format($related_product['price'], 2); ?></p>
            </a>
        </div>
        <?php // endwhile; ?>
    </div>
</div>-->
  </main>

  <?php
  include("../footer/footer.php");
  ?>

  <script src="../productsDetails/product.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
  <script>

function addToCart(button) {
    var productID = button.dataset.productId;
    var quantity = 1; // Customize quantity as needed

    // Get the total price
    var totalPrice = parseFloat(document.getElementById('total-price').innerText);

    fetch("../cart/cart.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            product_id: productID,
            quantity: quantity,
            total_price: totalPrice // Pass the total price
        })
    }).then(response => response.json()) // Expect JSON response
    .then(data => {
        if (data.success) {
            alert('Product added to cart!');
            // Optionally, redirect to the cart page or update cart UI
            // window.location.href = '../cart/cart.php';
        } else {
            alert('Failed to add product to cart.');
        }
    }).catch(error => console.error('Error:', error));
}



</script>
<script>
    document.querySelectorAll('.star-rating .fa').forEach(star => {
        star.addEventListener('click', function() {
            let rating = this.getAttribute('data-rating');
            document.getElementById('rating').value = rating;

            document.querySelectorAll('.star-rating .fa').forEach(s => {
                s.classList.remove('selected');
            });

            this.classList.add('selected');
            let previousSiblings = getPreviousSiblings(this);
            previousSiblings.forEach(s => s.classList.add('selected'));
        });
    });

    function getPreviousSiblings(element) {
        let siblings = [];
        while (element = element.previousElementSibling) {
            siblings.push(element);
        }
        return siblings;
    }
</script>
</body>
</html>

