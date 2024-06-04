<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <!-- ======= Styles ====== -->
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   

<body style="margin:50px;">

              <!-- ===========USERS LIST======== -->
                <div class="usertable">
                <h1 class="listofusers">List Of Users</h1>
                 <br>
                 <table class="table">
                   <thead class="thead">
                  <tr>
                <th>User_ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Is Active</th>
                <th>User Role</th>
                <th>Update/Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php
           $host="mysql-3974ab90-sergionjeim-e9a0.d.aivencloud.com:22356";
           $user="avnadmin";
           $pass="AVNS_lb6GguxdpmlAqBN023C";
           $db="saheltronix";

           $conn = new mysqli($host, $user, $pass, $db);

           if($conn->connect_error) {
            die("Connection failed : ". $conn->connect_error);
           }
           $sql = "SELECT * FROM users";
           $result = $conn->query($sql);

           if(!$result) {
            die("Invalid Query :". $conn->connect_error);
           }

           while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["user_id"] . "</td>
            <td>" . $row["first_name"] . "</td>
            <td>" . $row["last_name"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["address"] . "</td>
            <td>" . $row["phone_number"] . "</td>
            <td>" . $row["is_active"] . "</td>
            <td>" . $row["user_role"] . "</td>
            <td>
            <a class='btn btn-primary btn-sm' href=update>Update</a>
            <a class='btn btn-danger btn-sm' href=delete>Delete</a>
            </td>
         </tr>";

           }
           ?>
           </tbody>
           </table>
        </div>
              <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>            