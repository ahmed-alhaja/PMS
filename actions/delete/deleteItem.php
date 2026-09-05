<?php
session_start();
// echo "<pre>";
// print_r($_SESSION['cart']);
$iteGetmId = $_GET['id'] ?? null;
$carts = $_SESSION['cart'];
if (isset($iteGetmId)) {

    foreach ($carts as $key => $cart) {
        if ($cart['id'] == $iteGetmId) {
            $_SESSION['count']--;
            unset($_SESSION['cart'][$key]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
