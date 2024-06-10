<?php
include "../signup/connect.php";
include "../products/productFetcher.php"; 

$sortBy = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'default';
$orderBy = isset($_GET['order_by']) ? $_GET['order_by'] : '';

$sql = "SELECT product_id FROM products WHERE categorie_id = 4 " ;
if ($orderBy === 'name') {
  if ($sortBy === 'az') {
    $sql .= " ORDER BY name ASC";
  } elseif ($sortBy === 'za') {
    $sql .= " ORDER BY name DESC";
  }
} else {
  // Default to sorting by price
  if ($sortBy === 'highest') {
    $sql .= " ORDER BY price DESC";
  } elseif ($sortBy === 'lowest') {
    $sql .= " ORDER BY price ASC";
  }
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo getProductDetails($conn, $row['product_id']);
  }
} else {
  echo "No products found.";
}
?>
