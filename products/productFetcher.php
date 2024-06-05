
<?php

function getProductDetails($conn, $product_id) {
    $product_id = intval($product_id);

    $sql = "SELECT name, description, image_url, price FROM products WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_html = "
            <div class='col-4'>
                <img src='" . htmlspecialchars($row['image_url']) .  "' alt= '" . htmlspecialchars($row['description']) . "'  />
                <div id='myForm'>
                    <input type='hidden' name='product_id' value='" . htmlspecialchars($product_id) . "' />
                    <input type='hidden' name='name' value='" . htmlspecialchars($row['name']) . "' />
                    <input type='hidden' name='description' value='" . htmlspecialchars($row['description']) . "' />
                    <input type='hidden' name='image_url' value='" . htmlspecialchars($row['image_url']) . "' />
                    <input type='hidden' name='price' value='" . htmlspecialchars($row['price']) . "' />
                    <a href='../productsDetails/product.php'>
                        <h4>" . htmlspecialchars($row['name']) . "</h4>
                    </a>
                    <div class='rating'>
                        <button class='buybtn' onclick='addToCart(this)'>Add to Cart</button>
                    </div>
                    <p>$" . number_format($row['price'], 2) . "</p>
                </div>
            </div>";

        return $product_html;

    } else {
        return "Product not found.";
    }

}
?>
  <script>
    function addToCart(button) {
      var item = button.parentNode.parentNode;
      var productID = item.getElementsByTagName("input")[0].value;

        fetch(
          "../cart/cart.php",
          {
            method: 'POST',
            body: new URLSearchParams({
              product_id: productID
            })
          }
        )
    }
  </script>
