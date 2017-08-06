<?php
// create_product.php <name>
require_once "bootstrap.php";

include 'src/Personne.php';

$product = new Personne();
$product->setMatrecule("mat3");
$product->setNomPrenom("ELOUASSIF Abdellah");
$product->setDateEmbache("test");
$product->setDateNaissance("test");
$product->setCNSS("test");
$product->setPoste("Ingenieur Informatique");
$product->setDepartement("Informatique");


$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getMatrecule() . "\n";
