<?php
include_once dirname(__FILE__, 2) . '/products/getProduct.php';
session_start();
$quantity = 0;
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['quantity'])) {
    $_SESSION['count'] += (int) $_POST['quantity'];
} else {
    $_SESSION['count']++;
}
$getProductId = $_GET['id'] ?? null;




if ($getProductId !== null) {

    foreach ($arrayProducts as $item) {

        // if getProductId exists in the database
        if ($item['id'] == $getProductId) {

            foreach ($_SESSION['cart'] ?? [] as $key => $cartSessionItem) {

                // if getProductId exists in the session cart, then increment the quantity
                if ($getProductId == $cartSessionItem['id']) {

                    $_SESSION['cart'][$key]['quantity']++;
                    continue 2;
                }
            }

            $_SESSION['cart'][] = [
                'id' => $item['id'],
                'product_name' => $item['product_name'],
                'price' => $item['price'],

                'quantity' => $_POST['quantity'] ?? 1
            ];

            break;
        }
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
