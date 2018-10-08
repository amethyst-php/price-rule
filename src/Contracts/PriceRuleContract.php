<?php

namespace Railken\Amethyst\Contracts;

use Railken\Amethyst\Models\PriceRule;

interface PriceRuleContract
{
    /**
     * Given the base priceRule calculate the final price.
     *
     * @param PriceRule $priceRule
     * @param float     $price
     * @param array     $options
     *
     * @return array
     */
    public function calculate(PriceRule $priceRule, float $price, array $options = []);
}
