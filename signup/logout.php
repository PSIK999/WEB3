<?php
include ("connect.php");
session_start();
if (isset($_SESSION['user_id']) || isset($_SESSION['email'])) {
    // update the is_active column to 0
    $SQL = "UPDATE users SET is_active = 0 WHERE user_id = '" . $_SESSION['user_id'] . "' OR email = '" . $_SESSION['email'] . "'";
    $result = $conn->query($SQL);

unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['token']);
unset($_SESSION['token_expiration']);



session_destroy();

header('Location: login.php');
exit();

}else{
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['token']);
unset($_SESSION['token_expiration']);



session_destroy();

header('Location: login.php');
exit();
}
?>
