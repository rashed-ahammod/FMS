<?php
session_start();
include '../Model/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];

// Handle checkout
if (isset($_POST['checkout'])) {

    if (empty($_SESSION['cart'])) {
        header("Location: ../View/CustomerDashboard.php");
        exit();
    }
    $total = 0;

    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['qty'];
    }

    //Create order 
    mysqli_query(
        $conn,
        "INSERT INTO orders (user_id, total_amount, order_status)
         VALUES ($user_id, $total, 'pending')"
    );

    $order_id = mysqli_insert_id($conn);

    // Insert order items 
    foreach ($_SESSION['cart'] as $item) {
        $menu_id = $item['menu_id'];
        $price   = $item['price'];
        $qty     = $item['qty'];

        mysqli_query(
            $conn,
            "INSERT INTO order_items (order_id, menu_id, price, quantity)
             VALUES ($order_id, $menu_id, $price, $qty)"
        );
    }

    // Clear cart 
    $_SESSION['cart'] = [];

    $_SESSION['order_success'] = "Order placed successfully!";

    header("Location: ../View/Order.php");
    exit();
}

if (isset($_POST['cancel_order'])) {

    $order_id = (int)$_POST['order_id'];
    $user_id  = $_SESSION['user_id'];

    mysqli_query(
        $conn,
        "UPDATE orders 
         SET order_status = 'cancelled'
         WHERE order_id = $order_id
         AND user_id = $user_id
         AND order_status = 'pending'"
    );

    $_SESSION['order_success'] = "Order cancelled successfully.";

    header("Location: ../View/Order.php");
    exit();
}

// Ongoing Orders 
$ongoing_orders = mysqli_query(
    $conn,
    "SELECT * FROM orders 
     WHERE user_id = $user_id 
     AND order_status != 'delivered'
     AND order_status != 'cancelled'
     ORDER BY order_time DESC"
);

// Order History 
$order_history = mysqli_query(
    $conn,
    "SELECT * FROM orders 
     WHERE user_id = $user_id 
     AND (order_status = 'delivered' 
          OR order_status = 'cancelled')
     ORDER BY order_time DESC"
);

?>
