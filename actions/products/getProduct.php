<?php

$path = dirname(__FILE__, 3) . '/database/products.json';

$arrayProducts = [];

if (file_exists($path)) {
    $data = file_get_contents($path);
    $arrayProducts = json_decode($data, true);
}