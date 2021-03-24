<?php
declare(strict_types = 1);
require 'Model/Connection.php';
require 'Loader/ProductLoader.php';
require 'Loader/CustomerLoader.php';
require 'Loader/GroupLoader.php';
class Controller
{
    private ProductLoader $productLoader;
    private CustomerLoader $customerLoader;
    private GroupLoader $groupLoader;

    public function __construct(){
        $this->productLoader = new ProductLoader();
        $this->customerLoader = new CustomerLoader();
        $this->groupLoader = new GroupLoader();
    }

    public function render() :void {
        $products =$this-> productLoader->getAllProducts();
        $customers =$this-> customerLoader->getAllCustomers();
     //   $group = $this-> groupLoader ->getGroup();
        require 'View/homepage.php';
        if(isset($_POST['calculate'])){
            require 'View/resultCalculation.php';
        }

    }

}