<?php

class CustomerLoader
{
    private PDO $pdo;
    public function __construct(){
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }

    public static function getAllCustomers(Pdo $pdo): array
    {
        $query = $pdo->query('select * from customer ORDER BY name');
        $rawCustomers = $query->fetchAll();
    }
}