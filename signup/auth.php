<?php

session_start();

// Check if the token is valid
if (!isset($_SESSION['token']) ||!isset($_SESSION['token_expiration']) || $_SESSION['token_expiration'] < time()) {
    // Token is invalid or has expired, log out the user
    $SQL = "UPDATE users SET is_active = 0 WHERE user_id = '" . $_SESSION['user_id'] . "' OR email = '" . $_SESSION['email'] . "'";
    $result = $conn->query($SQL);
    unset($_SESSION['user_id']);
    unset($_SESSION['email']);
    unset($_SESSION['token']);
    unset($_SESSION['token_expiration']);
    

    session_destroy();

    header('Location:login.php');
    exit();
}

// Token is valid, authenticate the user
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
}// else {
    // User data is not available, redirect the user to the login page
   // header('Location:./signup/login.php');
   // exit();
//}

// Add HTTP headers to control caching
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');



?>
