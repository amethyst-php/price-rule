<?php

namespace Amethyst\Tests\PriceRules;

use Amethyst\Exceptions;
use Amethyst\Fakers\PriceRuleFaker;
use Amethyst\Managers\PriceRuleManager;
use Amethyst\PriceRules\ExpressionPriceRule;
use Amethyst\Tests\BaseTest;

class ExpressionPriceRuleTest extends BaseTest
{
    public function testSuccess()
    {
        $manager = new PriceRuleManager();

        $resource = $manager->createOrFail(
            PriceRuleFaker::make()->parameters()
                ->set('class_name', ExpressionPriceRule::class)
                ->set('payload', ['expression' => 'x * (v / 100 + 1)'])
        )->getResource();

        $rule = new ExpressionPriceRule();

        $this->assertEquals(12.2, $rule->calculate($resource, 10, ['vars' => ['v' => 22]]));
    }

    public function testExceptionWrongExpression()
    {
        $this->expectException(Exceptions\PriceRuleWrongPayloadException::class);
        $manager = new PriceRuleManager();

        $resource = $manager->createOrFail(
            PriceRuleFaker::make()->parameters()
            ->set('class_name', ExpressionPriceRule::class)
            ->set('payload', [])
        )->getResource();

        $rule = new ExpressionPriceRule();
        $rule->calculate($resource, 10, ['vars' => ['v' => 22]]);
    }

    public function testExceptionWrongOptions()
    {
        $this->expectException(Exceptions\PriceRuleWrongOptionsException::class);
        $manager = new PriceRuleManager();

        $resource = $manager->createOrFail(
            PriceRuleFaker::make()->parameters()
            ->set('class_name', ExpressionPriceRule::class)
            ->set('payload', ['expression' => 'x * (v / 100 + 1)'])
        )->getResource();

        $rule = new ExpressionPriceRule();

        $this->assertEquals(12.2, $rule->calculate($resource, 10));
    }
}
