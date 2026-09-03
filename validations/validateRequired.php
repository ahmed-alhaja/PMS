<?php
$errors = [];

function validateRequired(array $requests)
{
    global $errors;
    foreach ($requests as $key => $request) {
        if ($request === null || (is_string($request) && trim($request) === '')) {
            $errors[$key] = "This field $key is required";
        }
    }
 

    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
