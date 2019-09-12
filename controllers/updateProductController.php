<?php
include_once '../models/modelProduct.php';
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$url = $_POST['url'];
if ($_POST['update']) {
$updateProduct = new Product();
$update = $updateProduct->updateProduct($id,$title,$description, $price, $url);
}
