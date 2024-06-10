<?php
function getProductDetails($conn, $product_id) {
    $product_id = intval($product_id);

    $sql = "SELECT name, description, image_url_1, price FROM products WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_html = "
            <div class='col-4'>
                <a href='../productsDetails/product.php?id={$product_id}'>
                    <img src='". htmlspecialchars($row['image_url_1']).  "' alt= '". htmlspecialchars($row['description']). "'  />
                </a>
                <div id='myForm'>
                    <input type='hidden' name='product_id' value='". htmlspecialchars($product_id). "' />
                    <input type='hidden' name='name' value='". htmlspecialchars($row['name']). "' />
                    <input type='hidden' name='description' value='". htmlspecialchars($row['description']). "' />
                    <input type='hidden' name='image_url' value='". htmlspecialchars($row['image_url_1']). "' />
                    <input type='hidden' name='price' value='". htmlspecialchars($row['price']). "' />
                    <a href='../productsDetails/product.php'>
                        <h4>". htmlspecialchars($row['name']). "</h4>
                    </a>
                    <div class='rating'>
                        <button class='buybtn' id='add-to-cart-button' onclick='addToCart(this)'>Add to Cart</button>
                        <i class='fa fa-heart' id='wishlist-icon' onclick='toggleWishlist(this, ". htmlspecialchars($product_id). ")'></i>
                    </div>
                    <p>$". number_format($row['price'], 2). "</p>
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
        );
    }

    function toggleWishlist(icon, productID) {
        icon.classList.toggle('text-danger');
        var isInWishlist = icon.classList.contains('text-danger');

        fetch(
            "../wishlist/toggle_wishlist.php",
            {
                method: 'POST',
                body: new URLSearchParams({
                    product_id: productID,
                    add: isInWishlist
                })
            }
        );
    }
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />
