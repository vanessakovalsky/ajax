<?php

namespace Controller;

use Controller\UtilisateurController;

/**
 *
 */

class MembreUserController extends UtilisateurController
{

  function __construct()
  {
    // code...
  }
  /*
   * En tant qu'admin accés autorisé à tous les actions
   */
  public function has_access($action){
    if(in_array($action, ['ListeJeu'])){
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function Chat(){
    $formulaire = include_once('./src/View/chat.html.php');
    return $formulaire;
  }

  public function ListeMessages($db){
    $stmt = $db->prepare("SELECT * FROM messages");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $json_result = json_encode($result);
    return $json_result;
  }

  public function SaveMessage($db, $message){
    $stmt = $db->prepare("INSERT INTO messages (user_id, text, time) VALUES (:user, :text, :time)");
    $stmt->bindValue(":user",1);
    $stmt->bindValue(":text",$message->message);
    $stmt->bindValue(":time",date("Y-m-d"));
    $result = $stmt->execute();
    if($result){
      $message = json_encode('Message enregistré');
    }
    else {
      $message = json_encode('Erreur');
    }
    return $message;
  }
}
