<?php
declare(strict_types=1);

class Customer
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private int $fixed_discount;
    private int $variable_discount;
    /** @var Group[] $groups */
    private array|null $groups; //optional ->performance


    public function __construct(int $id, string $firstname, string $lastname, int $fixed_discount, int $variable_discount, array $groups = null)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->fixed_discount = $fixed_discount;
        $this->variable_discount = $variable_discount;
        $this->groups = $groups;
    }


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


    //highest variable discount of costumer 1) + takes the largest percentage 5)
    public function getHighestVariableDiscount(): int
    {
        $varDisc = [0];
        foreach ($this->groups as $group) {
            $varDisc[] = $group->getVariableDiscount();
        }
        $varDisc[] = $this->variable_discount;
        return max($varDisc);
    }


    //count all fixed discount up , costumer has multiple groups
    public function getTotalFixedDiscount(): int
    {
        $fixDisc = 0;
        foreach ($this->groups as $group) {
            $toAdd = $group->getFixedDiscount() !== null ? $group->getFixedDiscount() : 0;
            $fixDisc += $toAdd;
        }
        //$fixDisc+= $this->fixed_discount;
        return $fixDisc;
    }
}
