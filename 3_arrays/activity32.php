<?php
// // EXERCISE 32
$one_piece = array(
    "x" => array(
        "name" => "Luffy",
        "power" => "rubber",
        "profession" => "pirate"
    ),
    "y" => array(
        "name" => "Zoro",
        "power" => "swordsman",
        "profession" => "pirate"
    ),
    "z" => array(
        "name" => "Nami",
        "power" => "navigator",
        "profession" => "pirate"
    )
);

$one_piece["x"]["name"] = "John";
  
print($one_piece["x"]["name"]. $one_piece["y"]["name"]);