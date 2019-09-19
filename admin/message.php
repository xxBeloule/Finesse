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
    <?php require '../head/header.php'; ?>

    <body>
        <div class="container">
            <header>
                <div class="text-center mb-4 mt-3">
                    <a href="/admin"><img class="resize" src="../assets/img/logoe_FIS.png" alt="Image finesse"></a>
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
                                    <a class="nav-link" href="message">Messages</a>
                                </li>
                                 <li class="nav-item active mr-5 ml-5">
                                    <a class="nav-link" href="index">œuvres</a>
                                </li>
                                <?php if (isset($_SESSION['id'])): ?>
                                    <li class="nav-item active ml-5 mr-5">
                                        <a class="nav-link" href="../deconnection">Déconnexion</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="bg-light p-5 m-2 border rounded-lg">
                    <table class="table bg-light border rounded border-dark shadow">
                        <thead class="thead-light border-dark">
                            <tr class="border-dark">
                                <th class=" border-dark">ID</th>
                                <th class="border-dark">Raison</th>
                                <th class="border-dark">Message</th>
                                <th class="border-dark">Pseudo</th>
                                <th class="border-dark"></th>
                                <th class="border-dark"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messageList as $message): ?>
                                <tr>
                                    <td class="font-weight-bold"><?= $message->id_m ?></td>
                                    <td><?= $message->reason ?></td>
                                    <td><?= $message->message ?></td>
                                    <td><?= $message->pseudo ?></td>
                                    <td><a class="btn btn-outline-dark" href="messageinfo/<?= $message->id_m ?>">Ouvrir le message</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                </body>
                </html>
