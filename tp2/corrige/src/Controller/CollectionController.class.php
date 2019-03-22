<?php

namespace Controller;

use Model\UtilisateurModel;

class CollectionController
{
  public function PretJeu(){
    $userModel = new UtilisateurModel();
    $reponse_liste_user = $userModel->lister();
    $content = include_once('./src/View/pret_jeu.html.php');
    return $content;
  }
}
