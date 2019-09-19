<?php
session_start();
include '../controllers/CreateVerifyUserController.php';
include '../nav/nav.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <?php require '../head/header.php'; ?>
    <body>
        <main class="m-5">
            <div class="container text-center">
                <!-- CONNEXION -->
                <div class="border border-dark p-5 shadow">
                    <h1 class="m-3">Connexion</h1>
                    <p class="text-success m-2"><?php
                        if (!empty($valid)) {
                            echo $valid;
                        }
                        ?></p>
                    <p class="text-success small m-2"><?php
                        if (!empty($valid_con)) {
                            echo $valid_con;
                        }
                        ?></p>
                    <form class="form mx-auto" action="" method="post" required>
                        <div class="form-group m-5">
                            <label for="pseudo">Pseudo :</label>
                            <input class="form-control" type="text" name="pseudo" placeholder="Antoine" value="<?php
                            if (!empty($pseudo)) {
                                echo $pseudo;
                            }
                            ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_pseudo_con)) {
                                    echo $error_pseudo_con;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="password">Mot de passe :</label>
                            <input class="form-control" type="password" name="password" placeholder="**********">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_password_con)) {
                                    echo $error_password_con;
                                }
                                ?></p>

                        </div>
                        <input class="btn btn-outline-dark btn-sm" type="submit" name="connexion" value="Valider">
                    </form>
                </div>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Pas inscrit ?</button>
            </div>
        </main>
    </body>
</html>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="border border-dark rounded p-4 shadow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h1 class="modal-title">Inscription</h1>
                <form class="form mx-auto" action="" method="post">
                    <div class="form-group m-5">
                        <label for="pseudo">Pseudo :</label>
                        <input class="form-control" type="text" name="pseudo" placeholder="Antoine">
                        <p class="text-danger small m-2"><?php
                            if (!empty($error_pseudo)) {
                                echo $error_pseudo;
                            }
                            ?></p>
                    </div>
                    <div class="form-group m-5">
                        <label for="password">Mot de passe :</label>
                        <input class="form-control" type="password" name="password" placeholder="**********">
                        <p class="text-danger small m-2"><?php
                            if (!empty($error_password)) {
                                echo $error_password;
                            }
                            ?></p>
                    </div>
                    <div class="form-group m-5">
                        <label for="Rpassword">Retapez votre mot de passe :</label>
                        <input class="form-control" type="password" name="Rpassword" placeholder="**********">
                    </div>
                    <div class="form-group m-5">
                        <label for="email">Email :</label>
                        <input class="form-control" type="email" name="email" placeholder="contact@france.com">
                        <p class="text-danger small m-2"><?php
                            if (!empty($error_mail)) {
                                echo $error_mail;
                            }
                            ?></p>
                    </div>
                    <input  class="btn btn-outline-dark btn-sm" type="submit" name="register" value="Valider">
                </form>
            </div>
        </div>
    </div>
</div>