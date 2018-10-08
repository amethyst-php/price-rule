<?php

namespace Railken\Amethyst\PriceRules;

use Railken\Amethyst\Contracts\PriceRuleContract;
use Railken\Amethyst\Models\PriceRule;

class BasePriceRule implements PriceRuleContract
{
    /**
     * Given the base priceRule calculate the final price.
     *
     * @param PriceRule $priceRule
     * @param float     $price
     * @param array     $options
     *
     * @return float
     */
    public function calculate(PriceRule $priceRule, float $price, array $options = [])
    {
        return $price;
    }
}
