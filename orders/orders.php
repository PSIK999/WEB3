<?php
include "../signup/connect.php";
require_once '../signup/auth.php';

$user_id = $_SESSION['user_id'];

// Handle cancel order request
if (isset($_POST['cancel_order'])) {
    $order_id = $_POST['order_id'];
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ? AND user_id = ? AND status = 'pending'");
    $stmt->bind_param("ii", $order_id, $user_id);
    $stmt->execute();
}

// Handle remove order request
if (isset($_POST['remove_order'])) {
    $order_id = $_POST['order_id'];
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $order_id, $user_id);
    $stmt->execute();
}

$stmt = $conn->prepare("SELECT o.order_id, o.total_price, o.order_date, o.order_status, oi.product_id, oi.quantity, oi.price, p.name, p.image_url_1 FROM orders o JOIN order_items oi ON o.order_id = oi.order_id JOIN products p ON oi.product_id = p.product_id WHERE o.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[$row['order_id']]['order_date'] = $row['order_date'];
    $orders[$row['order_id']]['total_price'] = $row['total_price'];
    $orders[$row['order_id']]['order_status'] = $row['order_status'];
    $orders[$row['order_id']]['items'][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../navbar/navbar.css" />
    <link rel="stylesheet" href="../footer/footer.css" />
</head>
<body loading="lazy">
    <?php include ("../navbar/navbar.php"); ?>

    <main>
        <section class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">My Orders</h3>
                        <?php if (!empty($orders)) : ?>
                            <?php foreach ($orders as $order_id => $order) : ?>
                                <div class="card mb-4 shadow-0 border">
                                    <div class="card-body">
                                        <h5 class="card-title">Order #<?= $order_id ?></h5>
                                        <p>Order Date: <?= $order['order_date'] ?></p>
                                        <p>Total Price: $<?= number_format($order['total_price'], 2) ?></p>
                                        <p>Status: <?= ucfirst($order['order_status']) ?></p>
                                        <div class="d-flex justify-content-between">
                                            <?php if ($order['order_status'] == 'pending') : ?>
                                                <form method="POST" action="orders.php" class="me-2">
                                                    <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                    <button type="submit" name="cancel_order" class="btn btn-danger">Cancel Order</button>
                                                </form>
                                            <?php endif; ?>
                                            <form method="POST" action="orders.php">
                                                <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                                <button type="submit" name="remove_order" class="btn btn-secondary">Remove Order</button>
                                            </form>
                                        </div>
                                        <hr>
                                        <?php foreach ($order['items'] as $item) : ?>
                                            <div class="d-flex align-items-center mb-4">
                                                <img src="../products/<?= $item['image_url_1'] ?>" class="img-fluid" style="width: 70px;" />
                                                <div class="ms-3">
                                                    <h6><?= $item['name'] ?></h6>
                                                    <p class="small mb-0">Quantity: <?= $item['quantity'] ?></p>
                                                    <p class="small mb-0">Price: $<?= number_format($item['price'], 2) ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-muted">You have no orders.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include ("../footer/footer.php"); ?>
</body>
</html>
