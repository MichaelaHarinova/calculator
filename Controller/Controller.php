<?php
declare(strict_types=1);


class Controller
{
    private ProductLoader $productLoader;
    private CustomerLoader $customerLoader;

    public function __construct()
    {
        $this->productLoader = new ProductLoader();
        $this->customerLoader = new CustomerLoader();
    }

    public function render(): void
    {
        $products = $this->productLoader->getAllProducts();
        $customers = $this->customerLoader->getAllCustomers();

        if (isset($_POST['calculate'])) {
            $result = $this->renderPrice((int)$_POST['customerID'], (int)$_POST['productID']);
        }

        require 'View/homepage.php';
    }


    private function renderPrice(int $customerID, int $productID): float
    {
        $customer = $this->customerLoader->getCustomer($customerID);
        $product = $this->productLoader->getProduct($productID);
        $calculator = new Calculator();
        return $calculator->calculateBestDiscount($customer, $product);
    }
}