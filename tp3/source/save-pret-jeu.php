<?php
$json = file_get_contents('php://input');
$json_decode = json_decode($json);
$id_user = $json_decode->id_user;
$id_jeu = $json_decode->id_jeu;
if ($id_user == 1)
{
  if ($id_jeu == 2){
    $reponse = 'Le jeu 7 wonders a bien été prété à admin';
  }
  elseif($id_jeu == 3){
    $reponse = 'Le jeu Catane a bien été prété à admin';
  }
}
else {
  if ($id_jeu == 1){
    $reponse = 'Le jeu Kingdomino a bien été prété à toto';
  }
  elseif($id_jeu == 3){
    $reponse = 'Le jeu Catane a bien été prété à toto';
  }
}

$jeux_json = json_encode($reponse);
header('Content-type: application/json');
echo $jeux_json;
 ?>
