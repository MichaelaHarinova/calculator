<?php
declare(strict_types=1);

class Calculator
{
    private const DIVIDER = 100;
    private const FIXED_GROUP_DISCOUNT = true;
    private const VARIABLE_GROUP_DISCOUNT = false;

    public function calculateBestDiscount(Customer $customer, Product $product): float
    {
        $productPrice = $product->getPrice();
        $highestVariableDiscountFromGroups = $this->getHighestVariableDiscountFromGroups($customer->getGroups()) / self::DIVIDER;
        $totalFixedDiscountFromGroups = $this->getTotalFixedDiscountFromGroups($customer->getGroups());
        $customerFixedDiscount = $customer->getFixedDiscount();

        if ($customer->hasFixedDiscount()) {
            //fixed discount is not higher
            if ($this->isVariableGroupDiscountHighest($product, $highestVariableDiscountFromGroups, $totalFixedDiscountFromGroups)) {
                return $this->formatPrice(($productPrice - $customerFixedDiscount) * (1 - $highestVariableDiscountFromGroups));
            }

            return $this->formatPrice($productPrice - ($customerFixedDiscount + $totalFixedDiscountFromGroups));
        }

        //  $customerVariableDiscount = $customer->getVariableDiscount() / self::DIVIDER;
        $highestVariableDiscount = $this->getHighestVariableDiscount($customer) / self::DIVIDER;
        //fixed discount is higher
        if (!$this->isVariableGroupDiscountHighest($product, $highestVariableDiscountFromGroups, $totalFixedDiscountFromGroups)) {
            return $this->formatPrice(($productPrice - $totalFixedDiscountFromGroups) * (1 - $highestVariableDiscount));
        }

        return $this->formatPrice($productPrice * (1 - $highestVariableDiscount));
    }

    private function formatPrice(float $price) : float
    {
        return round(max($price, 0), 2);
    }

    private function isVariableGroupDiscountHighest(Product $product, float $groupVarDiscount, int $groupFixDiscount): bool
    {
        $productPrice = $product->getPrice();
        $groupVarDisc = $productPrice - ($productPrice * $groupVarDiscount);
        $groupFixDisc = $productPrice - $groupFixDiscount;

        if ($groupVarDisc < $groupFixDisc) {
            return self::FIXED_GROUP_DISCOUNT;
        }

        return self::VARIABLE_GROUP_DISCOUNT;
    }

    //highest variable discount of costumer 1)
    private function getHighestVariableDiscountFromGroups(array $groups): ?int
    {
        $varDisc = [];
        /** @var Group $group*/
        foreach ($groups as $group) {
            $varDisc[] = $group->getVariableDiscount();
        }
        return max($varDisc);
    }

    // takes the largest percentage =>compare var discount of groups and customers
    private function getHighestVariableDiscount(Customer $customer): int
    {
        return max([
            $this->getHighestVariableDiscountFromGroups($customer->getGroups()),
            $customer->getVariableDiscount()
        ]);
    }


    //count all fixed discount up , costumer has multiple groups
    private function getTotalFixedDiscountFromGroups(array $groups): int
    {
        $fixDisc = 0;
        /** @var Group[] $groups */
        foreach ($groups as $group) {
            $fixDisc += $group->getFixedDiscount() ?? 0;
        }
        return $fixDisc;
    }

}