<?php

class Group
{
    private int $id;
    private string $name;
    private int $group_id;
    private int $fixed_discount;
    private int $variable_discount;

    public function __construct(int $id, string $name, int $group_id, int $fixed_discount, int $variable_discount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->group_id = $group_id;
        $this->fixed_discount = $fixed_discount;
        $this->variable_discount = $variable_discount;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGroupId()
    {
        return $this->group_id;
    }


    public function setFixedDiscount($fixed_discount)
    {
        $this->fixed_discount = $fixed_discount;
    }

    public function setVariableDiscount($variable_discount)
    {
        $this->variable_discount = $variable_discount;
    }
}