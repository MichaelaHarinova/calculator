<?php
declare(strict_types=1);

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private const DIVIDER = 100;

    public function __construct(int $id, string $name, int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price / self::DIVIDER;

    }


    public function getId(): ?int
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