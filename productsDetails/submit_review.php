<?php
include "../signup/connect.php";
require_once '../signup/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id'], $_SESSION['user_id'], $_POST['rating'], $_POST['review'])) {
        $product_id = intval($_POST['product_id']);
        $user_id = intval($_SESSION['user_id']);
        $rating = intval($_POST['rating']);
        $review = trim($_POST['review']);

        if ($product_id > 0 && $rating >= 1 && $rating <= 5 && !empty($review)) {
            $sql = "INSERT INTO reviews (user_id, product_id, rating, review) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('iiis', $user_id, $product_id, $rating, $review);
            if ($stmt->execute()) {
                echo "Review submitted successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Invalid product ID or rating value.";
        }
    } else {
        echo "Missing required information.";
    }
}
?>
