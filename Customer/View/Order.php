<?php
include '../Controller Logic/OrderController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="../Stylesheet/Order.css">
</head>
<body>
<div class="orders-container">

<section class="orders-section">

<h2>My Orders</h2>

<a href="CustomerDashboard.php" class="btn back-dashboard">
    ← Back to Dashboard
</a>
<hr>

<h2>Ongoing Orders</h2>

<?php
if (mysqli_num_rows($ongoing_orders) > 0) {
    while ($order = mysqli_fetch_assoc($ongoing_orders)) {
?>
        <div class="order-card">
            
        <span class="status <?php echo strtolower($order['order_status']); ?>">
                        <?php echo ucfirst($order['order_status']); ?>
        </span>

            <strong>Order #<?php echo $order['order_id']; ?></strong><br>
            Total: Tk <?php echo $order['total_amount']; ?><br>
            Status: <?php echo $order['order_status']; ?><br>
            Date: <?php echo $order['order_time']; ?><br>

            <a href="OrderDetails.php?order_id=<?php echo $order['order_id']; ?>">
                View Details
            </a>
        </div>
<?php
    }
} else {
    echo "<p>No ongoing orders</p>";
}
?>

<hr>

<h2>Order History</h2>

<?php
if (mysqli_num_rows($order_history) > 0) {
    while ($order = mysqli_fetch_assoc($order_history)) {
?>
        <div class="order-card">

        <span class="status <?php echo strtolower($order['order_status']); ?>">
                        <?php echo ucfirst($order['order_status']); ?>
        </span>

            <strong>Order #<?php echo $order['order_id']; ?></strong><br>
            Total: Tk <?php echo $order['total_amount']; ?><br>
            Status: <?php echo $order['order_status']; ?><br>
            Date: <?php echo $order['order_time']; ?><br>

            <a href="OrderDetails.php?order_id=<?php echo $order['order_id']; ?>">
                View Details
            </a>
        </div>
<?php
    }
} else {
    echo "<p>No past orders</p>";
}
?>
</section>
</div>
</body>
</html>
