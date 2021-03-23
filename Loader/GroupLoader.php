<?php

class GroupLoader
{
    public static function getAllGroups(Pdo $pdo): array
    {
        $query = $pdo->query('select * from customer_group ORDER BY name');
        $rawGroups = $query->fetchAll();

        $groups = [];
        foreach ($rawGroups as ['id' => $id, 'name' => $name, 'price' => $price]) {
            $products[] = Group::loadGroups(
                $id,
                $name,
                $price
            );
        }
        return $groups;
    }
}