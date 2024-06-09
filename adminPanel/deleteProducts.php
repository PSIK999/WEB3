<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';





if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
}

$product_id = $_GET['product_id'];

$sql = "DELETE FROM products WHERE product_id='$product_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: manageProducts.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
