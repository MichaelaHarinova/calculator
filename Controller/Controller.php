<?php
declare(strict_types = 1);

class Controller
{
    private PDO $pdo;
    public function __construct(){
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }

    public function render (array $_GET, array $_POST){
        require 'View/homepage.php';
        if(isset($_POST['calculate'])){

        }
        require 'View/includes/footer.php';
    }

    public function productView($products) {
        $products = ProductLoader::getAllProducts($products);
        require 'View/homepage.php';
    }

}