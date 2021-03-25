<?php
declare(strict_types=1);

class Calculator
{
    private int $price;
    private const DIVIDER = 100;


    public static function calculatePrice(Customer $customer, Product $product): float
    {
        $highestVariableDiscount = $customer->getHighestVariableDiscount();
        $totalFixedDiscount = $customer->getTotalFixedDiscount();
        $price = $product->getPrice();

        $priceAfterVarDiscount = $price * (1 - ($highestVariableDiscount / self::DIVIDER));

        //if price - discount is not negative => shows price after discount ,otherwise 0
        $priceAfterFixedDiscount = $price - $totalFixedDiscount >= 0 ? $price - $totalFixedDiscount: 0;

        //returns the lowest price
        return min($priceAfterVarDiscount,$priceAfterFixedDiscount);
    }



}