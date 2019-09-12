<?php
include_once '../models/modelProduct.php';
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$url = $_POST['url'];
if ($_POST['create']) {
$createProduct = new Product();
$create = $createProduct->createProduct($title,$description, $price, $url);
}
