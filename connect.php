<?php
/*$dsn = "mysql:host=localhost;dbname=saheltronixs01";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    echo "connected";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Connection failed: " .$e->getMessage();
}
*/
$host="localhost";
$user="root";
$pass="";
$db="saheltronixs01";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}

?>