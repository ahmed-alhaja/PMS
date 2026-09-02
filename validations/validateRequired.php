<?php
// session_start();
// include_once dirname(__FILE__, 2) . '/config/config.php';
$errors = [];

function validateRequired(array $requests)
{
    global $errors;
    foreach ($requests as $key => $request) {
        if (empty($request)) {
            $errors[$key] = "this field $key is required" . '</br>';
        }
    }
    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location: ' . BASE_URL . 'views/products/createProduct.php');
        exit();
    }
}
