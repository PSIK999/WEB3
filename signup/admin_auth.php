<?php
session_start();

// Admin authentication token
$admin_token_name = 'admin_token$589jydu567rjedny';
$admin_token_expiration = 3600; // 1 hour

// Check if the admin token is valid
if (!isset($_SESSION[$admin_token_name]) ||!isset($_SESSION[$admin_token_name. '_expiration']) || $_SESSION[$admin_token_name. '_expiration'] < time()) {
    // Token is invalid or has expired, log out the admin
    unset($_SESSION[$admin_token_name]);
    unset($_SESSION[$admin_token_name. '_expiration']);

    session_destroy();

    header('Location: ../signup/login.php');
    exit();
}

// Token is valid, authenticate the admin
if (isset($_SESSION[$admin_token_name]) && isset($_SESSION[$admin_token_name. '_expiration'])) {
    $admin_id = $_SESSION['admin_id'];
    $admin_email = $_SESSION['admin_email'];
} else {
    // Admin data is not available, redirect the admin to the login page
    header('Location: login.php');
    echo "Admin data is not available";
    exit();
}

// Add HTTP headers to control caching
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
?>
