<?php
include ("connect.php");;

 session_start();

function isLoggedIn() {
    if (isset($_SESSION['email'] )) {
        return true;
    } else {
        return false;
    }
}


$loggedIn = isLoggedIn();
$_SESSION['log'] = $loggedIn;


?>
