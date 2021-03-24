<?php
declare(strict_types=1);

class Calculator
{
    private int $variableDiscount; //gets highest discount from all groups
    private int $fixedDiscount; //counts all discounts up
    private int $price;


    //find the highest group discount
    //count all fixed discounts of the group (if they exists)
    //compare which discount gives the customer most value
    //look up costumers discount --
    //if there is % - compare them ->get the largest
    //first subtraction of fixed amount then %
    //price is never negative


    public function groupsDiscount($rawGroup, $price) : int
    {
        $highestVarDiscount = max(array((int)$rawGroup['variable_discount']));       //find the highest group discount
        $totalOfFixedDiscounts = ($price - (int)$rawGroup['fixed_discount'])/100;    //count all fixed discounts in the group

        //compare which discount give customer more value
        if ($highestVarDiscount >= $totalOfFixedDiscounts){
            $betterDiscount = $highestVarDiscount;
        }else{
            $betterDiscount = $totalOfFixedDiscounts;
        }
        return $betterDiscount;
    }

    //look up costumers discount
    public function customerDiscount() {

    }


    //compare customers VS groups if they have % discount
    public function groupVScustomerDiscount($person, $rawGroup) : int{
        if(isset($person['variable_discount']) && isset($rawGroup['variable_discount'])){
            if ((int)$person['variable_discount'] > (int)$rawGroup['variable_discount']){
                $largestDiscount = $person['variable_discount'] ;
            }else{
                $largestDiscount= (int)$rawGroup['variable_discount'];
            }
            return $largestDiscount;
        }

}

}