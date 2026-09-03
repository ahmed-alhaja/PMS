<?php
include dirname(__FILE__, 3) . '/validations/validateRequired.php';
include dirname(__FILE__, 3) . '/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    store($_POST);
}


function store(array $request)
{
    validateRequired($request);
}
