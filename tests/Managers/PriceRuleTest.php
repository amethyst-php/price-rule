<?php

namespace Railken\Amethyst\Tests\Managers;

use Railken\Amethyst\Fakers\PriceRuleFaker;
use Railken\Amethyst\Managers\PriceRuleManager;
use Railken\Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class PriceRuleTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = PriceRuleManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = PriceRuleFaker::class;
}
