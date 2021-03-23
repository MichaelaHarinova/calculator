<?php

class ProductLoader
{
    private array $products =[];
    private PDO $pdo;

    public function __construct(){
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }
    public function getAllProducts(): array
    {
        $query = $this->pdo->query('select * from product ORDER BY name');
        $query->execute();
        $rawProducts = $query->fetchAll();


        return $products;
    }
}