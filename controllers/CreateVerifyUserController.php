<?php

include_once '../models/modelUser.php';
$regexText = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ.\s-]{3,15}$/';
$regexPass = '/^[a-zA-Z0-9%*#@$]{5,30}$/';
if (count($_POST) > 4) {
    if (!empty($_POST['register'])) {
        if (empty($_POST['email'])) {
            $error_mail = 'Veuillez entrer une adresse mail';
        } else if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $error_mail = 'Veuillez entrez une adresse mail valide';
        } else {
            $mail = isset($_POST['email']) ? $_POST['email'] : NULL;
        }
        if (empty($_POST['pseudo'])) {
            $error_pseudo = 'Veuillez entrer un pseudo.';
        } else if (!preg_match($regexText, $_POST['pseudo'])) {
            $error_pseudo = 'Veuillez entrer des caractères corrects';
        } else {
            $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
        }
        if (empty($_POST['password'])) {
            $error_password = 'Veuillez entrer un mot de passe.';
        } else if (!preg_match($regexPass, $_POST['password'])) {
            $error_password = 'Le mot de passe doit au minimum 5 caractères et l\'un de ces caractères spéciaux % * # @ $';
        } else if ($_POST['password'] !== $_POST['Rpassword']) {
            $error_password = 'Les mots de passes ne correspondent pas.';
        } else {

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    }
    if (!empty($pseudo) && !empty($password) && empty($error_pseudo) && empty($error_password) && empty($error_mail)) {
        $newUser = new User();
        $user = $newUser->createUser($pseudo, $password, $mail);
        $valid = 'Votre inscription a bien été prise en compte';
    }
}
if (count($_POST) < 4) {
    if (!empty($_POST['connexion'])) {
        if (empty($_POST['pseudo'])) {
            $error_pseudo_con = 'Veuillez entrer un pseudo.';
        } else if (!preg_match($regexText, $_POST['pseudo'])) {
            $error_pseudo_con = 'Veuillez entrer des caractères corrects';
        } else {
            $pseudo = $_POST['pseudo'];
        }

        if (empty($_POST['password'])) {
            $error_password_con = 'Veuillez entrer un mot de passe.';
        } else if (!preg_match($regexPass, $_POST['password'])) {
            $error_password_con = 'Le mot de passe doit au minimum 5 caractères et l\'un de ces caractères spéciaux % * # @ $';
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        if (!empty($pseudo) && !empty($password) && empty($error_pseudo_con) && empty($error_password_con)) {
            $verifycon = new User();
            $verify = $verifycon->verifyUserConnexion($pseudo);
        }
    }
}
$tle = 'Connexion';
