<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $user_id = $_POST['user_id'];
    $order_date = $_POST['order_date'];
    $total_price = $_POST['total_price'];
    $order_status = $_POST['order_status'];

    $sql = "UPDATE orders SET user_id = ?, order_date = ?, total_price = ?, order_status = ? WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $user_id, $order_date, $total_price, $order_status, $order_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
