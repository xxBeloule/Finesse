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
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="bg-light border border-dark rounded-lg m-5 p-5 text-center">
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input class="form-control" type="text" name="title" value="<?= $FindList->title; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea class="form-control" type="text" name="description"><?= $FindList->description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input  class="form-control" type="text" name="price" value="<?= $FindList->price; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $poids_max; ?>">
                            <input class="form-control-file" type="file" name="fichier">
                        </div>
                        <input class="btn btn-outline-success"type="submit" name="update" value="Mettre à jour">
                        <a class="btn btn-outline-danger" href="../">Retour</a></td>

                    </div>
                </form>
