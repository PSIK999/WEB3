<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/manageUsers.css">
    <link rel="stylesheet" href="assets/css/manageProducts.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-image:url(../images/laptop-murjp1nk4lp1idlt.jpg)">
    <!-- =========== ADD NEW PRODUCT FORM ======== -->
    <div class="container mt-5">
        <h1 class="titleproduct">Add New Product</h1>
        <form id="addProductForm" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="productId" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="productId" name="product_id" required>
            </div>
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Product Description</label>
                <input type="text" class="form-control" id="productDescription" name="description" required>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price ($)</label>
                <input type="number" class="form-control" id="productPrice" name="price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="productImage1" class="form-label">Product Image 1</label>
                <input type="file" class="form-control" id="productImage1" name="image_url_1" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="productImage2" class="form-label">Product Image 2</label>
                <input type="file" class="form-control" id="productImage2" name="image_url_2" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="productImage3" class="form-label">Product Image 3</label>
                <input type="file" class="form-control" id="productImage3" name="image_url_3" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="productImage4" class="form-label">Product Image 4</label>
                <input type="file" class="form-control" id="productImage4" name="image_url_4" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="categoryId" class="form-label">Category ID</label>
                <input type="text" class="form-control" id="categoryId" name="categorie_id" required>
            </div>
            <div class="mb-3">
                <label for="brandId" class="form-label">Brand ID</label>
                <input type="text" class="form-control" id="brandId" name="brand_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <!-- =========== USERS LIST ======== -->
    <div class="usertable mt-5">
        <h1 class="listofusers">List Of Products</h1>
        <br>
        <table class="table table-bordered text-center" style="border-color: rgb(255, 196, 0);">
            <thead class="thead">
                <tr>
                    <th class="th">Product_ID</th>
                    <th class="th">Name</th>
                    <th class="th">Description</th>
                    <th class="th">Price : $</th>
                    <th class="th">Image</th>
                    <th class="th">Category ID</th>
                    <th class="th">Brand ID</th>
                    <th class="th">Edit</th>
                    <th class="th">Delete</th>
                    <th class="th">Save</th>
                </tr>
            </thead>
            <tbody id="productTableBody">
                <?php
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr data-id="<?php echo $row['product_id']; ?>">
                        <td style="background-color:black; color: rgb(255, 196, 0);"><?php echo $row['product_id'] ?></td>
                        <td class="editable" style="background-color:black; color: rgb(255, 196, 0);"><?php echo $row['name'] ?></td>
                        <td class="editable" style="background-color:black; color: rgb(255, 196, 0);"><?php echo $row['description'] ?></td>
                        <td class="editable" style="background-color:black; color: rgb(255, 196, 0);"><?php echo $row['price'] ?></td>
                        <td class="editable" style="background-color:black; color: rgb(255, 196, 0);"><img src="<?php echo $row['image_url_1']; ?>" height="100" alt=""></td>
                        <td class="editable" style="background-color:black; color: rgb(255, 196, 0);"><?php echo $row['categorie_id'] ?></td>
                        <td class="editable" style="background-color:black; color: rgb(255, 196, 0);"><?php echo $row['brand_id'] ?></td>
                        <td style="background-color:black;"><button class="edit-btn btn btn-primary btn-sm">Edit</button></td>
                        <td style="background-color:black;"><a class='btn btn-danger btn-sm' href='deleteProducts.php?product_id=<?php echo $row["product_id"]; ?>'>Delete</a></td>
                        <td style="background-color:black;"><button class="save-btn btn btn-success btn-sm" style="display:none;">Save</button></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- =========== Scripts ========= -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function() {
                var row = $(this).closest('tr');
                row.find('.editable').each(function() {
                    if ($(this).find('img').length) {
                        $(this).html('<input type="file" class="form-control" accept="image/png, image/jpeg, image/jpg">');
                    } else {
                        var value = $(this).text();
                        $(this).html('<input type="text" class="form-control" value="' + value + '">');
                    }
                });
                row.find('.edit-btn').hide();
                row.find('.save-btn').show();
            });

            $('.save-btn').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.data('id');
                var formData = new FormData();
                formData.append('product_id', id);
                formData.append('name', row.find('.editable:eq(0) input').val());
                formData.append('description', row.find('.editable:eq(1) input').val());
                formData.append('price', row.find('.editable:eq(2) input').val());
                var imageFile = row.find('.editable:eq(3) input')[0].files[0];
                if (imageFile) {
                    formData.append('image', imageFile);
                }
                formData.append('categorie_id', row.find('.editable:eq(4) input').val());
                formData.append('brand_id', row.find('.editable:eq(5) input').val());

                $.ajax({
                    url: 'updateProducts.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.trim() === 'success') {
                            row.find('.editable').each(function(index) {
                                if ($(this).find('input[type="file"]').length) {
                                    var imageUrl = URL.createObjectURL(imageFile);
                                    $(this).html('<img src="' + imageUrl + '" height="100" alt="">');
                                } else {
                                    var value = $(this).find('input').val();
                                    $(this).text(value);
                                }
                            });
                            row.find('.save-btn').hide();
                            row.find('.edit-btn').show();
                        } else {
                            alert('Update: ' + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('AJAX error: ' + error);
                    }
                });
            });
            

            $('#addProductForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: 'addProduct.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.trim() === 'success') {
                            alert('Product added successfully!');
                            location.reload();  // Reload the page to see the new product in the table
                        } else {
                            alert('Add Product: ' + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('AJAX error: ' + error);
                    }
                });
            });
        })
    </script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
