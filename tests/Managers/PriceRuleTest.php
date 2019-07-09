<?php

namespace Amethyst\Tests\Managers;

use Amethyst\Fakers\PriceRuleFaker;
use Amethyst\Managers\PriceRuleManager;
use Amethyst\Tests\BaseTest;
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
