<?php

// This script is not needed to run the project
// It's just a quick test of the baddie type
// classes.


echo "<p>Script Executing</p>";

function autoloader($class) {
    include $class .'.php';
}

spl_autoload_register('autoloader');



$troll = new Troll();
$snake = new Snake();
$witch = new Witch();
$dragon = new Dragon();

$stats = $troll->createAndGetStats();
print_r($stats);

echo "<br/>";

$stats = $snake->createAndGetStats();
print_r($stats);

echo "<br/>";

$stats = $witch->createAndGetStats();
print_r($stats);

echo "<br/>";

$stats = $dragon->createAndGetStats();
print_r($stats);

?>