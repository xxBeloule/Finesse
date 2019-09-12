<?php

include('config.php');

class Product {

    function __construct() {
        try {
            $this->db = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function getAllProduct() {
        $sql = 'SELECT * FROM product';
        $productRequest = $this->db->query($sql);
        $productList = $productRequest->fetchAll(PDO::FETCH_OBJ);
        return $productList;
    }

    public function findProduct($id) {
        $sql = "SELECT * FROM product WHERE id_p = :id ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $FindList = $req->fetch(PDO::FETCH_OBJ);
        return $FindList;
    }

    public function createProduct($title, $description, $price, $image) {
        try {

            $poids_max = 512000; // Poids max de l'image en octets (1Ko = 1024 octets)
            $repertoire = '../uploads/'; // Repertoire d'upload
            if ($_FILES['fichier']['type'] == 'image/jpeg') {
                $extention = '.jpeg';
            }
            if ($_FILES['fichier']['type'] == 'image/jpeg') {
                $extention = '.jpg';
            }
            if ($_FILES['fichier']['type'] == 'image/png') {
                $extention = '.png';
            }
            if ($_FILES['fichier']['type'] == 'image/gif') {
                $extention = '.gif';
            }
            $nom_fichier = time() . $extention;

            // On upload le fichier sur le serveur.
            if (move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire . $nom_fichier)) {
                $url = '/' . $repertoire . '' . $nom_fichier . '';
            } else {
                echo 'L\'image n\'a pas pu être uploadée sur le serveur. L\'image est trop grande';
            }

            $sql = "INSERT INTO product (title, description, price, image)
      VALUES (:title, :description, :price , :url)";
            // $this->db->prepare($sql);
            $req = $this->db->prepare($sql);
            $req->bindValue(':title', $title, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->bindValue(':price', $price, PDO::PARAM_STR);
            $req->bindValue(':url', $url, PDO::PARAM_STR);
            $req->execute();
            $error = $req->errorInfo();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateProductWithImg($id, $title, $description, $price, $image) {
        try {
            $repertoire = '../uploads/'; // Repertoire d'upload
            if ($_FILES['fichier']['type'] == 'image/jpeg') {
                $extention = '.jpeg';
            }
            if ($_FILES['fichier']['type'] == 'image/jpeg') {
                $extention = '.jpg';
            }
            if ($_FILES['fichier']['type'] == 'image/png') {
                $extention = '.png';
            }
            if ($_FILES['fichier']['type'] == 'image/gif') {
                $extention = '.gif';
            }
            $nom_fichier = time() . $extention;

            // On upload le fichier sur le serveur.
            if (move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire . $nom_fichier)) {
                $url = '/' . $repertoire . '' . $nom_fichier . '';
            } else {
                echo 'L\'image n\'a pas pu être uploadée sur le serveur.';
            }


            $sql = "UPDATE product SET title=:title,description=:description,price=:price,image=:url WHERE id_p = :id";
            // $this->db->prepare($sql);
            $req = $this->db->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':title', $title, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->bindValue(':price', $price, PDO::PARAM_STR);
            $req->bindValue(':url', $url, PDO::PARAM_STR);
            $req->execute();
            $error = $req->errorInfo();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

     public function updateProductWithOutImg($id, $title, $description, $price) {
        try {
            $sql = "UPDATE product SET title=:title,description=:description,price=:price  WHERE id_p = :id";
            // $this->db->prepare($sql);
            $req = $this->db->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':title', $title, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->bindValue(':price', $price, PDO::PARAM_STR);
            $req->execute();
            $error = $req->errorInfo();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteProduct($id) {
        try {
            $sql = "DELETE FROM product WHERE id_p = :id";
            // $this->db->prepare($sql);
            $req = $this->db->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $error = $req->errorInfo();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
