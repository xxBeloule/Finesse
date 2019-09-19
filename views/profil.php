<?php session_start(); 

if (!isset($_SESSION['id'])) {
    header('location:..');
    exit();
}

?>

<?php include('../controllers/updateUserController.php'); ?>
<html>
    <?php require '../head/header.php'; ?>
    <body>
        <?php include('../nav/nav.php'); ?>
        <div class="container">
            <div class="text-center m-2">
                <form action="#" method="post">
                    <div class="bg-light border border-dark rounded-lg m-5 p-5 text-center">
                        <h1>Modifier son profil</h1>
                        <p class="text-danger"><?php
                            if (!empty($error_password)) {
                                echo $error_password;
                            }
                            ?></p>
                        <p class="text-success"><?php
                            if (!empty($valid)) {
                                echo $valid;
                            }
                            ?></p>
                        <div class="form-group m-5">
                            <label for="pseudo">Pseudo :</label>
                            <input class="form-control" type="text" name="pseudo" value="<?= $_SESSION['pseudo']; ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_pseudo)) {
                                    echo $error_pseudo;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="name">Nom :</label>
                            <input class="form-control" type="text" name="name" value="<?php if (!empty($_SESSION['name'])) {
                                    echo $_SESSION['name'];
                                }
                                ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_name)) {
                                    echo $error_name;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="firstname">Prénom :</label>
                            <input class="form-control" type="text" name="firstname" value="<?php if (!empty($_SESSION['firstname'])) {
                                    echo $_SESSION['firstname'];
                                }
                                ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_firstname)) {
                                    echo $error_firstname;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="password">Mot de passe :</label>
                            <input class="form-control" type="password" name="password" value="">
                        </div>
                        <div class="form-group m-5">
                            <label for="mail">Adresse mail</label>
                            <input  class="form-control" type="text" name="mail" value="<?php if (!empty($_SESSION['mail'])) {
                                    echo $_SESSION['mail'];
                                }
                                ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_mail)) {
                                    echo $error_mail;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="zipcode">Code postale :</label>
                            <input class="form-control" type="number" name="zipcode" value="<?php if (!empty($_SESSION['zipcode'])) {
                                    echo $_SESSION['zipcode'];
                                }
                                ?>">
                            <p class="text-danger small m-2"><?php
                                   if (!empty($error_zipcode)) {
                                       echo $error_zipcode;
                                   }
                                   ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="city">Ville :</label>
                            <input class="form-control" type="text" name="city" value="<?php if (!empty($_SESSION['city'])) {
                                    echo $_SESSION['city'];
                                }
                                   ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_city)) {
                                    echo $error_city;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="street">Rue :</label>
                            <input class="form-control" type="text" name="street" value="<?php if (!empty($_SESSION['street'])) {
                                    echo $_SESSION['street'];
                                }
                                ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_street)) {
                                    echo $error_street;
                                }
                                ?></p>
                        </div>
                        <input class="btn btn-outline-success"type="submit" name="update" value="Mettre à jour">
                        <a class="btn btn-outline-danger" href="../">Retour</a></td>
                    </div>
                </form>
            </div>           
        </div> 
    </body>
</html>
