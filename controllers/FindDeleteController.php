<?php
include_once '../models/modelProduct.php';
$id = $_GET['id'];
$find = new Product();
$FindList = $find->findProduct($id);
if (isset($_POST['delete'])) {
$deleteProduct = new Product();
$DeleteList = $deleteProduct->deleteProduct($id);
header('location:..');
}
