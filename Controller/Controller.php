<?php
declare(strict_types = 1);
require 'Model/Connection.php';
require 'Loader/ProductLoader.php';
class Controller
{
    private ProductLoader $productLoader;
    private CustomerLoader $customerLoader;

    public function __construct(){
        $this->productLoader = new ProductLoader();
    }

    public function render() :void {
        $products =$this-> productLoader->getAllProducts();
        require 'View/homepage.php';
        if(isset($_POST['calculate'])){
        require 'View/resultCalculation.php';
        }

    }





}