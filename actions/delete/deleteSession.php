<?php
require dirname(__FILE__, 3) . '/config/config.php';
session_start();
unset($_SESSION['cart']);
unset($_SESSION['count']);
unset($_SESSION['invoiceData']);
unset($_SESSION['errors']);
unset($_SESSION['totalPriceCart']);
header('Location: ' . BASE_URL);
