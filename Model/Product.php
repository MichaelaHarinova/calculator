<?php
declare(strict_types=1);

class Product
{
    private int $id;
    private string $name;
    private int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public static function loadProducts(int $id, string $name, int $price) : Product
    {
        $product = new Product($name, $price);
        $product->id = $id;
        return $product;
    }

    public function getId():? int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }


}