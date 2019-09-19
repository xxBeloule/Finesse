<?php
session_start();
if (!isset($_SESSION['superuser']) || $_SESSION['superuser'] != 1) {
    header('location:..');
    exit();
}
include('../controllers/readMessageController.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
        <meta charset="utf-8">
        <title>Message</title>
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lux/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"  crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="shortcut icon" href="../../assets/img/logoe_FIS.png">
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
                <div class="bg-light p-5 m-2 border rounded-lg">
                    <div class="bg-light border rounded-lg shadow">
                    <div class="text-center">
                        <h5 class="text-center p-3">Message de <?= $FindList->pseudo ?></h5>
                        <p><?= $FindList->reason ?></p>
                        <p><?= $FindList->message ?></p>
                        <form method="POST">
                        <input class="m-2 btn btn-outline-danger "type="submit" name="delete" value="Supprimer le message">
                        </form>
                    </div>
                    </div>
                </div>
