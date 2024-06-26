<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : 0;
    $is_active = isset($_POST['is_active']) ? intval($_POST['is_active']) : 0;
    $user_role = isset($_POST['user_role']) ? $_POST['user_role'] : '';
    $street = isset($_POST['street']) ? $_POST['street'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $postal_code = isset($_POST['Postal_Code']) ? $_POST['Postal_Code'] : '';

    if ($user_id > 0) {
        $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, address=?, phone_number=?, is_active=?, user_role=?, Street=?, City=?, Country=?, Postal_Code=? WHERE user_id=?");
        $stmt->bind_param("ssssssssssii", $first_name, $last_name, $email, $address, $phone_number, $is_active, $user_role, $street, $city, $country, $postal_code, $user_id);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'error: Invalid user_id';
    }
}

$conn->close();
?>

