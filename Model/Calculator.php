<?php
declare(strict_types=1);

class Calculator
{
    private int $variableDiscount; //gets highest discount from all groups
    private int $fixedDiscount; //counts all discounts up
    private int $price;
    private const DIVIDER = 100;


    //find the highest group discount
    //count all fixed discounts of the group (if they exists)
    //compare which discount gives the customer most value
    //look up costumers discount --
    //if there is % - compare them ->get the largest
    //first subtraction of fixed amount then %
    //price is never negative


    public function groupsDiscount($group, $price): int
    {
        $varDisGroup = $group->getVariableDiscount();
        $fixDisGroup = $group->getFixedDiscount();
        var_dump ($fixDisGroup);
        $highestVarDiscount = ($price/ self::DIVIDER) * max(array($varDisGroup/ self::DIVIDER)) ;    //find the highest group discount
        //turn %into int or floats?

        if (isset($fixDisGroup)) {
            $totalOfFixedDiscounts = array_sum(array($fixDisGroup));          //count all fixed discounts in the group
        }
    }

    //look up costumers discount
    public function customerDiscount($customer): int
    {
        $varDisCustomer = $customer->getVariableDiscount();
        $fixDisCostumer = $customer->getFixedDiscount();

        //compare which discount give customer more value
        if ($varDisCustomer >= $fixDisCostumer) {
            $betterDiscount = $varDisCustomer;
        } else {
            $betterDiscount = $fixDisCostumer;
        }
        return $betterDiscount;
    }


    //compare customers VS groups if they have % discount
    public function groupVScustomerDiscount($customer, $group): int
    {
        $varDisCustomer = $customer->getVariableDiscount();
        $varDisGroup = $group->getVariableDiscout();

        if (isset($varDisCustomer, $varDisGroup)) {
            if ($varDisCustomer > $varDisGroup) {
                $largestDiscount = $varDisCustomer;
        }else{
                $largestDiscount = $varDisGroup;
            }
            return $largestDiscount;
        }
    }

    public static function finalResult($price, $betterDiscount) :int {
        $finalPrice = $price / self::DIVIDER - $betterDiscount;
    }

}