<?php 
require dirname(__FILE__, 3) . '/config/config.php';
session_destroy();
header('Location: ' . BASE_URL);
?>