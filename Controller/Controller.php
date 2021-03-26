<?php
declare(strict_types = 1);



class Controller
{
    private ProductLoader $productLoader;
    private CustomerLoader $customerLoader;


    public function __construct(){
        $this->productLoader = new ProductLoader();
        $this->customerLoader = new CustomerLoader();
    }


    public function render() :void {
        $products =$this-> productLoader->getAllProducts();
        $customers =$this-> customerLoader->getAllCustomers();
        require 'View/homepage.php';
    }


    public function renderPrice(int $customerID,int $productID) : void {
        $customer = $this->customerLoader->getCustomer($customerID);
        $product = $this->productLoader->getProduct($productID);
        $calculator= new Calculator();
        $result = $calculator->calculateBestDiscount($customer, $product);

        require 'View/calcView.php';
    }
}