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
$host="mysql-3974ab90-sergionjeim-e9a0.d.aivencloud.com:22356";
$user="avnadmin";
$pass="AVNS_lb6GguxdpmlAqBN023C";
$db="saheltronix";
  $conn=new mysqli($host,$user,$pass,$db);
  if($conn->connect_error){
     echo "Failed to connect DB".$conn->connect_error;
    }


 ?>