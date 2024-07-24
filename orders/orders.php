<?php
include "../signup/connect.php";
require_once '../signup/auth.php';

$user_id = $_SESSION['user_id'];

// Handle cancel order request
if (isset($_POST['cancel_order'])) {
    $order_id = intval($_POST['order_id']);

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete related order items first
        $stmt = $conn->prepare("DELETE FROM order_items WHERE order_id = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();

        // Delete the order
        $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ? AND user_id = ? AND order_status = 'Order Pending'");
        $stmt->bind_param("ii", $order_id, $user_id);
        $stmt->execute();
        $stmt->close();

        // Commit the transaction
        $conn->commit();
    } catch (mysqli_sql_exception $exception) {
        // Rollback the transaction if an error occurs
        $conn->rollback();
        throw $exception;
    }
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
$stmt->close();
$conn->close();
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
    <?php include("../navbar/navbar.php"); ?>

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
                                        <h5 class="card-title">Order #<?= htmlspecialchars($order_id) ?></h5>
                                        <p>Order Date: <?= htmlspecialchars($order['order_date']) ?></p>
                                        <p>Total Price: $<?= number_format($order['total_price'], 2) ?></p>
                                        <p>Status: <?= ucfirst(htmlspecialchars($order['order_status'])) ?></p>
                                        <?php if ($order['order_status'] == 'Order Pending') : ?>
                                            <form method="POST" action="orders.php" class="mb-3">
                                                <input type="hidden" name="order_id" value="<?= htmlspecialchars($order_id) ?>">
                                                <button type="submit" name="cancel_order" class="btn btn-danger">Cancel Order</button>
                                            </form>
                                        <?php endif; ?>
                                        <hr>
                                        <?php foreach ($order['items'] as $item) : ?>
                                            <div class="d-flex align-items-center mb-4">
                                                <img src="../products/<?= htmlspecialchars($item['image_url_1']) ?>" class="img-fluid" style="width: 70px;" alt="<?= htmlspecialchars($item['name']) ?>" />
                                                <div class="ms-3">
                                                    <h6><?= htmlspecialchars($item['name']) ?></h6>
                                                    <p class="small mb-0">Quantity: <?= htmlspecialchars($item['quantity']) ?></p>
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

    <?php include("../footer/footer.php"); ?>
</body>
</html>
