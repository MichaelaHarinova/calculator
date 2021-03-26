<?php

class ProductLoader
{
    private array $products = [];
    private PDO $pdo;


    public function __construct()
    {
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }


    public function getProduct(int $productID): Product
    {
        $query = $this->pdo->prepare('select id, name, price from product where id = :productID');
        $query-> bindValue(':productID', $productID);
        $query->execute();

        //fetch - test
        $rawProduct = $query->fetch();
        $product = new Product ((int)$rawProduct['id'], $rawProduct['name'], (int)$rawProduct['price']);

        return $product;
    }


    public function getAllProducts(): array
    {
        $query = $this->pdo->query('select * from product ORDER BY name');
        $productsArray = $query->fetchAll();
        $products = [];

        foreach ($productsArray as $product) {
            $products[] = new Product((int)$product['id'], $product['name'], (int)$product['price']);
        }
        return $products;
    }
}