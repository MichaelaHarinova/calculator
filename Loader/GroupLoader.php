<?php

class GroupLoader
{
    private PDO $pdo;
    public function __construct(){
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }

    public static function getAllGroups(Pdo $pdo): array
    {
        $query = $pdo->query('select * from customer_group ORDER BY name');
        $rawGroups = $query->fetchAll();
    }
}