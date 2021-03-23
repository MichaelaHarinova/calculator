<?php

class ProductLoader
{
    public static function getProducts(Pdo $pdo) : array
    {
        $query = $pdo->query('select * from product ORDER BY name');
        $rawProducts = $query->fetchAll();

        $products = [];
        foreach($rawProducts AS ['id' => $id, 'name' => $name, 'price' => $price]) {
            $products[] = Product::loadFromDatabase(
                $id,
                $name,
                $price
            );
        }
        return $products;
    }