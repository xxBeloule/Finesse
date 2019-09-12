<?php
include_once '../models/modelProduct.php';
$product = new Product();
$productList = $product->getAllProduct();
$tle = 'Galerie';