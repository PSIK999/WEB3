<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Delete related records in order_items table
        $sql = "DELETE FROM order_items WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $order_id);
        $stmt->execute();
        $stmt->close();

        // Delete record in orders table
        $sql = "DELETE FROM orders WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $order_id);
        $stmt->execute();
        $stmt->close();

        // Commit transaction
        $conn->commit();
        echo "Order deleted successfully";
    } catch (Exception $e) {
        // Rollback transaction if any error occurs
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>
