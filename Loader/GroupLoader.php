<?php

class GroupLoader
{
    public static function getGroups(Pdo $pdo) : array
    {
        $query = $pdo->query('select * from customer_group ORDER BY name');
        $rawGroups = $query->fetchAll();

        $groups = [];
        foreach($rawGroups AS ['id' => $id, 'name' => $name, 'parent_id' => $parent_id, 'fixed_discount' => $fixed_discount, 'variable_discount' => $variable_discount]) {
            $groups[] = Group::loadFromDatabase(
                $id,
                $name,
                $parent_id,
                $fixed_discount,
                $variable_discount
            );
        }
        return $groups;
    }