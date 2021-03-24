<?php
declare(strict_types=1);

class Product
{
    private int $id;
    private string $name;
    private float $price;

    public function __construct(int $id,string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price/100;

    }

 /*   public static function loadFromDatabase(int $id, string $name, int $price) : Product
    {
        $product = new Product($id,$name, $price);
        $product->id = $id;
        return $product;
    }*/

    public function getId():? int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }


}