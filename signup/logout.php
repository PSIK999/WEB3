<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['token']);
unset($_SESSION['token_expiration']);

session_destroy();

header('Location: login.php');
exit();
?>