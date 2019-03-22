<?php
$json = file_get_contents('php://input');
$json_decode = json_decode($json);
$id_user = $json_decode->id_user;
if ($id_user == 1)
{
  $jeux_user = [
    [
      "id" => 1,
      "nom" => "Kingomino",
      "editeur" => "Blue orange"
    ],
    [
      "id" => 3,
      "nom" => "Catane",
      "editeur" => "Asmodée"
    ]
  ];
}
else {
  $jeux_user = [
    [
      "id" => 2,
      "nom" => "7 wonders",
      "editeur" => "Asmodee"
    ],
    [
      "id" => 3,
      "nom" => "Catane",
      "editeur" => "Asmodée"
    ]
  ];
}

$jeux_json = json_encode($jeux_user);
header('Content-type: application/json');
echo $jeux_json;
 ?>
