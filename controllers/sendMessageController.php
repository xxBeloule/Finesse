<?php
include'../models/modelMessage.php';
if ($_POST){
$reason = $_POST['reason'];
$message = $_POST['message'];
$id = $_SESSION['id'];
if ($_POST['contact']) {
$sendmessage = new Message();
$message = $sendmessage->sendMessage($reason, $message, $id);
}
}
$tle = "Contact";