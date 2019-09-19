<?php
session_start();
if (!isset($_SESSION['superuser']) || $_SESSION['superuser'] != 1) {
    header('location:..');
    exit();
}
include('../controllers/CreateReadController.php');
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
                            <tr class="border-dark ">
                                <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary justify-content-right" data-toggle="modal" data-target=".bd-example-modal-lg">
                            Ajouter une œuvre
                        </button>
                        <th class="font-weight-bold border-dark">ID</th>
                        <th class="border-dark">Titre</th>
                        <th class="border-dark">Description</th>
                        <th class="border-dark">Prix</th>
                        <th class="border-dark">Image</th>
                        <th class="border-dark"></th>
                        <th class="border-dark"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productList as $article): ?>
                                <tr>
                                    <td class="font-weight-bold"><?= $article->id_p ?></td>
                                    <td><?= $article->title ?></td>
                                    <td><?= $article->description ?></td>
                                    <td><?= $article->price . " €" ?></td>
                                    <td><img class="w-75" src="<?= $article->image ?>" alt="Image"></td>
                                    <td><a class="btn btn-outline-dark btn-sm" href="updateproduct/<?= $article->id_p ?>">Editer</a></td>
                                    <td><a class="btn btn-outline-danger btn-sm" href="delete-product/<?= $article->id_p ?>">Supprimer</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="border border-dark rounded p-5 shadow">
                                    <h1 class="m-3">Ajouter une œuvre</h1>
                                    <form class="m-5 p-3" action="#" method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-5">
                                            <label for="title">Titre :</label>
                                            <input class="form-control" type="text" name="title" placeholder="Mon titre">
                                            <p class="text-danger small m-2"><?php
                                                if (!empty($error_title)) {
                                                    echo $error_title;
                                                }
                                                ?></p>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="description">Description :</label>
                                            <input class="form-control" type="text" name="description" placeholder="Ma description">
                                            <p class="text-danger small m-2"><?php
                                                if (!empty($error_description)) {
                                                    echo $error_description;
                                                }
                                                ?></p>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="price">Prix :</label>
                                            <input class="form-control" type="text" name="price" placeholder="Mon prix">
                                            <p class="text-danger small m-2"><?php
                                                if (!empty($error_price)) {
                                                    echo $error_price;
                                                }
                                                ?></p>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="file" class="label-file m-2">Image</label>
                                            <input class="form-control-file " type="file" name="fichier">
                                            <p class="text-danger small m-2"><?php
                                                if (!empty($error_type)) {
                                                    echo $error_type;
                                                }
                                                ?>
                                                <?php
                                                if (!empty($error_size)) {
                                                    echo $error_size;
                                                }
                                                ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input class="btn btn-outline-dark" type="submit" name="create" placeholder="Valider" required>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>