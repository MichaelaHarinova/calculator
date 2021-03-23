<?php
declare(strict_types = 1);

class ProductController
{
    private Connection $db;

    public function __construct() {
        $this->db = new Connection;
    }

    public function productView(array $GET, array $POST) {
        $products = ProductLoader::getAllProducts($this->db);
        require 'View/Product/productview.php';
    }

}