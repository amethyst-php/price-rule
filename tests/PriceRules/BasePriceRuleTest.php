<?php

namespace Amethyst\Tests\PriceRules;

use Amethyst\Fakers\PriceRuleFaker;
use Amethyst\Managers\PriceRuleManager;
use Amethyst\PriceRules\BasePriceRule;
use Amethyst\Tests\BaseTest;

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
