<?php
include_once '../models/modelProduct.php';
$id = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['fichier'];
// Si l'admin met une image
if (isset($_POST['update']) && $_FILES['fichier']['size'] != 0) {
    $updateProduct = new Product();
    $update = $updateProduct->updateProductWithImg($id, $title, $description, $price, $image);
}
// Si l'admin ne met pas d'image
if (isset($_POST['update']) && $_FILES['fichier']['size'] == 0) {
    $updateProducts = new Product();
    $updates = $updateProducts->updateProductWithOutImg($id, $title, $description, $price);
}
$find = new Product();
$FindList = $find->findProduct($id);
