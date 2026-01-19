<?php
session_start();
include '../Model/db.php';

/* LOGIN CHECK */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../View/Login.php");
    exit();
}

/* GET ORDER ID */
if (isset($_GET['order_id'])) {
    $order_id = (int)$_GET['order_id'];
}

/* BLOCK DOUBLE REVIEW */
if (isset($order_id)) {
    $check = mysqli_query(
        $conn,
        "SELECT feedback_id FROM feedback WHERE order_id = $order_id"
    );

    if (mysqli_num_rows($check) > 0) {
        die("This order has already been reviewed.");
    }
}

/* SUBMIT REVIEW */
if (isset($_POST['submit_review'])) {

    $order_id = (int)$_POST['order_id'];
    $message  = mysqli_real_escape_string($conn, $_POST['feedback_message']);

    mysqli_query(
        $conn,
        "INSERT INTO feedback (feedback_message, order_id)
         VALUES ('$message', $order_id)"
    );

    header("Location: ../View/OrderDetails.php?order_id=$order_id");
    exit();
}
