<?php
namespace Controller;

use Session\Session;
use Controller\AdminUserController;
use Controller\JeuController;
use Controller\MembreUserController;

class RouterController {

  public function __construct($db){
    $this->db = $db;
  }

  public function route($method, $action, Session $session){
    if($method == 'POST'){
      switch($action){
        case 'Connexion':
          $content = AdminUserController::connexion($session);
          return $content;
          break;
        case 'AjoutJeu':
          $jeu = new JeuController();
          $content = $jeu->AjoutJeu($_POST);
          return $content;
        case 'AjoutUtilisateur':
          $utilisateur = new AdminUserController($session);
          $content = $utilisateur->AjoutUtilisateur($_POST);
          return $content;
        case 'ModificationUtilisateur':
            $user_id = $_GET['uid'];
            $utilisateur = new AdminUserController($session);
            $content = $utilisateur->ModificationUtilisateur($user_id, $_POST);
            return $content;
        default:
          return 'Action inexistante';
      }
    }
    else {
    switch($action){
      case 'Connexion';
        ob_start();
        $content = AdminUserController::connexion($session);
        $content = ob_get_clean();
        return $content;
        break;
      case 'Deconnexion';
        ob_start();
        $content = AdminUserController::deconnexion($session);
        $content = ob_get_clean();
        return $content;
        break;
      case 'ListeJeu':
        $jeu = new JeuController();
        ob_start();
        $content = $jeu->ListeJeu();
        $content = ob_get_clean();
        return $content;
        break;
      case 'AjoutJeu':
        $jeu = new JeuController();
        ob_start();
        $jeu->AjoutJeu();
        $content = ob_get_clean();
        return $content;
        break;
      case 'AjoutUtilisateur':
        $utilisateur = new AdminUserController($session);
        ob_start();
        $content = $utilisateur->AjoutUtilisateur();
        $content = ob_get_clean();
        return $content;
        break;
      case 'ModificationUtilisateur':
          $utilisateur = new AdminUserController($session);
          $user_id = $_GET['uid'];
          $content = $utilisateur->ModificationUtilisateur($user_id);
          return $content;
          break;
      case 'SuppressionUtilisateur':
        break;
      case 'VoirUtilisateur':
          break;
      case 'VoirJeu':
        $jeu = new JeuController();
        ob_start();
        $content = $jeu->voirJeu(1);
        $content = ob_get_clean();
        return $content;
      case 'PretJeu':
        $collection = new CollectionController();
        ob_start();
        $content = $collection->pretJeu();
        $content = ob_get_clean();
        return $content;
      case 'Chat':
        $membre = new MembreUserController();
        ob_start();
        $content = $membre->Chat();
        $content = ob_get_clean();
        return $content;
      case "ListMessage":
        $membre = new MembreUserController();
        ob_start();
        $content = $membre->ListeMessages($this->db);
        $content = ob_get_clean();
        return $content;
      default:
        return 'Action inexistante';
      }
    }
  }
}
