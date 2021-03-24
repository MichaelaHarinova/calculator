<?php
declare(strict_types=1);

class Customer
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private int $fixed_discount;
    private int $variable_discount;
    private array $groups;

    public function __construct(int $id, string $firstname, string $lastname, int $fixed_discount, int $variable_discount, array $groups)
    {
        $this->id =$id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->fixed_discount = $fixed_discount;
        $this->variable_discount = $variable_discount;
        $this->groups = $groups;
    }
/*
    public static function loadFromDatabase(int $id, string $firstname, string $lastname, int $group_id, int $fixed_discount, int $variable_discount): Customer
    {
        $customer = new Customer($id, $firstname, $lastname, $group_id, $fixed_discount, $variable_discount);
        $customer->id = $id;
        return $customer;
    }
*/
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }

    public function getFixedDiscount(): int
    {
        return $this->fixed_discount;
    }

    public function getVariableDiscount(): int
    {
        return $this->variable_discount;
    }
}
