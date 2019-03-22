<?php
use Exception\KingoludoException;
use Controller\RouterController;
use Session\Session;
use \PDO;

//On initialise la connexion à la base de données
include_once('config.php');
include_once('./vendor/autoload.php');

try
{
    $db = new PDO('mysql:host='.$db_host.';dbname='.$db_db.';charset=utf8', $db_user, $db_pass);
}
catch(\Exception $e)
{
  $exception = new KingoludoException();
  $exception->showMessage('erreur connexion db');
}

require('src/Autoloader.class.php');
Autoloader::register();


$session = new Session();

$router = new RouterController($db);
$content = $router->route($_SERVER['REQUEST_METHOD'],$_GET['actions'],$session);

include_once('src/View/template.php');
