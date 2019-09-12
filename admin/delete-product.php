<?php
session_start();
if (!isset($_SESSION['superuser']) || $_SESSION['superuser'] != 1) {
    echo "Vous n'etes pas administrateur.";
    exit();
}
include('../controllers/FindDeleteController.php');
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
                    <a href="/admin"><img class="resize" src="../../assets/img/logoe_FIS.png" alt="Image finesse"></a>
                </div>
                <h2 class="text-center">Administration</h2>
                <div class="media col-12 m-5">
                    <img class="border border-dark w-25 p-1" src="<?= $FindList->image ?>" alt="Image représentant les articles">
                    <div class="media-body">
                        <h1 class="text-right"><?= $FindList->title ?></h1>
                        <p class="text-center p-3"><?= $FindList->description ?></p>
                        <p class="text-right m-5"><?= $FindList->price ?></p>
                        <form class="" action="#" method="post">
                            <input class="btn btn-outline-danger" type="submit" name="delete" value="Supprimer">
                            <a class="btn btn-outline-success" href="..">Annuler</a>
                            <p>Cette action sera irréversible</p>
                        </form>
                    </div>
                </div>
