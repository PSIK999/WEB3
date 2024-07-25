<?php
include "../signup/connect.php";
require_once '../signup/admin_auth.php';

// Fetch total page views
$sql = "SELECT COUNT(*) as total_page_views FROM page_views";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_page_views = $row['total_page_views'];

// Fetch total orders
$sql = "SELECT COUNT(*) as total_orders FROM orders";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_orders = $row['total_orders'];

// Fetch total reviews
$sql = "SELECT COUNT(*) as total_reviews FROM reviews";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_reviews = $row['total_reviews'];

// Fetch total earnings
$sql = "SELECT SUM(total_price) as total_earnings FROM orders";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_earnings = $row['total_earnings'];

// Fetch recent orders
$sql = "SELECT order_id, user_id, order_date, total_price, order_status FROM orders ORDER BY order_date DESC LIMIT 8";
$result = $conn->query($sql);
$orders = $result->fetch_all(MYSQLI_ASSOC);

// Fetch recent customers
$sql = "SELECT first_name, address FROM users ORDER BY user_id DESC LIMIT 8";
$result = $conn->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="maintitle">𝔖𝔞𝔥𝔢𝔩𝔗𝔯𝔬𝔫𝔦𝔵</span>
                    </a>
                </li>

                <li>
                    <a href="admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="manageUsers.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Manage Users</span>
                    </a>
                </li>

                <li>
                    <a href="charts.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Charts</span>
                    </a>
                </li>

                <li>
                    <a href="manageOrders.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Edit/Cancel Orders</span>
                    </a>
                </li>

                <li>
                    <a href="manageProducts.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Add/Remove Products</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="../signup/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo htmlspecialchars($total_page_views); ?></div>
                        <div class="cardName">Page Views</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo htmlspecialchars($total_orders); ?></div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo htmlspecialchars($total_reviews); ?></div>
                        <div class="cardName">Reviews</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo htmlspecialchars('$' . number_format($total_earnings, 2)); ?></div>
                        <div class="cardName">Earnings</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Order ID</td>
                                <td>User ID</td>
                                <td>Order Date</td>
                                <td>Total Price</td>
                                <td>Order Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                                    <td><?php echo htmlspecialchars($order['user_id']); ?></td>
                                    <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                                    <td><?php echo htmlspecialchars('$' . number_format($order['total_price'], 2)); ?></td>
                                    <td><span class="status <?php echo htmlspecialchars(strtolower($order['order_status'])); ?>"><?php echo htmlspecialchars($order['order_status']); ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>
                                    <h4><?php echo htmlspecialchars($user['first_name']); ?> <br> <span><?php echo htmlspecialchars($user['address']); ?></span></h4>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../mainPage/index.php", true);
            xhr.send();
        })();
    </script>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
