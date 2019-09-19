<?php

include '../models/modelMessage.php';
$message = new Message();
$messageList = $message->getAllMessage();
$tle = 'Messages';
if (isset($_GET['id'])){
$id = $_GET['id'];
$find = new Message();
$FindList = $find->findMessage($id);
if (isset($_POST['delete'])) {
    $delete = new Message();
    $deletemessage = $delete->deleteMessage($id);
    header('location:../message');
}
}