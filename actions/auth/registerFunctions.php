<?php
require dirname(__FILE__, 3) . '/validations/validateRequired.php';
require dirname(__FILE__, 3) . '/config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validateRequired($_POST);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    registerUser($name, $email, $password);
}



function registerUser($name, $email, $password)
{
    $user = [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];
    $_SESSION['user'] = $user;
    header('Location: ' . BASE_URL);
    exit;
    echo '<pre>';
    print_r($_SESSION['user']);
}
