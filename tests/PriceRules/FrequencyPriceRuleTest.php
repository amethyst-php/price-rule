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

        $this->assertEquals(10, $rule->calculate($resource, 10, ['time_unit' => 'months', 'time_value' => 1]));
        $this->assertEquals(10 / 2, $rule->calculate($resource, 10, ['time_unit' => 'months', 'time_value' => 1 / 2]));
        $this->assertEquals(10 * 2, $rule->calculate($resource, 10, ['time_unit' => 'days', 'time_value' => 30 * 2]));
        $this->assertEquals(10 * 2, $rule->calculate($resource, 10, ['time_unit' => 'seconds', 'time_value' => 2592000 * 2]));
        $this->assertEquals(10 * 2, $rule->calculate($resource, 10, ['time_unit' => 'minutes', 'time_value' => 43200 * 2]));
    }
}
