<?php

class CustomerLoader
{
    public static function getCustomers(Pdo $pdo) : array
    {
        $query = $pdo->query('select * from customer ORDER BY lastname');
        $rawCustomers = $query->fetchAll();

        $customers = [];
        foreach($rawCustomers AS ['id' => $id, 'firstname' => $firstname, 'lastname' => $lastname, 'group_id' => $group_id, 'fixed_discount' => $fixed_discount, 'variable_discount' => $variable_discount]) {
            $customers[] = Customer::loadFromDatabase(
                $id,
                $firstname,
                $lastname,
                $group_id,
                $fixed_discount,
                $variable_discount
            );
        }
        return $customers;
    }