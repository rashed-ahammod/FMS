<?php
session_start();
include '../Model/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../View/Login.php");
    exit();
}

if (!isset($_POST['submit_review'])) {
    header("Location: ../View/Order.php");
    exit();
}

$order_id = (int)$_POST['order_id'];
$message  = mysqli_real_escape_string($conn, $_POST['feedback_message']);

/* Prevent duplicate insert */
$check = mysqli_query(
    $conn,
    "SELECT feedback_id FROM feedback WHERE order_id = $order_id"
);

if (mysqli_num_rows($check) > 0) {
    header("Location: ../View/OrderDetails.php?order_id=$order_id");
    exit();
}

/* Insert review */
mysqli_query(
    $conn,
    "INSERT INTO feedback (feedback_message, order_id)
     VALUES ('$message', $order_id)"
);

header("Location: ../View/OrderDetails.php?order_id=$order_id");
exit();
