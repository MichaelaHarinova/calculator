<?php

class CustomerLoader
{
    public static function getAllCustomers(Pdo $pdo): array
    {
        $query = $pdo->query('select * from customer ORDER BY name');
        $rawCustomers = $query->fetchAll();

        $customers = [];
        foreach ($rawCustomers as ['id' => $id, 'firstname' => $firstname, 'lastname' => $lasttname, 'group_id' => $groupid]) {
            $products[] = Product::loadProducts(
                $id,
                $name,
                $price
            );
        }
        return $products;
    }
}