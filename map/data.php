<?php
header('Content-Type: application/json');

$markers = [
    ['lat' => 34.00368390762059, 'lng' => 35.651447946677294, 'name' => 'SahelTronix'],
    // Add more markers as needed
];

echo json_encode($markers);
?>