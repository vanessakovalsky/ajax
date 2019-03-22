<?php
$reponse_liste_user = [
  [
    "id" => 1,
    "username" => "admin"
  ],
  [
    "id" => 2,
    "username" => "toto"
  ],
  [
    "id" => 3,
    "username" => "dujardin"
  ]
];

$jeux_json = json_encode($reponse_liste_user);
header('Content-type: application/json');
echo $jeux_json;
