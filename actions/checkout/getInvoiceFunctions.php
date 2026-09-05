<?php
include dirname(__FILE__, 3) . '/validations/validateRequired.php';
include dirname(__FILE__, 3) . '/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    store($_POST);
}


function store(array $request)
{
    validateRequired($request);
    $invoiceData = $request;
    if  (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $_SESSION['invoiceData'] = $invoiceData;
        header('Location: ' . BASE_URL . 'views/invoice/invoice.php');
        exit;
    } else {
        $_SESSION['errors']['cart'] = "Your cart is empty. Please add items to your cart before proceeding to checkout.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;

    }
   // header('Location: ' . BASE_URL . 'views/invoice/invoice.php?name=' . urlencode($invoiceData['name']) . '&email=' . urlencode($invoiceData['email']) . '&address=' . urlencode($invoiceData['address']) . '&phone=' . urlencode($invoiceData['phone']));
}
