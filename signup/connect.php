<?php
$host="mysql-3974ab90-sergionjeim-e9a0.d.aivencloud.com";
$port = "22356";
$user="avnadmin";
$pass="AVNS_lb6GguxdpmlAqBN023C";
$db="saheltronix";
  $conn=new mysqli($host,$user,$pass,$db,$port);
  if($conn->connect_error){
     echo "Failed to connect DB".$conn->connect_error;
    }


 ?>
