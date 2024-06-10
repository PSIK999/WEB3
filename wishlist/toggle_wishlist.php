<?php
include "../signup/connect.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $product_id = intval($_POST['product_id']);
    $add = filter_var($_POST['add'], FILTER_VALIDATE_BOOLEAN);

    if ($add) {
        // Add product to wishlist
        $stmt = $conn->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (?, ?) ON DUPLICATE KEY UPDATE user_id=user_id");
        $stmt->bind_param("ii", $user_id, $product_id);
    } else {
        // Remove product from wishlist
        $stmt = $conn->prepare("DELETE FROM wishlist WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("ii", $user_id, $product_id);
    }

    $stmt->execute();
    $stmt->close();
}
?>
