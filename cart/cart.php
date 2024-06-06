<?php
include "../signup/connect.php";
require_once '../signup/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
    $product_id = $_POST['product_id'];
    $user_id =  $_SESSION['user_id'];
    $quantity = 1;


    function insertIntoCart($product_id, $user_id, $quantity, $conn)
    {
      $sql = "INSERT INTO shoppingcart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id' , $quantity)";
      $conn->query($sql);
    }
  }

  insertIntoCart($product_id, $user_id, $quantity, $conn);
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
        $sql = "SELECT product_id FROM shoppingcart WHERE user_id = '$user_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $product_ids = array();
          while ($row = $result->fetch_assoc()) {
            $product_ids[] = $row['product_id'];
          }
          foreach ($product_ids as $product_id) {
            echo fetchProductDetails($product_id, $user_id, $conn);
          }
        } else {
          echo "You haven't select any product yet!";
        }

        function fetchProductDetails($product_id, $user_id, $conn)
        {
          $sql = "SELECT name, description, price, image_url FROM products WHERE product_id = '$product_id' AND product_id IN (SELECT product_id from shoppingcart WHERE user_id = $user_id);";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cart_html = "<tr>
            <td>
            <div class='cart-info'>
            <img src='" . htmlspecialchars($row['image_url']) .  "' alt= '" . htmlspecialchars($row['description']) . "'  />
            <div>
            <p>" . htmlspecialchars($row['name']) . "</p>
            <small>Price: $" . number_format($row['price'], 2) . " </small><br />
            <a href=''>remove</a>
            </div>
            </div>
            </td>
            <td><input type='number' value='1' /></td>
            <td><label>$2,199.99</label></td>
            </tr>";
            return $cart_html;
          } else {
            return "Product not found.";
          }
        }
        // function removeFromCart($product_id, $user_id, $conn)
        // {
        //   $sql = "DELETE FROM shoppingcart WHERE user_id = '$user_id' AND product_id = '$product_id'";

        //   if ($conn->query($sql) === TRUE) {
        //     return true;
        //   } else {
        //     return false;
        //   }
        // }

        // $removed = removeFromCart(1 ,1, $conn);

        // if ($removed) {
        //   echo "Product removed from shopping cart.";
        // } else {
        //   echo "Error removing product from shopping cart.";
        // }
        // Close the database connection

        $conn->close();
        ?>
      </table>

      <div class="total-price">
        <table>
          <tr>
            <td>Subtotal</td>
            <td>$3900.00</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>$35.00</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>$3935.00</td>
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

  <script src="cart.js"></script>
</body>

</html>

