<?php

include '../Model/db.php';

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {

    $menu_id = (int)$_POST['menu_id'];

    $query = "SELECT menu_id, name, price, image FROM menu WHERE menu_id = $menu_id";
    $res = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($res)) {
        if (isset($_SESSION['cart'][$menu_id])) {
            $_SESSION['cart'][$menu_id]['qty'] += 1;
        } else {
            $_SESSION['cart'][$menu_id] = [
                'menu_id' => $menu_id,
                'name'    => $row['name'],
                'price'   => $row['price'],
                'image'   => $row['image'],
                'qty'     => 1
            ];
        }
    }

    header("Location: ../View/CustomerDashboard.php");
    exit();
}

if (isset($_POST['cart_action'])) {

    $menu_id = (int)$_POST['menu_id'];

    if ($_POST['cart_action'] === 'increase') {
        $_SESSION['cart'][$menu_id]['qty']++;
    }

    if ($_POST['cart_action'] === 'decrease') {
        $_SESSION['cart'][$menu_id]['qty']--;

        if ($_SESSION['cart'][$menu_id]['qty'] <= 0) {
            unset($_SESSION['cart'][$menu_id]);
        }
    }

    if ($_POST['cart_action'] === 'remove') {
        unset($_SESSION['cart'][$menu_id]);
    }

    if ($_POST['cart_action'] === 'clear') {
        $_SESSION['cart'] = [];
    }

    header("Location: ../View/CustomerDashboard.php");
    exit();
}

$cart_count = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_count += $item['qty'];
    }
}




