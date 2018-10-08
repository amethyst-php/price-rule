<?php

namespace Railken\Amethyst\Tests\PriceRules;

use Railken\Amethyst\Fakers\PriceRuleFaker;
use Railken\Amethyst\Managers\PriceRuleManager;
use Railken\Amethyst\PriceRules\BasePriceRule;
use Railken\Amethyst\Tests\BaseTest;

class BasePriceRuleTest extends BaseTest
{
    public function testSuccess()
    {
        $manager = new PriceRuleManager();

        $resource = $manager->createOrFail(PriceRuleFaker::make()->parameters()->set('class_name', BasePriceRule::class))->getResource();

        $rule = new BasePriceRule();

        $this->assertEquals(10, $rule->calculate($resource, 10));
    }
}
