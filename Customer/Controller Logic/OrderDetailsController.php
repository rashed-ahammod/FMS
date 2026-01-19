<?php
session_start();
include '../Model/db.php';

//login protection
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

//validate order_id
if (!isset($_GET['order_id'])) {
    header("Location: Order.php");
    exit();
}

$order_id = (int)$_GET['order_id'];
$user_id  = $_SESSION['user_id'];

//Fetch order from table
$order_result = mysqli_query(
    $conn,
    "SELECT * FROM orders 
     WHERE order_id = $order_id 
     AND user_id = $user_id"
);

if (mysqli_num_rows($order_result) == 0) {
    die("Order not found.");
}

$order = mysqli_fetch_assoc($order_result);

//Fetch order items
$items = mysqli_query(
    $conn,
    "SELECT oi.*, m.name 
     FROM order_items oi
     JOIN menu m ON oi.menu_id = m.menu_id
     WHERE oi.order_id = $order_id"
);

//  Check if this order already has feedback
$feedback_q = mysqli_query(
    $conn,
    "SELECT feedback_message, feedback_reply
     FROM feedback
     WHERE order_id = $order_id"
);

$has_feedback = false;
$feedbackData = null;

if (mysqli_num_rows($feedback_q) > 0) {
    $has_feedback = true;
    $feedbackData = mysqli_fetch_assoc($feedback_q);
}
?>