<?php
declare(strict_types = 1);

class Controller
{

    public function productView(array $GET, array $POST) {
        $products = ProductLoader::getAllProducts();
//        require '../View/homepage.php';
    }

}