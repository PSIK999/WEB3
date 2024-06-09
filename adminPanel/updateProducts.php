<?php
include "../signup/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $categorie_id = $_POST['categorie_id'];
    $brand_id = $_POST['brand_id'];
    
    $image_url = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = $image;
        move_uploaded_file($image_tmp_name, $image_folder);
        $image_url = ", image_url_1 = '$image'";
    }

    $update_query = "UPDATE products SET name = '$name', description = '$description', price = '$price', categorie_id = '$categorie_id', brand_id = '$brand_id' $image_url WHERE product_id = '$product_id'";

    if (mysqli_query($conn, $update_query)) {
        echo 'success';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>




