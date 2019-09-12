<?php

include('config.php');

class User {

    public function __construct() {
        try {
            $this->db = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function getAllUsers() {
        $sql = 'SELECT * FROM users';
        $usersRequest = $this->db->query($sql);
        $userList = $usersRequest->fetchAll(PDO::FETCH_OBJ);
        return $userList;
    }

    public function readUser($pseudo) {
        $sql = "SELECT id_u ,password FROM users WHERE pseudo = '$pseudo'";
        $readUser = $this->db->query($sql);
        $row = $readUser->fetchAll();
        if (!empty($row)) {
            return $row;
        }
    }

    public function readID($id) {
        $sql = "SELECT * FROM users WHERE id_u = :id ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $FindList = $req->fetch(PDO::FETCH_OBJ);
        return $FindList;
    }

    public function createUser($pseudo, $password, $mail) {
        try {
            // requête permettant d'inserer les valeurs de l'inscription
            $sql = "INSERT INTO users (pseudo, password, mail, superUser)
      VALUES (:pseudo, :password, :mail, 0)";
            // On prepare la requête
            $req = $this->db->prepare($sql);
            // On attribue les valeurs via bindvalue et leurs variables.
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->bindValue(':password', $password, PDO::PARAM_STR);
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verifyUserConnexion($pseudo) {
        try {
            $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
            // $this->db->prepare($sql);
            $req = $this->db->prepare($sql);
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        if ($_POST['connexion'] && count($_POST) < 4) {
            $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
            if (!$resultat) {
                $verif = "Le pseudo ou le mot de passe utilisé est incorrect";
            } else {
                if ($isPasswordCorrect) {
                    $_SESSION['id'] = $resultat['id_u'];
                    $_SESSION['password'] = $resultat['password'];
                    $_SESSION['mail'] = $resultat['mail'];
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['superuser'] = $resultat['superuser'];
                    $_SESSION['zipcode'] = $resultat['zipCode'];
                    header('location:accueil');
                } else {
                    $verif = "Le pseudo ou le mot de passe utilisé est incorrect";
                }
            }
        }
    }

}
