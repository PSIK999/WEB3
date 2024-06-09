
<?php
include "../signup/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $categorie_id = $_POST['categorie_id'];
    $brand_id = $_POST['brand_id'];

    $image_url_1 = '';
    if (isset($_FILES['image_url_1']) && $_FILES['image_url_1']['error'] === UPLOAD_ERR_OK) {
        $image_url_1 =  basename($_FILES['image_url_1']['name']);
        move_uploaded_file($_FILES['image_url_1']['tmp_name'], $image_url_1);
    }

    $image_url_2 = '';
    if (isset($_FILES['image_url_2']) && $_FILES['image_url_2']['error'] === UPLOAD_ERR_OK) {
        $image_url_2 =  basename($_FILES['image_url_2']['name']);
        move_uploaded_file($_FILES['image_url_2']['tmp_name'], $image_url_2);
    }

    $image_url_3 = '';
    if (isset($_FILES['image_url_3']) && $_FILES['image_url_3']['error'] === UPLOAD_ERR_OK) {
        $image_url_3 =  basename($_FILES['image_url_3']['name']);
        move_uploaded_file($_FILES['image_url_3']['tmp_name'], $image_url_3);
    }

    $image_url_4 = '';
    if (isset($_FILES['image_url_4']) && $_FILES['image_url_4']['error'] === UPLOAD_ERR_OK) {
        $image_url_4 =  basename($_FILES['image_url_4']['name']);
        move_uploaded_file($_FILES['image_url_4']['tmp_name'], $image_url_4);
    }

    $sql = "INSERT INTO products (product_id, name, description, price, image_url_1, image_url_2, image_url_3, image_url_4, categorie_id, brand_id)
            VALUES ('$product_id', '$name', '$description', '$price', '$image_url_1', '$image_url_2', '$image_url_3', '$image_url_4', '$categorie_id', '$brand_id')";

    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'Error: ' . $conn->error;
    }

    $conn->close();
}
?>
