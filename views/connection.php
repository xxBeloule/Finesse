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
            <div class="d-flex row justify-content-between text-center">
                <!-- INSCRPTION -->
                <div class="col-5 border border-dark rounded p-5 shadow">
                    <h1 class="m-3">Inscription</h1>
                    <p class="text-success small m-2"><?= $valid; ?></p>
                    <form class="form mx-auto" action="" method="post">
                        <div class="form-group">
                            <label for="pseudo">Pseudo :</label>
                            <input class="form-control" type="text" name="pseudo" placeholder="Antoine">
                            <p class="text-danger small m-2"><?= $error_pseudo; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input class="form-control" type="password" name="password" placeholder="**********">
                            <p class="text-danger small m-2"><?= $error_password; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="Rpassword">Retapez votre mot de passe :</label>
                            <input class="form-control" type="password" name="Rpassword" placeholder="**********">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input class="form-control" type="email" name="email" placeholder="contact@france.com">
                            <p class="text-danger small m-2"><?= $error_mail; ?></p>
                        </div>
                        <input  class="btn btn-outline-dark btn-sm" type="submit" name="register" value="Valider">
                    </form>
                </div>
                <!-- CONNEXION -->
                <div class="col-5 border border-dark rounded p-5 shadow">
                    <h1 class="m-3">Connexion</h1>
                    <form class="form mx-auto" action="" method="post" required>
                        <div class="form-group">
                            <label for="pseudo">Pseudo :</label>
                            <input class="form-control" type="text" name="pseudo" placeholder="Antoine" value="<?= $pseudo ?>">
                            <p class="text-danger small m-2"><?= $error_pseudo_con; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input class="form-control" type="password" name="password" placeholder="**********">
                            <p class="text-danger small m-2"><?= $error_password_con; ?></p>

                        </div>
                        <input class="btn btn-outline-dark btn-sm" type="submit" name="connexion" value="Valider">
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
