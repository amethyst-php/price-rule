<?php

namespace Amethyst\PriceRules;

use Amethyst\Contracts\PriceRuleContract;
use Amethyst\Exceptions;
use Amethyst\Models\PriceRule;
use MathParser\Interpreting\Evaluator;
use MathParser\StdMathParser;

class ExpressionPriceRule implements PriceRuleContract
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
    public function calculate(PriceRule $priceRule, float $price, array $options = []): float
    {
        $payload = $priceRule->payload;

        $options = (object) $options;

        $parser = new StdMathParser();

        if (!isset($payload->expression)) {
            throw new Exceptions\PriceRuleWrongPayloadException('Missing expression in payload');
        }

        if (!isset($options->vars)) {
            throw new Exceptions\PriceRuleWrongOptionsException('Missing vars in options');
        }

        $ast = $parser->parse($payload->expression);
        $evaluator = new Evaluator();
        $evaluator->setVariables(array_merge(['x' => $price], $options->vars));

        return floatval($ast->accept($evaluator));
    }
}
