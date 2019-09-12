<?php

include '../models/modelMessage.php';
$message = new Message();
$messageList = $message->getAllMessage();
$tle = 'Messages';
$id = $_GET['id'];
if ($_POST['delete']) {
    $delete = new Message();
    $deletemessage = $delete->deleteMessage($id);
    header('location:../message');
}
$find = new Message();
$FindList = $find->findMessage($id);
