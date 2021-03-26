<?php

class CustomerLoader
{
    private PDO $pdo;

    public function __construct()
    {
        $db = new Connection();
        $this->pdo = $db->openConnection();
    }


    public function getCustomer(int $customerID): Customer
    {
        $query = $this->pdo->prepare('select id, firstname, lastname, group_id, fixed_discount, variable_discount from customer where id = :customerID');
        $query->bindValue(':customerID', $customerID);
        $query->execute();
        //returns array of arrays, it will always contain a unique record, so we take the 1st one
        $customer = $query->fetch();
        $customer = new Customer((int)$customer['id'], $customer['firstname'], $customer['lastname'], (int)$customer['fixed_discount'], (int)$customer['variable_discount'], $this->getAllGroups($customer['group_id']));

        return $customer;
    }


    public function getAllCustomers(): array
    {
        $query = $this->pdo->query('select * from customer ORDER BY firstname');
        $customersArray = $query->fetchAll();
        $customers = [];

        foreach ($customersArray as $customer) {
            $customers[] = new Customer((int)$customer['id'], $customer['firstname'], $customer['lastname'], (int)$customer['fixed_discount'], (int)$customer['variable_discount']);
        }
        return $customers;
    }


//in here because I'm getting customers
    public function getAllGroups(int $groupID): array
    {
        $query = $this->pdo->prepare('select * from customer_group WHERE id = :groupID');
        $groups = [];
        //gets the original group
        $query->bindValue(':groupID', $groupID);
        $query->execute();
        $group = $query->fetch();
        $groups[] = new Group((int)$group['id'], $group['name'], $group['parent_id'], $group['fixed_discount'], $group['variable_discount']);

        //gets the last group from the array
        $parentID = $groups[0]->getParentId();
        //to get all the parents via parent ID, group in the group?
        while (isset($parentID)) {
            $query->bindValue(':groupID', $group['parent_id']);
            $query->execute();
            $group = $query->fetch();
            $groups[] = new Group($group['id'], $group['name'], $group['parent_id'], $group['fixed_discount'], $group['variable_discount']);
            $parentID = $groups[count($groups) - 1]->getParentId();
        }
        return $groups;
    }
}