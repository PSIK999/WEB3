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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color:rgb(210, 210, 210);" >
    <!-- ===========USERS LIST======== -->
    <div class="container mt-5">
        <h1 class="listofusers">List Of Users</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered text-center" style="border-color: black ;">
                <thead class="thead">
                    <tr>
                        <th class="th">User_ID</th>
                        <th class="th">FirstName</th>
                        <th class="th">LastName</th>
                        <th class="th">Email</th>
                        <th class="th">Address</th>
                        <th class="th">Phone Number</th>
                        <th class="th">Is Active</th>
                        <th class="th">User Role</th>
                        <th class="th">Street</th>
                        <th class="th">City</th>
                        <th class="th">Country</th>
                        <th class="th">Postal Code</th>
                        <th class="th">Edit</th>
                        <th class="th">Delete</th>
                        <th class="th">Save</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid Query: " . $conn->connect_error);
                    }

                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr data-id="<?php echo $row['user_id']; ?>">
                            <td ><?php echo $row['user_id'] ?></td>
                            <td class="editable" ><?php echo $row['first_name'] ?></td>
                            <td class="editable" ><?php echo $row['last_name'] ?></td>
                            <td class="editable" ><?php echo $row['email'] ?></td>
                            <td class="editable" ><?php echo $row['address'] ?></td>
                            <td class="editable" ><?php echo $row['phone_number'] ?></td>
                            <td class="editable" ><?php echo $row['is_active'] ?></td>
                            <td class="editable" ><?php echo $row['user_role'] ?></td>
                            <td class="editable" ><?php echo $row['Street'] ?></td>
                            <td class="editable" ><?php echo $row['City'] ?></td>
                            <td class="editable" ><?php echo $row['Country'] ?></td>
                            <td class="editable" ><?php echo $row['Postal_Code'] ?></td>
                            <td ><button class="edit-btn btn btn-primary btn-sm">Edit</button></td>
                            <td ><a class='btn btn-danger btn-sm' href='delete.php?user_id=<?php echo $row["user_id"]; ?>'>Delete</a></td>
                            <td ><button class="save-btn btn btn-success btn-sm" style="display:none;">Save</button></td>
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
                var data = {
                    user_id: id,
                    first_name: row.find('.editable:eq(0) input').val(),
                    last_name: row.find('.editable:eq(1) input').val(),
                    email: row.find('.editable:eq(2) input').val(),
                    address: row.find('.editable:eq(3) input').val(),
                    phone_number: row.find('.editable:eq(4) input').val(),
                    is_active: row.find('.editable:eq(5) input').val(),
                    user_role: row.find('.editable:eq(6) input').val(),
                    street: row.find('.editable:eq(7) input').val(),
                    city: row.find('.editable:eq(8) input').val(),
                    country: row.find('.editable:eq(9) input').val(),
                    postal_code: row.find('.editable:eq(10) input').val()
                };

                $.ajax({
                    url: 'update.php',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.trim() === 'success') {
                            row.find('.editable').each(function(index) {
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
        });
    </script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>