<?php
include "../signup/connect.php";
session_start();
$user_id = $_SESSION['user_id'];

$sql = "SELECT p.product_id, p.name, p.description, p.image_url_1, p.price 
        FROM wishlist w
        JOIN products p ON w.product_id = p.product_id
        WHERE w.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Your Wishlist</h1>
        <div class="row">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='col-4'>
                    <a href='../productsDetails/product.php?id={$row['product_id']}'>
                        <img src='". htmlspecialchars($row['image_url_1']). "' alt='". htmlspecialchars($row['description']). "' class='img-fluid' />
                    </a>
                    <h4>". htmlspecialchars($row['name']). "</h4>
                    <p>$". number_format($row['price'], 2). "</p>
                </div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
