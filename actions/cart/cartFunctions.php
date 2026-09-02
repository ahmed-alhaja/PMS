<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}
if (isset($_POST['quantity'])) {
    $_SESSION['count'] += (int) $_POST['quantity'];
} else {
    $_SESSION['count']++;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
