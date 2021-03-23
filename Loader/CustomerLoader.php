<?php

class CustomerLoader
{
    private PDO $pdo;
    public function __construct(){
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }

    public function customer() : Customer {
        $query = $this->pdo->query('select id, name, price from product where id = :productID');
        $query->execute();
        $person = $query->fetchAll();
        $customer = new Customer ('select id, firstName, lastName from customer where id = :customerID');

        return $customer;
    }

    public function getAllCustomers(Pdo $pdo): array
    {
        $query = $pdo->query('select * from customer ORDER BY name');
        $rawCustomers = $query->fetchAll();
    }

}