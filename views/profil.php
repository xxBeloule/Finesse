<?php session_start(); ?>

<html>
    <?php require '../head/header.php'; ?>
    <body>
        <?php include('../nav/nav.php'); ?>
        <div class="container">
            <div class="text-center m-2">
                <h1>Modifier son profil</h1>
                <form action="#" method="post">
                    <div class="bg-light border border-dark rounded-lg m-5 p-5 text-center">
                        <div class="form-group">
                            <label for="pseudo">Pseudo :</label>
                            <input class="form-control" type="text" name="pseudo" value="<?= $_SESSION['pseudo']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input class="form-control" type="password" name="password" value="">
                        </div>
                        <div class="form-group">
                            <label for="mail">Adresse mail</label>
                            <input  class="form-control" type="text" name="mail" value="<?= $_SESSION['mail']; ?>">
                        </div>
                        <input class="btn btn-outline-success"type="submit" name="update" value="Mettre à jour">
                        <a class="btn btn-outline-danger" href="../">Retour</a></td>

                    </div>
                </form>
            </div>           
        </div> 
    </body>
</html>
