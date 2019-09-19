<?php

include '../models/modelUser.php';
$regexText = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ.\s-]{3,50}$/';
$regexZipCode = '/[0-9]{5}/';
$regexCity = '/[a-z A-Z]{5,30}/';
$tle = 'Modifier mon compte';
$id = $_SESSION['id'];
$password = $_SESSION['password'];
if (count($_POST) > 3) {
    if (!empty($_POST['update'])) {
        if (empty($_POST['pseudo'])) {
            $error_pseudo = 'Veuillez entrer un pseudo';
        } else if (!preg_match($regexText, $_POST['pseudo'])) {
            $error_pseudo = 'Veuillez entrer un pseudo valide';
        } else {
            $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
        }

        if (empty($_POST['name'])) {
            $error_name = 'Veuillez entrer un nom';
        } else if (!preg_match($regexText, $_POST['name'])) {
            $error_name = 'Veuillez entrer un nom valide';
        } else {
            $name = isset($_POST['name']) ? $_POST['name'] : NULL;
        }

        if (empty($_POST['firstname'])) {
            $error_firstname = 'Veuillez entrer un prénom';
        } else if (!preg_match($regexText, $_POST['firstname'])) {
            $error_firstname = 'Veuillez entrer un prénom valide';
        } else {
            $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : NULL;
        }

        if (empty($_POST['mail'])) {
            $error_mail = 'Veuillez entrer un e-mail';
        } else if (!filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL)) {
            $error_mail = 'Veuillez entrer un e-mail valide';
        } else {
            $mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
        }

        if (empty($_POST['zipcode'])) {
            $error_zipcode = 'Veuillez entrer un code postale';
        } else if (!preg_match($regexZipCode, $_POST['zipcode'])) {
            $error_zipcode = 'Veuillez entrer un code postale valide';
        } else {
            $zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : NULL;
        }

        if (empty($_POST['city'])) {
            $error_city = 'Veuillez entrer une ville';
        } else if (!preg_match($regexCity, $_POST['city'])) {
            $error_city = 'Veuillez entrer une ville valide';
        } else {
            $city = isset($_POST['city']) ? $_POST['city'] : NULL;
        }

        if (empty($_POST['street'])) {
            $error_street = 'Veuillez entrer une rue';
        } else if (!preg_match($regexCity, $_POST['street'])) {
            $error_street = 'Veuillez entrer une rue valide';
        } else {
            $street = isset($_POST['street']) ? $_POST['street'] : NULL;
        }
        if (password_verify($_POST['password'], $password)) {
            if (!empty($pseudo) && !empty($firstname) && !empty($name) && !empty($mail) && !empty($zipcode) && !empty($city) && !empty($street) && empty($error_pseudo) && empty($error_name) && empty($error_firstname) && empty($error_mail) && empty($error_zipcode) && empty($error_city) && empty($error_street)) {
                $updateUser = new User();
                $update = $updateUser->updateUser($id, $name, $firstname, $mail, $zipcode, $city, $street, $pseudo);
                $valid = "La mise à jour a bien été effectuée. Vous allez être déconnecté afin d'actualiser vos modifications."
                        . "<div class=\"spinner-border\" role=\"status\">
  <span class=\"sr-only\">Loading...</span>
</div>";
                header('refresh:3,deconnection');
            }
        } else {
            $error_password = "Le mot de passe est obligatoire.";
        }
    }
}
