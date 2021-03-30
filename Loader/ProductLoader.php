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
        return new Product ((int)$rawProduct['id'], $rawProduct['name'], (int)$rawProduct['price']);
    }

    /** @return Product[] */
    public function getAllProducts(): array
    {
        if(count($this->products)) { // lazy loading
            return $this->products;
        }

        $query = $this->pdo->query('select * from product ORDER BY name');
        $this->products = [];

        foreach ($query->fetchAll() as $product) {
            $this->products[] = new Product((int)$product['id'], $product['name'], (int)$product['price']);
        }
        return $this->products;
    }
}