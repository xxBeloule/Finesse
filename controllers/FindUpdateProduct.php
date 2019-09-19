<?php

include_once '../models/modelProduct.php';
$regexText = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ.\s-]{3,150}$/';
$regexPrice = '/^[0-9]+\.{1,1}+[0-9]{2}$/';
$poids_max = 6000000;
$taille = isset($_FILES['fichier']['size']) ? $_FILES['fichier']['size'] : NULL;
if (count($_POST) > 3) {
    if (!empty($_POST['update'])) {
        if (empty($_POST['title'])) {
            $error_title = 'Veuillez entrer un titre';
        } else if (!preg_match($regexText, $_POST['title'])) {
            $error_title = 'Veuillez entrer un titre valide';
        } else {
            $title = isset($_POST['title']) ? $_POST['title'] : NULL;
        }

        if (empty($_POST['description'])) {
            $error_description = 'Veuillez entrer une description.';
        } else {
            $description = isset($_POST['description']) ? $_POST['description'] : NULL;
        }
        if (empty($_POST['price'])) {
            $error_price = 'Veuillez entrer un prix.';
        } else if (!preg_match($regexPrice, $_POST['price'])) {
            $error_price = 'Le format du prix n\'est pas correct. ex : 49.99';
        } else {
            $price = isset($_POST['price']) ? $_POST['price'] : NULL;
        }
        if (empty($_FILES['fichier']['tmp_name'])) {
            $error_type = 'Veuiller entre une image';
        } else if ($taille > $poids_max) {
            $error_size = "La taille de l'image est trop grande, elle ne doit pas dépassé ";
        } else {
            $image = isset($_FILES['fichier']) ? $_FILES['fichier'] : NULL;
            if (!empty($id) && !empty($title) && !empty($description) && !empty($image) && empty($error_title) && empty($error_size) && empty($error_type) && empty($error_description) && empty($error_price)) {
                $updateProduct = new Product();
                $update = $updateProduct->updateProductWithImg($id, $title, $description, $price, $image);
                $valid = "La mise à jour à bien été effectuée.";                
            }
        }
        if (!empty($id) && !empty($title) && !empty($description) && empty($error_title) && empty($error_description) && empty($error_price)) {
            $updateProducts = new Product();
            $updates = $updateProducts->updateProductWithOutImg($id, $title, $description, $price);
            $valid = "La mise à jour à bien été effectuée.";    
        }
    }
}
$find = new Product();
$FindList = $find->findProduct($id);