<?php
$host = "mysql-3974ab90-sergionjeim-e9a0.d.aivencloud.com:22356";
$user = "avnadmin";
$pass = "AVNS_lb6GguxdpmlAqBN023C";
$db = "saheltronix";

$conn = new mysqli($host, $user, $pass, $db);

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