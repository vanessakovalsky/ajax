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
    $result = $stmt->setFetchMode(\PDO::FETCH_ASSOC);
    var_dump($result);
  }
}
