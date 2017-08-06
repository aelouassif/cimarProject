<?php
// create_product.php <name>
require_once "bootstrap.php";

include 'src/Product.php';


$product = new Product();
$product->setName("testCreateProduct");

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
