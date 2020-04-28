<?php

require_once('classes/Farm.php');
require_once('classes/Animal.php');
require_once('classes/Barn.php');
require_once('classes/Pig.php');
require_once('classes/Sheep.php');

// Create a farm
$farm = new Farm();

// Create some barns
$redBarn = new Barn('Red Barn');
$blueBarn = new Barn('Blue Barn');
$greenBarn = new Barn('Green Barn');

// Put the new barns inside the Farm
$farm->addBarn($redBarn);
$farm->addBarn($blueBarn);
$farm->addBarn($greenBarn);

// Make some animals
$piggieSmalls = new Pig('Piggie Smalls');
$chrisPBacon = new Pig('Chris P Bacon');
$BaaarackOlalba = new Sheep('Baaarack Olamba');

// Put the animals in barns
$farm->addAnimal($chrisPBacon, $redBarn);
$farm->addAnimal($piggieSmalls, $redBarn);
$farm->addAnimal($BaaarackOlalba, $blueBarn);


// Move some animals between barns
$farm->moveAnimal('Piggie Smalls', 'Blue Barn', 'Red Barn');


// echo out a list of all animals
echo $farm->farmInventory();