<?php

class GroupLoader
{
    private array $groups = [];
    private PDO $pdo;

    public function __construct()
    {
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }


    public function getGroup(int $groupID): Group
    {
        $query = $this->pdo->prepare('select id, name, parent_id, fixed_discount, variable_discount from customer_group where id = :groupID');
        $query-> bindValue(':groupID', $groupID);
        $query->execute();
        $rawGroup = $query->fetchAll();
        $group = new Group ((int)$rawGroup['id'], $rawGroup['name'], (int)$rawGroup['parent_id'], (int)$rawGroup['fixed_discount'], (int)$rawGroup['variable_discount']);

        return $group;

    }





}