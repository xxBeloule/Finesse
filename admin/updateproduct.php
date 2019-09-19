<?php
session_start();
if (!isset($_SESSION['superuser']) || $_SESSION['superuser'] != 1) {
    echo "Vous n'etes pas administrateur.";
    exit();
}
$id = $_GET['id'];
include('../controllers/FindUpdateProduct.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Administration Finesse</title>
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-hVpXlpdRmJ+uXGwD5W6HZMnR9ENcKVRn855pPbuI/mwPIEKAuKgTKgGksVGmlAvt" crossorigin="anonymous"><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <header>
                <div class="text-center mb-4 mt-3">
                    <a href=".."><img class="resize" src="../../assets/img/logoe_FIS.png" alt="Image finesse"></a>
                </div>
                <h2 class="text-center">Administration</h2>
                <hr class="w-25">
                <div class="d-flex justify-content-center">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item active mr-5 ml-5">
                                    <a class="nav-link" href="/..">Accueil</a>
                                </li>
                                <li class="nav-item active mr-5 ml-5">
                                    <a class="nav-link" href="../message">Messages</a>
                                </li>
                                <li class="nav-item active mr-5 ml-5">
                                    <a class="nav-link" href="../index">œuvres</a>
                                </li>
                                <?php if (isset($_SESSION['id'])): ?>
                                    <li class="nav-item active ml-5 mr-5">
                                        <a class="nav-link" href="../../deconnection">Déconnexion</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="bg-light border border-dark rounded-lg m-5 p-5 text-center">
                        <h2 class="m-3 mb-5">Modifier une oeuvre</h2>
                        <p class="text-success m-2"><?php
                            if (!empty($valid)) {
                                echo $valid;
                            }
                            ?></p>

                        <div class="form-group m-5">
                            <label for="title">Titre :</label>
                            <input class="form-control" type="text" name="title" value="<?= $FindList->title; ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_title)) {
                                    echo $error_title;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="description">Description :</label>
                            <textarea class="form-control" type="text" name="description"><?= $FindList->description; ?></textarea>
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_description)) {
                                    echo $error_description;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <label for="price">Prix :</label>
                            <input  class="form-control" type="text" name="price" value="<?= $FindList->price; ?>">
                            <p class="text-danger small m-2"><?php
                                if (!empty($error_price)) {
                                    echo $error_price;
                                }
                                ?></p>
                        </div>
                        <div class="form-group m-5">
                            <input class="form-control-file" type="file" name="fichier">
                        </div>
                        <input class="btn btn-outline-success btn-sm"type="submit" name="update" value="Mettre à jour">
                        <a class="btn btn-outline-danger btn-sm" href="../">Retour</a></td>
                    </div>
                </form>
