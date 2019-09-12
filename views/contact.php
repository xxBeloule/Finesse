<?php session_start(); 
include'../controllers/sendMessageController.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <?php require '../head/header.php'; ?>
    <body>
        <?php require('../nav/nav.php'); ?>
        <main class="m-5">
            <div class="text-center d-block">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <label for="">Raison :</label>
                        <div class="form-group">
                        <select name="reason" class="btn m-5">
                            <option value="0">Choisir</option>
                            <option value="Demande particulière">Demande particulière</option>
                            <option value="Question">Question</option>
                            <option value="Autre raison">Autre raison</option>
                        </select>
                        </div>
                        <label for="message">Dites nous tout :</label>
                        <div class="form-group">
                            <textarea name="message" maxlength="250"rows="5" cols="33"></textarea>
                        </div>
                        <input class="btn btn-outline-dark" type="submit" name="contact">
                    </form>
                </div>
        </main>
    </div>
</body>
</html>
