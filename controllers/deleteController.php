<?php
include_once '../models/modelProduct.php';
$id = $_GET['id'];
if (isset($_POST['delete'])) {
$deleteProduct = new Product();
$DeleteList = $deleteProduct->deleteProduct($id);
header('location:index.php');
}
