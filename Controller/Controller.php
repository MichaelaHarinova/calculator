<?php
declare(strict_types = 1);

class Controller
{
    private PDO $pdo;
    public function __construct(){
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }

    public function productView($products) {
        $products = ProductLoader::getAllProducts($products);
        require 'View/homepage.php';
    }

}