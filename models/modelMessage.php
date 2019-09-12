<?php

include('config.php');

class Message {

    function __construct() {
        try {
            $this->db = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function sendMessage($reason, $message, $id) {
        try {
            // requête permettant d'inserer les valeurs de l'inscription
            $sql = "INSERT INTO message (message, reason, id_u)
      VALUES (:message, :reason, :id)";
            // On prepare la requête
            $req = $this->db->prepare($sql);
            // On attribue les valeurs via bindvalue et leurs variables.
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':message', $message, PDO::PARAM_STR);
            $req->bindValue(':reason', $reason, PDO::PARAM_STR);
            $req->execute();
            $error = $req->errorInfo();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getAllMessage() {
        $sql = 'SELECT pseudo, message, reason, id_m FROM users INNER JOIN message ON users.id_u = message.id_u ';
        $messageRequest = $this->db->query($sql);
        $messageList = $messageRequest->fetchAll(PDO::FETCH_OBJ);
        return $messageList;
    }
    
    public function findMessage($id) {
        $sql = "SELECT * FROM users INNER JOIN message ON users.id_u = message.id_u WHERE id_m = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $findMessage = $req->fetch(PDO::FETCH_OBJ);
        return $findMessage;
    }
    
    public function deleteMessage($id) {
        try {
            $sql = "DELETE FROM message WHERE id_m = :id";
            // $this->db->prepare($sql);
            $req = $this->db->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $error = $req->errorInfo();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
