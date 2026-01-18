<?php include '../Controller Logic/OrderDetailsController.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="../Stylesheet/OrderDetails.css">
</head>
<body>

<div class="order-details-container">

<h2>Order #<?php echo $order['order_id']; ?></h2>

<div class="order-mm">
 <span class="status <?php echo strtolower($order['order_status']); ?>">
         <?php echo ucfirst($order['order_status']); ?>
</span>
<span class="date">
         <?php echo $order['order_time']; ?></p>
</span>
</div>

<hr>

<h3>Items</h3>

<div class="items-list">

<?php
$total = 0;

while ($item = mysqli_fetch_assoc($items)) {
    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;
    ?>
    <div class="item-row">

       <span><?php echo $item['name']; ?> × <?php echo $item['quantity']; ?>
        — Tk <?php echo $subtotal; ?>
    </span>
    </div>
<?php } ?>

<hr>

<div class="total-row">

<strong>Total</strong>
<strong>Total: Tk <?php echo $total; ?></strong>

</div>

<div class="order-actions">
<a href="Order.php" class="btn back">← Back to Orders</a>

<?php if (strtolower($order['order_status']) == 'pending') { ?>
    <form method="post"
          action="../Controller Logic/OrderController.php"
          onsubmit="return confirm('Are you sure you want to cancel this order?');">

        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">

        <button type="submit" name="cancel_order" class="btn cancel">
            Cancel Order
        </button>
    </form>
<?php } ?>
</div>
</div>

</body>
</html>
