<?php
$reason = $_POST['reason'];
$message = $_POST['message'];
$id = $_SESSION['id'];
include'../models/modelMessage.php';
if ($_POST['contact']) {
$sendmessage = new Message();
$message = $sendmessage->sendMessage($reason, $message, $id);
}

