<?php

function uploadImage($image)
{
    $uploadDirectory = dirname(__FILE__, 2) . '/views/products/images/';
    $newImageName = uniqid() . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
    move_uploaded_file($image['tmp_name'], $uploadDirectory . $newImageName);
    return $newImageName;
}
