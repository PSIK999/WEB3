<?php
$stmt = $conn->prepare("SELECT COUNT(*) AS num_rows FROM shoppingcart WHERE user_id =?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$num_rows = $row['num_rows'];

echo $num_rows;
?>
