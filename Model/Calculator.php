<?php
declare(strict_types=1);

class Calculator
{
    private const DIVIDER = 100;
    private const FIXED_GROUP_DISCOUNT = true;

    public function calculateBestDiscount(Customer $customer, Product $product): float
    {
        $productPrice = $product->getPrice();
        $highestVariableDiscountFromGroups = $this->getHighestVariableDiscountFromGroups($customer->getGroups()) / self::DIVIDER;
        $totalFixedDiscountFromGroups = $this->getTotalFixedDiscountFromGroups($customer->getGroups());
        $customerFixedDiscount = $customer->getFixedDiscount();
        $finalPrice = 0;


        if ($customer->hasFixedDiscount()) {
            //fixed discount is not higher
            if ($this->isVariableGroupDiscountHighest($product, $highestVariableDiscountFromGroups, $totalFixedDiscountFromGroups)) {
                $varDiscount = (($productPrice - $customerFixedDiscount) * (1 - $highestVariableDiscountFromGroups));
                $finalPrice = $productPrice - ($varDiscount - $customerFixedDiscount);
            } else {
                $finalPrice = $productPrice - ($customerFixedDiscount + $totalFixedDiscountFromGroups);
            }
        } else {
            //  $customerVariableDiscount = $customer->getVariableDiscount() / self::DIVIDER;
            $highestVariableDiscount = $this->getHighestVariableDiscount($customer) / self::DIVIDER;
            //fixed discount is higher
            if (!$this->isVariableGroupDiscountHighest($product, $highestVariableDiscountFromGroups, $totalFixedDiscountFromGroups)) {
                $varDiscount =  (($productPrice - $totalFixedDiscountFromGroups) * (1 - $highestVariableDiscount));
                $finalPrice = $productPrice - $varDiscount  - $totalFixedDiscountFromGroups;
            } else {
                $finalPrice = $productPrice * (1 - $highestVariableDiscount);
            }
        }
        if ($finalPrice < 0) {
            $finalPrice = 0;
        }
        return round($finalPrice, 2);
    }

    private function isVariableGroupDiscountHighest(Product $product, float $groupVarDiscount, int $groupFixDiscount): bool
    {
        $productPrice = $product->getPrice();
        $groupVarDisc = $productPrice * $groupVarDiscount;


        if ($groupVarDisc > $groupFixDiscount) {
            return self::FIXED_GROUP_DISCOUNT;
        }
        if ($groupVarDisc < $groupFixDiscount) {
            return !self::FIXED_GROUP_DISCOUNT;
        }
        return !self::FIXED_GROUP_DISCOUNT;
    }

    //highest variable discount of costumer 1)
    private function getHighestVariableDiscountFromGroups(array $groups): ?int
    {
        $varDisc = [];
        foreach ($groups as $group) {
            $varDisc[] = $group->getVariableDiscount();
        }
        return max($varDisc);
    }


    // takes the largest percentage =>compare var discount of groups and customers
    private function getHighestVariableDiscount(Customer $customer): int
    {
        $varDisc = [];
        $varDisc [] = $this->getHighestVariableDiscountFromGroups($customer->getGroups());
        $varDisc [] = $customer->getVariableDiscount();
        return max($varDisc);
    }


    //count all fixed discount up , costumer has multiple groups
    private function getTotalFixedDiscountFromGroups(array $groups): int
    {
        $fixDisc = 0;
        foreach ($groups as $group) {
            $toAdd = $group->getFixedDiscount() !== null ? $group->getFixedDiscount() : 0;
            $fixDisc += $toAdd;
        }
        return $fixDisc;
    }

}