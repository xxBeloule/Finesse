<?php
include_once '../models/modelProduct.php';
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['fichier'];
if ($_POST['create']) {
$createProduct = new Product();
$create = $createProduct->createProduct($title,$description, $price, $image);
}
$product = new Product();
$productList = $product->getAllProduct();
