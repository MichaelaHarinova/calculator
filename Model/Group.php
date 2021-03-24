<?php
declare(strict_types=1);

class Group
{
    private int $id;
    private string $name;
    private ?int $parent_id;
    private ?int $fixed_discount;
    private ?int $variable_discount;

    public function __construct(int $id, string $name, ?int $parent_id, ?int $fixed_discount, ?int $variable_discount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent_id = $parent_id;
        $this->fixed_discount = $fixed_discount;
        $this->variable_discount = $variable_discount;
    }
/*
    public static function loadFromDatabase(int $id, string $name, int $parent_id, int $fixed_discount, int $variable_discount): Group
    {
        $group = new Group($id, $name, $parent_id, $fixed_discount, $variable_discount);
        $group->id = $id;
        return $group;
    }
*/
    public function getId():? int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    public function getFixedDiscount(): ?int
    {
        return $this->fixed_discount;
    }

    public function getVariableDiscount(): ?int
    {
        return $this->variable_discount;
    }
}
