<?php

namespace Railken\Amethyst\PriceRules;

use MathParser\StdMathParser;
use Railken\Amethyst\Contracts\PriceRuleContract;
use Railken\Amethyst\Exceptions;
use Railken\Amethyst\Models\PriceRule;

class FrequencyPriceRule implements PriceRuleContract
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
        $payload = $priceRule->payload;

        $options = (object) $options;

        $parser = new StdMathParser();

        if (!isset($payload->frequency_unit)) {
            throw new Exceptions\PriceRuleWrongPayloadException('Missing frequency_unit in payload');
        }

        if (!isset($payload->frequency_value)) {
            throw new Exceptions\PriceRuleWrongPayloadException('Missing frequency_value in payload');
        }

        $diff = (float) $payload->frequency_value / $this->convertTime($payload->frequency_unit, (float) $payload->frequency_value);

        $price_per_second = $price * $diff;

        if (!isset($options->time_unit)) {
            throw new Exceptions\PriceRuleWrongOptionsException('Missing time_unit in options');
        }

        if (!isset($options->time_value)) {
            throw new Exceptions\PriceRuleWrongOptionsException('Missing time_value in options');
        }

        return $price_per_second * $this->convertTime($options->time_unit, $options->time_value);
    }

    /**
     * Converts to seconds.
     *
     * @param string $unit
     * @param float  $value
     *
     * @return float
     */
    public function convertTime(string $unit, float $value)
    {
        if ($unit === 'seconds') {
            return $value;
        }

        if ($unit === 'minutes') {
            return $value * (60);
        }

        if ($unit === 'hours') {
            return $value * (3600);
        }

        if ($unit === 'days') {
            return $value * (86400);
        }

        if ($unit === 'weeks') {
            return $value * (7 * 86400);
        }

        if ($unit === 'months') {
            return $value * (30 * 86400);
        }

        if ($unit === 'years') {
            return $value * (365 * 86400);
        }

        throw new \Exception('Wrong frequencies');
    }
}
