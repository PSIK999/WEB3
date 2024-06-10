<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';

if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
}

$user_id = $_GET['user_id'];

$sql = "DELETE FROM users WHERE user_id='$user_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: manageUsers.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
