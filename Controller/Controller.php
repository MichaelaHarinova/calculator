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
    private Calculator $calculator;

    public function __construct(){
        $this->productLoader = new ProductLoader();
        $this->customerLoader = new CustomerLoader();
        $this->groupLoader = new GroupLoader();
        $this->calculator = new Calculator();
    }

    public function render() :void {
        $products =$this-> productLoader->getAllProducts();
        $customers =$this-> customerLoader->getAllCustomers();
     //   $group = $this-> groupLoader ->getGroup();
      $calculator = $this -> groupsDiscount();
        require 'View/homepage.php';
        if(isset($_POST['calculate'])){
            require 'Model/Calculator.php';
        }

    }

}