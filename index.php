<?php

require 'vendor/autoload.php';

require 'Calculatrice.php'; // Incluez votre fichier Calculatrice.php

require "db.php";

use MaCalculatrice\Calculatrice; // Importez la classe en utilisant le namespace

$db = new DB();

$db->insertQuery('testinsrt1', 'nameinsert1', 'adresseinsert1');

$calculatrice = new Calculatrice();

$a = 2;
$b = 5;

$resultat_addition = $calculatrice->addition($a, $b);
$resultat_soustraction = $calculatrice->soustraction($a, $b);
$resultat_multiplication = $calculatrice->multiplication($a, $b);
$resultat_division = $calculatrice->division($a, $b);

echo "Addition de $a et $b : $resultat_addition<br>";
echo "Soustraction de $a et $b : $resultat_soustraction<br>";
echo "Multiplication de $a et $b : $resultat_multiplication<br>";
echo "Division de $a et $b : $resultat_division<br>";
