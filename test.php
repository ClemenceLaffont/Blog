<?php

$utilisateur = [array(
    "pseudo" => "admin",
    "mdp" => "ok"
    )];
var_dump($utilisateur);
$json = json_encode($utilisateur);
var_dump($json);
$new_file = fopen("ok.json", "w");
fwrite($new_file, $json);
fclose($new_file);
$json_source = file_get_contents("ok.json");
$json_data = json_decode($json_source);
var_dump($json_data);
echo $json_data[0]->pseudo;
$new_utilisateur = array(
    "pseudo" => "ok",
    "mdp" => "admin"
);
array_push($json_data, $new_utilisateur);
var_dump($json_data);

$json = json_encode($json_data);
var_dump($json);
$new_file = fopen("ok.json", "w");
fwrite($new_file, $json);
fclose($new_file);
$json_source = file_get_contents("ok.json");
$json_data = json_decode($json_source);
var_dump($json_data);
?>