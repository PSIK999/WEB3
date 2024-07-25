<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';
?>

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
    <title>Manage Orders</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/manageUsers.css">
    <link rel="stylesheet" href="assets/css/manageProducts.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color:rgb(210, 210, 210);">

    <!-- =========== ORDERS LIST ======== -->
    <div class="container mt-5">
        <h1 class="listofusers">List Of Orders</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered text-center" style="border-color: black;">
                <thead class="thead">
                    <tr>
                        <th class="th">Order_ID</th>
                        <th class="th">User ID</th>
                        <th class="th">Order Date</th>
                        <th class="th">Total Price : $</th>
                        <th class="th">Order Status</th>
                        <th class="th">Edit</th>
                        <th class="th">Cancel</th>
                        <th class="th">Save</th>
                    </tr>
                </thead>
                <tbody id="orderTableBody">
                    <?php
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM orders";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr data-id="<?php echo $row['order_id']; ?>">
                            <td><?php echo $row['order_id'] ?></td>
                            <td class="editable"><?php echo $row['user_id'] ?></td>
                            <td class="editable"><?php echo $row['order_date'] ?></td>
                            <td class="editable"><?php echo $row['total_price'] ?></td>
                            <td class="editable"><?php echo $row['order_status'] ?></td>
                            <td><button class="edit-btn btn btn-primary btn-sm">Edit</button></td>
                            <td><a class='btn btn-danger btn-sm' href='cancelOrder.php?order_id=<?php echo $row["order_id"]; ?>'>Delete</a></td>
                            <td><button class="save-btn btn btn-success btn-sm" style="display:none;">Save</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- =========== Scripts ========= -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function() {
                var row = $(this).closest('tr');
                row.find('.editable').each(function() {
                    var value = $(this).text();
                    $(this).html('<input type="text" class="form-control" value="' + value + '">');
                });
                row.find('.edit-btn').hide();
                row.find('.save-btn').show();
            });

            $('.save-btn').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.data('id');
                var formData = new FormData();
                formData.append('order_id', id);
                formData.append('user_id', row.find('.editable:eq(0) input').val());
                formData.append('order_date', row.find('.editable:eq(1) input').val());
                formData.append('total_price', row.find('.editable:eq(2) input').val());
                formData.append('order_status', row.find('.editable:eq(3) input').val());

                $.ajax({
                    url: 'updateOrder.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.trim() === 'success') {
                            row.find('.editable').each(function() {
                                var value = $(this).find('input').val();
                                $(this).text(value);
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
        })
    </script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
