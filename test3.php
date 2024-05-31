<?php

function getProductDetails($conn, $product_id) {
    static $count = 0;
    $product_id = intval($product_id);

    $sql = "SELECT name, description, image_url, price FROM products WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_html = "
            <div class='col-4'>
                <img src='" . htmlspecialchars($row['image_url']) . "' />
                <a href='../productsDetails/product.html'>
                    <h4>" . htmlspecialchars($row['name']) . "</h4>
                    <div class='rating'>
                        <a href='../checkout/checkout.html'>
                            <button type='submit' class='buybtn'>Buy Now</button>
                        </a>
                    </div>
                    <p>$" . number_format($row['price'], 2) . "</p>
                </a>
            </div>";

        $count++;
        return $product_html;

        if ($count % 4 == 0) {
            echo "<div class='row'>$product_html</div>\n";
        }
    } else {
        return "Product not found.";
    }
}
?>