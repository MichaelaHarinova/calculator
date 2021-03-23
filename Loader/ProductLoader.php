<?php

class ProductLoader
{
    private array $products =[];
    private PDO $pdo;

    public function __construct(){
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }

    public static function getAllProducts(PDO $pdo): array
    {
        $query = $pdo->query('select * from product ORDER BY name');
        $productsArray = $query->fetchAll();
        $products = [];

        foreach ($productsArray as $products){
            $products[] = new Products((int)$products['id'],$products['name'],(int)$products['price']);
        }

        return $products;
    }
}