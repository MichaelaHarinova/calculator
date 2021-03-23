<?php
declare(strict_types = 1);

class ProductController
{

    public function productView(array $GET, array $POST) {
        $products = ProductLoader::getAllProducts($this->db);
        require 'View/Product/productview.php';
    }

}