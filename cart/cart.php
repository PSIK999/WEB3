<?php
include "../signup/connect.php";
require_once '../signup/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
    $product_id = $_POST['product_id'];
    $user_id =  $_SESSION['user_id'];

    if (isset($_POST['remove'])) {
      $quantity = 0;
    } else if (isset($_POST['quantity'])) {
      $quantity = intval($_POST['quantity']);
    } else {
      $quantity = 1;
    }

    function updateCart($product_id, $user_id, $quantity, $conn)
    {
      if ($quantity > 0) {
        $sql = "INSERT INTO shoppingcart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', $quantity) ON DUPLICATE KEY UPDATE quantity = '$quantity'";
      } else {
        $sql = "DELETE FROM shoppingcart WHERE user_id = '$user_id' AND product_id = '$product_id'";
      }
      $conn->query($sql);
    }

    updateCart($product_id, $user_id, $quantity, $conn);
  }
}

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
  <link rel="stylesheet" href="../cart/cart.css" />
</head>

<body loading="lazy">

  <?php
  include("../navbar/navbar.php");
  ?>

  <main>
    <div class="small-container cart-page">
      <table>
        <tr>
          <th>Products</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <?php
        $sql = "SELECT product_id, quantity FROM shoppingcart WHERE user_id = '$user_id'";
        $result = $conn->query($sql);
        $total = 0;
        if ($result->num_rows > 0) {
          $product_ids = array();
          while ($row = $result->fetch_assoc()) {
            $product_ids[] = $row;
          }
          foreach ($product_ids as $product) {
            echo fetchProductDetails($product['product_id'], $product['quantity'], $conn);
            $total += calculateSubtotal($product['product_id'], $product['quantity'], $conn);
          }
        } else {
          echo "<tr><td colspan='3'>You haven't selected any product yet!</td></tr>";
        }

        function fetchProductDetails($product_id, $quantity, $conn)
        {
          $sql = "SELECT name, description, price, image_url FROM products WHERE product_id = '$product_id'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $subtotal = $row['price'] * $quantity;
            $cart_html = "<tr>
            <td>
            <div class='cart-info'>
            <img src='" . htmlspecialchars($row['image_url']) .  "' alt= '" . htmlspecialchars($row['description']) . "'  />
            <div>
            <p>" . htmlspecialchars($row['name']) . "</p>
            <small>Price: $" . number_format($row['price'], 2) . " </small><br />
            <form method='post' style='display:inline;'>
              <input type='hidden' name='product_id' value='$product_id'>
              <button type='submit' name='remove' class='btn btn-link'>Remove</button>
            </form>
            </div>
            </div>
            </td>
            <td>
              <form method='post' class='quantity-form'>
                <input type='hidden' name='product_id' value='$product_id'>
                <input type='number' name='quantity' value='$quantity' min='1' class='quantity-input' />
              </form>
            </td>
            <td><label>$" . number_format($subtotal, 2) . "</label></td>
            </tr>";
            return $cart_html;
          } else {
            return "<tr><td colspan='3'>Product not found.</td></tr>";
          }
        }

        function calculateSubtotal($product_id, $quantity, $conn)
        {
          $sql = "SELECT price FROM products WHERE product_id = '$product_id'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['price'] * $quantity;
          } else {
            return 0;
          }
        }

        $tax = $total * 0.01; 
        $grand_total = $total + $tax;

       
        $conn->close();
        ?>
      </table>

      <div class="total-price">
        <table>
          <tr>
            <td>Subtotal</td>
            <td>$<?php echo number_format($total, 2); ?></td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>$<?php echo number_format($tax, 2); ?></td>
          </tr>
          <tr>
            <td>Total</td>
            <td>$<?php echo number_format($grand_total, 2); ?></td>
          </tr>
          <tr>
            <td>
              <a href="../checkout/checkout.php">
                <button class="checkout-btn">Checkout</button>
              </a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </main>

  <?php
  include("../footer/footer.php");
  ?>

  <script src="../mainPage/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    document.querySelectorAll('.quantity-input').forEach(input => {
      input.addEventListener('change', function() {
        this.form.submit();
      });
    });
  </script>
</body>
</html>  