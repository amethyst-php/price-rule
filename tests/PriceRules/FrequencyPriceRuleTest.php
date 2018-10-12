<?php

namespace Railken\Amethyst\Tests\PriceRules;

use Railken\Amethyst\Fakers\PriceRuleFaker;
use Railken\Amethyst\Managers\PriceRuleManager;
use Railken\Amethyst\PriceRules\FrequencyPriceRule;
use Railken\Amethyst\Tests\BaseTest;

class FrequencyPriceRuleTest extends BaseTest
{
    public function testSuccess()
    {
        $manager = new PriceRuleManager();

        $resource = $manager->createOrFail(
            PriceRuleFaker::make()->parameters()
                ->set('class_name', FrequencyPriceRule::class)
                ->set('payload', [
                    'frequency_unit'  => 'months',
                    'frequency_value' => '1',
                ])
        )->getResource();

        $rule = new FrequencyPriceRule();

        $start = (new \DateTime())->modify('-1 month');
        $end = (new \DateTime());

        $this->assertEquals(10, $rule->calculate($resource, 10, ['start' => (new \DateTime())->modify('-1 month'), 'end' => $end]));
        $this->assertEquals(20, $rule->calculate($resource, 10, ['start' => (new \DateTime())->modify('-2 month'), 'end' => $end]));
        $this->assertEquals(null, $rule->calculate($resource, 10, ['start' => (new \DateTime())->modify('-15 days'), 'end' => $end]));
        $this->assertEquals(240, $rule->calculate($resource, 10, ['start' => (new \DateTime())->modify('-2 years'), 'end' => $end]));
    }
}
