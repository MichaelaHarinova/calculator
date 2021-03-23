<?php
declare(strict_types = 1);

class Controller
{
    private Connection $db;

    public function __construct() {
        $this->db = new Connection;
    }

    public function overview(array $GET, array $POST) {
        $users = CustomerLoader::getCustomers($this->db);
        require 'Model/Customer.php';
    }
}