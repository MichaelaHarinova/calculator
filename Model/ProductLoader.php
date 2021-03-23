<?php

class ProductLoader
{
public static function getAllProducts(Pdo $pdo) : array
{
$query = $pdo->query('select * from product ORDER BY name');
$rawProducts = $query->fetchAll();

$products = [];
foreach($rawProducts AS ['id' => $id, 'name' => $name, 'price' => $price]) {
$products[] = Product::loadProducts(
$id,
$name,
$price
);
}
return $products;
}