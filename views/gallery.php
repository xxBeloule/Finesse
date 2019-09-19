<?php
session_start();
include '../controllers/readProduct.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <?php require '../head/header.php'; ?>
    <body>
        <?php require('../nav/nav.php'); ?>
        <div class="container">
            <div class="d-flex row p-5 m-5">
                <?php foreach ($productList as $article): ?>
                    <div class="media col-12 m-5">
                        <img class="border border-dark w-25 p-1" src="<?= $article->image ?>" alt="Image représentant les articles">
                        <div class="media-body">
                            <h1 class="text-right"><?= $article->title ?></h1>
                            <p class="text-center p-3"><?= $article->description ?></p>
                            <p class="text-right m-5">Prix : <?= $article->price." €" ?></p>
                        </div>
                    </div>
<?php endforeach ?>
            </div>
        </div>
    </body>
</html>
